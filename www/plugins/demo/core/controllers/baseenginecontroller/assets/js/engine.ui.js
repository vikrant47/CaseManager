var EngineObservable = Engine.instance.define('engine.EngineObservable', {
    constructor: function () {
        this.events = {};
    },
    emit: function (eventName, ...args) {
        const _this = this;
        if (this.events[eventName]) {
            this.events[eventName].forEach(function (callbaack) {
                callbaack.apply(_this, args);
            });
        }
        return this;
    },
    on: function (eventName, callback) {
        if (!this.events[eventName]) {
            this.events[eventName] = [];
        }
        this.events[eventName].push(callback);
        return this;
    }
});
let EngineUI = Engine.instance.define('engine.ui.EngineUI', {
    constructor: function () {
        this.currentModel = null;
        this.registerPopStateListener();
    },
    /**copied from https://raw.githubusercontent.com/cowboy/jquery-bbq/v1.2.1/jquery.ba-bbq.js*/
    parseParams: function (coerce) {
        const params = location.search.substring(1);
        if (params.length === 0) {
            return {};
        }
        var aps = Array.prototype.slice;
        var decode = decodeURIComponent;
        var obj = {},
            coerce_types = {'true': !0, 'false': !1, 'null': null};

        // Iterate over all name=value pairs.
        $.each(params.replace(/\+/g, ' ').split('&'), function (j, v) {
            var param = v.split('='),
                key = decode(param[0]),
                val,
                cur = obj,
                i = 0,

                // If key is more complex than 'foo', like 'a[]' or 'a[b][c]', split it
                // into its component parts.
                keys = key.split(']['),
                keys_last = keys.length - 1;

            // If the first keys part contains [ and the last ends with ], then []
            // are correctly balanced.
            if (/\[/.test(keys[0]) && /\]$/.test(keys[keys_last])) {
                // Remove the trailing ] from the last keys part.
                keys[keys_last] = keys[keys_last].replace(/\]$/, '');

                // Split first keys part into two parts on the [ and add them back onto
                // the beginning of the keys array.
                keys = keys.shift().split('[').concat(keys);

                keys_last = keys.length - 1;
            } else {
                // Basic 'foo' style key.
                keys_last = 0;
            }

            // Are we dealing with a name=value pair, or just a name?
            if (param.length === 2) {
                val = decode(param[1]);

                // Coerce values.
                if (coerce) {
                    val = val && !isNaN(val) ? +val              // number
                        : val === 'undefined' ? undefined         // undefined
                            : coerce_types[val] !== undefined ? coerce_types[val] // true, false, null
                                : val;                                                // string
                }

                if (keys_last) {
                    // Complex key, build deep object structure based on a few rules:
                    // * The 'cur' pointer starts at the object top-level.
                    // * [] = array push (n is set to array length), [n] = array if n is
                    //   numeric, otherwise object.
                    // * If at the last keys part, set the value.
                    // * For each keys part, if the current level is undefined create an
                    //   object or array based on the type of the next keys part.
                    // * Move the 'cur' pointer to the next level.
                    // * Rinse & repeat.
                    for (; i <= keys_last; i++) {
                        key = keys[i] === '' ? cur.length : keys[i];
                        cur = cur[key] = i < keys_last
                            ? cur[key] || (keys[i + 1] && isNaN(keys[i + 1]) ? {} : [])
                            : val;
                    }

                } else {
                    // Simple key, even simpler rules, since only scalars and shallow
                    // arrays are allowed.

                    if ($.isArray(obj[key])) {
                        // val is already an array, so push on the next value.
                        obj[key].push(val);

                    } else if (obj[key] !== undefined) {
                        // val isn't an array, but since a second value has been specified,
                        // convert val into an array.
                        obj[key] = [obj[key], val];

                    } else {
                        // val is a scalar.
                        obj[key] = val;
                    }
                }

            } else if (key) {
                // No value was defined, so set something meaningful.
                obj[key] = coerce
                    ? undefined
                    : '';
            }
        });

        return obj;
    },
    /**Nav link click handler*/
    navigationLinkHandler: function (e) {
        let handler = $(this).data('handler');
        if (handler) {
            handler = atob(handler);
        }
        if (handler && handler !== 'null') {
            e.preventDefault();
            if (typeof handler === 'string') {
                handler = Engine.instance.evalFunction(handler);
            }
            handler.call(this, e);
            return false;
        }
    },
    makeQueryStringURL: function (param, value) {
        if (typeof param === 'string') {
            let name = param;
            param = {};
            param[name] = value;
        }
        const existingParams = this.parseParams();
        let queryString = $.param(Object.assign(existingParams, param));
        const urlSplit = window.location.href.split('?');
        return urlSplit[0] + '?' + queryString;
    },
    updateQueryString: function (param, value) {
        const url = this.makeQueryStringURL(param, value);
        window.history.pushState({href: url, skip: true}, '', url);
    },
    navigateByQueryString: function (param, value) {
        this.navigate(this.makeQueryStringURL(param, value));
    },
    registerPopStateListener: function () {
        const _this = this;
        window.addEventListener('popstate', function (e) {
            if (e.state && !e.state.skip) {
                _this.navigate(e.state.href, true);
            }
        });
    },
    buildUrl: function (settings) {
        if (typeof settings.url === 'string') {
            return url;
        }
        const controllerUrl = this.getControllerUrl(settings.controller);
        const urlParams = $.param(settings.params);
        if (settings.type === 'list') {
            return controllerUrl + '?' + urlParams;
        } else if (settings.type === 'form') {
            return controllerUrl + '/' + settings.context + '/' + settings.recordId + '?' + urlParams;
        } else if (settings.type === 'embed') {
            return this.getBaseUrl() + '/demo/core/controller/navigationcontroller/embed' + settings.recordId + '?' + urlParams;
        } else if (settings.type === 'dashboard') {
            return this.getBaseUrl() + '/demo/report/dashboardcontroller/' + settings.recordId + '?' + urlParams;
        } else if (settings.type === 'report') {
            return this.getBaseUrl() + '/demo/report/widgetcontroller/' + settings.recordId + '?' + urlParams;
        }
    },
    getUrlInfo: function (url) {
        let urlInfo = {url: url, type: 'list'};
        const queryParamIndex = url.indexOf('?');
        if (queryParamIndex > 0) {
            url = url.substring(0, queryParamIndex);
        }
        const urlSplit = url.split('/').reverse();
        if (urlSplit[0] === 'create' || urlSplit[1] === 'update' || urlSplit[1] === 'preview') {
            Object.assign(urlInfo, {
                type: 'form',
                context: urlSplit[0] === 'create' ? urlSplit[0] : urlSplit[1],
                recordId: urlSplit[0] === 'create' ? null : urlSplit[0]
            });
        } else if (url.indexOf('navigationcontroller/embed') > 0) {
            Object.assign(urlInfo, {
                type: 'embed',
                recordId: urlSplit[0]
            });

        } else if (url.indexOf('/report/dashboardcontroller/render') > 0) {
            Object.assign(urlInfo, {
                type: 'dashboard',
                recordId: urlSplit[0]
            });
        } else if (url.indexOf('/report/widgetcontroller/render') > 0) {
            Object.assign(urlInfo, {
                type: 'widget',
                recordId: urlSplit[0]
            });
        }
        return urlInfo;
    },
    navigate: function (url, skipPushState) {
        const link = this.getUrlInfo(url);
        if (!skipPushState) {
            $(document).trigger('engine.ui.navigate');
            window.history.pushState({href: link.url, skip: skipPushState}, '', link.url);
        }
        let promise = Promise.reject('Invalid link type.');
        if (link.type === 'list') {
            promise = EngineList.open({url: link.url});
        } else if (link.type === 'form') {
            promise = EngineForm.open(link.url, link.context, link.recordId);
        } else if (link.type === 'widget' || link.type === 'dashboard' || link.type === 'embed') {
            promise = this.openRenderableUrl(link.url);
        } else {
            promise = this.open(link.url);
        }
        if (promise) {
            promise.catch(function (e) {
                throw e;
            });
        }
        return promise;
    },
    openRenderableUrl: function (url) {
        return Engine.instance.ui.request('onRender', {
            url: url,
            loadingContainer: '.page-content',
            success: function (data) {
                $('#page-content').html(data.result);
            }
        });
    },
    open: function (url) {
        return Engine.instance.ui.request({
            url: url,
            loadingContainer: '.page-content',
            success: function (data) {
                $('#page-content').html(data.result);
            }
        });
    },
    getModel: function () {
        return this.currentModel;
    },
    setTenant: function (tenant) {
        this.tenant = tenant;
    },
    setModel: function (model) {
        this.currentModel = model;
    },
    showPopup: function (options) {
        const setting = Object.assign({}, options);
        const $popup = $.popup(setting);
        const popup = $popup.data('oc.popup');
        const $container = popup.$container;
        const $dialog = popup.$dialog;
        if (options.id) {
            $dialog.prop('id', options.id);
        }
        if ($dialog.find('.modal-body').length === 0) {
            popup.$body = $('<div class="modal-content"></div>').append(
                $dialog.find('.modal-content')
                    .addClass('modal-body')
                    .removeClass('modal-content')).appendTo($dialog);
        }
        const $body = popup.$body;
        if ($dialog.find('.modal-header').length === 0) {
            $body.prepend(
                '<div class="modal-header">\n' +
                '    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' +
                '</div>')
        }
        if (setting.size) {
            if (!isNaN(setting.size)) {
                $dialog.width(setting.size).css('max-width', setting.size);
            } else {
                $dialog.addClass('modal-' + setting.size).addClass(setting.size);
            }
        }
        if (setting.title) {
            $body.find('.modal-header').append('<h4 class="modal-title">' + setting.title + '</h4>');
        }
        if (setting.actions) {
            Engine.instance.addActions($('<div class="modal-footer"></div>').appendTo($body), setting.actions, popup);
        }
        if (setting.target) {
            popup.target = setting.target;
        }
        popup.close = function () {
            popup.$modal.modal('hide');
        };
        if (typeof setting.close === 'function') {
            popup.$modal.on('hide.bs.modal', function (e) {
                setting.close(e, popup);
            });
        }
        return popup;

    },
    toUIAction: function (dbActions, modelRecord, props = {}) {
        return dbActions.map(function (action) {
            action.css_class = (action.css_class.indexOf('btn') < 0 ? 'btn btn-primary ' : 'btn') + ' ' + action.css_class + ' ' + action.icon;
            action.id = (props.list ? props.list.id : '') + 'list-action-' + action.id;
            action.attributes = typeof action.html_attributes === 'string' ? JSON.parse(action.html_attributes) : action.html_attributes;
            action.modelRecord = modelRecord;
            action.tooltip = action.description;
            action.icon = false;
            delete action.html_attributes;
            const handler = Function('return ' + action.script)();
            if (typeof handler === 'object') {
                Object.assign(action, handler);
            } else {
                action.handler = handler;
            }
            Object.assign(action, props);
            return action;
        });
    },
    getOrigin: function () {
        return window.location.origin;
    },
    getBaseUrl: function () {
        return window.location.origin + this.getBaseTenantUrl();
    },
    getBaseTenantUrl: function () {
        const tenantCode = this.tenant.code;
        return '/tenant/' + tenantCode;
    },
    getControllerUrl: function (controller) {
        return this.getBaseUrl() + '/' + controller.replace(/\\/g, '/').replace('/Controllers', '').toLocaleLowerCase();
    },
    getCurrentControllerUrl: function () {
        return this.getControllerUrl(this.currentModel.controller);
    },
    navigateToApp: function (appCode) {
        return this.request('onNavigateApplication', {
            data: {
                code: appCode,
            },
            loadingContainer: '.main-wrapper',
        }).then(function (application) {
            window.location.href = application.url;
        });
    },
    request: function (handler, options) {
        if (typeof handler !== 'string') {
            options = handler;
        }
        const setting = Object.assign({loadingContainer: false, $ajax: false}, options);
        const $reqElem = $('<div/>');
        if (setting.loadingContainer) {
            setting.$loading = $(setting.loadingContainer).LoadingOverlay("show", {
                fontawesome: true,
                size: 25,
                minSize: 20,
                maxSize: 30,
                background: 'rgba(0, 0, 0, 0.2)',
                fontawesomeAutoResize: false,
            });
        }
        return new Promise(function (resolve, reject) {
            $reqElem.on('ajaxSuccess', function (e, context, data, textStatus, jqXHR) {
                if (typeof options.success === 'function') {
                    options.success.apply(this, [data, jqXHR, textStatus, context]);
                }
                resolve(data, jqXHR, textStatus, context);
            });
            $reqElem.on('ajaxComplete', function (e, context, errorMsg, textStatus, jqXHR) {
                if (setting.$loading) {
                    setting.$loading.LoadingOverlay("hide", true);
                }
            });
            $reqElem.on('ajaxError', function (e, context, errorMsg, textStatus, jqXHR) {
                if (typeof options.error === 'function') {
                    options.error.apply(this, [errorMsg, jqXHR, textStatus, context]);
                }
                reject(this, [errorMsg, jqXHR, textStatus, context]);
            });
            delete setting.success;
            delete setting.error;
            if (setting.$ajax === true) {
                Object.assign(setting, {
                    success: function (response, jqXHR) {
                        $reqElem.trigger('ajaxSuccess', ['', response, jqXHR]);
                    },
                    error: function (error) {
                        $reqElem.trigger('ajaxError', ['', error]);
                    },
                    complete: function (jqXHR) {
                        $reqElem.trigger('ajaxComplete', [jqXHR]);
                    }
                });
                $.ajax(setting);
            } else {
                if (typeof handler === 'string') {
                    $reqElem.request(handler, setting);
                } else {
                    $reqElem.request(setting.handler, setting);
                }
            }
        });
    },
    requestControllerAction: function (controller, handler, options) {
        options.url = (controller.startsWith('/backend') ? controller : EngineList.instance.getLocation({
            controller: controller,
        }));
        return this.request(handler, options);
    },
    createRecord: function (controller, record) {
        if (!Array.isArray(record)) {
            record = [record];
        }
        return this.requestControllerAction(controller, 'onCreateRecord', {
            data: {
                data: record,
            },
            method: 'post',
        });
    },
    updateRecord: function (controller, id, record) {
        return this.requestControllerAction(controller, 'onUpdateRecord', {
            data: {
                data: record,
                id: id,
            },
            method: 'post',
        });
    },
    deleteRecord: function (controller, id) {
        return this.requestControllerAction(controller, 'onDeleteRecord', {
            data: {
                data: record,
                id: id,
            },
            method: 'post',
        });
    },
    readRecord: function (controller, id) {
        return this.requestControllerAction(controller, 'onReadRecord', {
            data: {
                data: record,
                id: id,
            },
            method: 'post',
        });
    }
});
var EngineFormService = Engine.instance.define('engine.ui.FormService', {
    constructor: function () {

    }
});
var EngineListService = Engine.instance.define({
    constructor: function () {

    }
});
var EngineList = Engine.instance.define('engine.ui.EngineList', {
    constructor: function (el, modelRecord) {
        this.modelRecord = modelRecord;
        this.pagination = {};
        if (!el) {
            el = EngineList.el;
        }
        this.$el = $(el).eq(0);
        this.$el.data('engineList', this);
        this.$container = this.$el.parent();
        this.emit('init');
        $(document).trigger('engine.list.init', [this]);
    },
    bindModel: function (modelRecord) {
        this.modelRecord = modelRecord;
        $(document).trigger('engine.list.bindModel', [this]);
    },
    bind: function ($el, modelRecord) {
        this.bindModel(modelRecord);
        this.pagination = {};
        this.$el = $el;
        this.$el.data('engineList', this);
        this.emit('bind');
        $(document).trigger('engine.list.bind', [this]);
    },
    extends: EngineObservable,
    static: {
        el: '.engine-list-wrapper',
        getInstance: function (el, modelRecord, id) {
            const $el = $(el).eq(0);
            if ($el.data('engineList')) {
                return $el.data('engineList');
            }
            const list = new EngineList();
            list.bind($el, modelRecord);
            list.id = id;
            return list;
        },
        getCurrentList: function () {
            var $list = $(EngineList.el).eq(0);
            var list = $list.data('engineList');
            if (!list) {
                list = new EngineList($list.get(0), Engine.instance.ui.getModel());
            }
            list.bind($list, Engine.instance.ui.getModel());
            return list;
        },
        afterOpen: function (list) {
            $(document).trigger('engine.list.open', list);
        },
        open: function (options) {
            const _this = this;
            return new EngineList('<div/>', {
                controller: options.controller,
            }).render(Object.assign({container: '#page-content'}, options)).then(function (list) {
                _this.afterOpen(list);
                return list;
            });
        },
    },
    setRestQuery: function (restQuery) {
        this.restQuery = Object.assign({
            model: this.modelRecord.model,
        }, restQuery);
        return this;
    },
    applyFilter: function () {
        this.render();
    },
    render: function (options) {
        options = options || {};
        let $container = [];
        if (options.container) {
            $container = options.container instanceof jQuery ? options.container : $(options.container);
        } else if (this.$container) {
            $container = this.$container;
        }
        if ($container.length === 0) {
            throw new Error('Empty container ');
        }
        const _this = this;
        return Engine.instance.ui.request('onListRender', Object.assign({
            url: options.url ? options.url : Engine.instance.ui.getControllerUrl(this.modelRecord.controller),
            loadingContainer: $container.get(0) || '.page-content',
            data: {
                restQuery: this.restQuery,
            },
            success: function (data) {
                $container.html(data.result);
                $container.find('[data-control="rowlink"]').rowLink();
                $container.find('[data-control="listwidget"]').listWidget();
                Object.assign(_this, $container.find('.engine-list-wrapper').data('engineList')); // updating current object with new
            }
        }, options))
    },
    getDom() {
        return this.$el;
    },
    getActionContainer: function () {
        return this.$el.find('.engine-list-toolbar .toolbar-item').children().eq(0);
    },
    getToolbar: function () {
        if (this.$el.find('.toolbar-item .toolbar').length === 0) {
            this.$el.find('.toolbar-item').eq(1).append($('<div class="toolbar"></div>'));
        }
        return this.$el.find('.toolbar-item .toolbar');
    },
    getLocation: function () {
        return Engine.instance.ui.getBaseUrl() + '/' + (this.modelRecord.controller.replace(/\\/g, '/').replace('/Controllers', '')).toLocaleLowerCase();
    },
    navigate: function (view = 'index', queryParams = {}) {
        Engine.instance.ui.navigate(this.getLocation() + '/' + view + (Object.keys(queryParams).length > 0 ? '?' + $.param(queryParams) : ''));
    },
    addActions: function (actionRecords) {
        var actions = Engine.instance.ui.toUIAction(actionRecords, this.modelRecord, {list: this});
        Engine.instance.addActions(this.getActionContainer(), actions.filter(function (action) {
            return !action.toolbar;
        }), {list: this, parent: this});
        // toolbar actions
        Engine.instance.addActions(this.getToolbar(), actions.filter(function (action) {
            return action.toolbar;
        }), {list: this}, true);
    },
    getSelectedRecordIds: function () {
        return $('.control-list').listWidget('getChecked');
    },
    getOctoberListWidget: function () {
        return $('.control-list').listWidget();
    },
    getTotalRecord: function () {
        return this.pagination.total;
    },
    setPagination: function (pagination) {
        this.pagination = pagination;
    },
    getPagination: function () {
        return this.pagination;
    }
});
var EngineForm = Engine.instance.define('engine.ui.EngineForm', {
    static: {
        defaultSettings: {
            context: 'create',
            el: '.engine-form-wrapper',
            formConfig: {},
            loadingContainer: '.page-content',
        },
        // definition form field manipulation
        getFormFields(definition) {
            let fields = definition.form.controls.fields;
            if (definition.form.controls.tabs) {
                fields = Object.assign(fields, definition.form.controls.tabs.fields);
            }
            return Object.keys(fields).map(function (fieldName) {
                return Object.assign({name: fieldName}, fields[fieldName]);
            })
        },
        getInstance: function (options) {
            if (options.el) {
                const $el = $(options.el).eq(0);
                if ($el.data('engineForm')) {
                    return $el.data('engineForm');
                }
            } else {
                return new EngineForm(options);
            }
        },
        getCurrentForm: function () {
            var $form = $(this.defaultSettings.el).eq(0);
            var form = $form.data('engineForm');
            if (!form) {
                form = new EngineForm($form.get(0), Engine.instance.ui.getModel());
            }
            form.bindElement($form);
            form.bindModel(Engine.instance.ui.getModel());
            return form;
        },
        afterOpen: function (form) {
            $(document).trigger('engine.form.open', form);
        },
        open: function (url, context, recordId, el = '#page-content') {
            engine.ui.EngineForm.getInstance({
                context: context,
                recordId: recordId,
                el: el,
                modelRecord: {
                    controller: url
                },
                url: url,
            }).loadFormContent().render(container).then(function () {

            });
        },
    },
    extends: EngineObservable,
    constructor: function (options) {
        this.settings = Object.assign({}, this.static.defaultSettings, options);
        this.bindElement(this.settings.el);
        this.bindModel(this.settings.modelRecord);
    },
    bindElement: function (el) {
        this.formData = null;
        this.$el = el;
        if (!(el instanceof jQuery)) {
            this.$el = $(el);
        }
        this.$el.data('engineForm', this);
    },
    bindModel: function (modelRecord) {
        if (modelRecord) {
            this.modelRecord = modelRecord;
            if (this.modelRecord) {
                if (typeof modelRecord === 'string') {
                    this.modelRecord = {model: modelRecord};
                }
                this.model = this.modelRecord.model;
            }
        }
        return this;
    },
    getValue: function (field) {
        return this.getFieldElement(field).val()
    },
    getFieldElement: function (field) {
        return this.$el.find('[name$="[' + field + ']"]')
    },
    setFormConfig: function (formConfig) {
        this.settings.formConfig = formConfig;
    },
    toDefinition: function () {
        return {form: {formConfig: this.settings.formConfig}};
    },
    fromDefinition: function (definition) {
        this.settings.formConfig = definition.form.controls;
    },
    getField: function (fieldName) {
        var fields = this.static.getFormFields(this.toDefinition());
        for (var fieldName in fields) {
            return fields[fieldName];
        }
    },
    addFields: function (fields, showInTab = false) {
        let container;
        if (showInTab) {
            if (this.settings.formConfig.tabs) {
                this.settings.formConfig.tabs = {};
            }
            container = this.settings.formConfig.tabs;
        } else {
            if (!this.settings.formConfig.fields) {
                this.settings.formConfig.fields = {};
            }
            container = this.settings.formConfig.fields;
        }
        Object.assign(container, fields);
    },
    loadFormContent: function () {
        const settings = this.settings;
        let url = settings.url;
        if (!url) {
            url = Engine.instance.ui.getControllerUrl(this.modelRecord.controller) + '/' + settings.context;
            if (settings.recordId) {
                url = url + '/' + settings.recordId;
            }
        }
        this.contentPromise = Engine.instance.ui.request('onFormRender', {
            url: url,
            data: {context: settings.context, recordId: settings.recordId},
            loadingContainer: settings.loadingContainer,
        });
        return this;
    },
    reload: function () {
        return this.loadFormContent().render();
    },
    build: function (url, wrap = false) {
        const _this = this;
        this.contentPromise = Engine.instance.ui.request('onBuildForm', {
            url: url,
            wrap: wrap,
            data: {formConfig: this.settings.formConfig}
        });
        return this;
    },
    render: function (selector = null, appender = 'html') {
        const _this = this;
        let $selector = this.$el;
        if (selector) {
            $selector = selector instanceof jQuery ? selector : $(selector)
        }
        if ($selector.length === 0) {
            $selector = this.$el.get(0);
        }
        return this.contentPromise.then(function (content) {
            _this.emit('beforeRender', [content]);
            $selector[appender](content.result);
            _this.emit('render', [content]);
            $(document).trigger('engine.form.open', _this);
        });
    },
    showInPopup: function (options = {}) {
        const _this = this;
        return this.contentPromise.then(function (content) {
            _this.emit('beforeRender', [content]);
            const popup = Engine.instance.ui.showPopup(Object.assign(options, {
                content: content.result,
                target: _this,
            }));
            _this.popup = popup;
            _this.bindElement(popup.$body);
            _this.emit('render', [content]);
            $(document).trigger('engine.form.open', _this);
            return popup;
        });
    },
    isNew: function () {
        return this.settings.context === 'create';
    },
    getActionContainer: function () {
        return this.$el.find('.form-buttons .loading-indicator-container .actions');
    },
    getOctoberFormWidget: function () {
        return this.$el.data('formWidget');
    },
    getFormData: function () {
        return this.formData;
    },
    getFormModel: function () {
        return this.formModel;
    },
    setFormModel: function (formModel) {
        this.formModel = formModel;
    },
    getLocation: function (view = 'create', recordId, params = {}) {
        var formUrl = new EngineList(this.model).getLocation();
        if (typeof recordId === 'undefined') {
            formUrl = formUrl + '/' + view + '?' + $.param(params);
        } else {
            formUrl = formUrl + '/' + view + '/' + recordId + '?' + $.param(params);
        }
        return formUrl;
    },
    navigate(view = 'create', recordId = undefined) {
        var formUrl = this.getLocation(this.model, view, recordId);
        Engine.instance.ui.navigate(formUrl);
    },
    addActions: function (actionRecords) {
        var actions = Engine.instance.ui.toUIAction(actionRecords, this.modelRecord, {form: this});
        Engine.instance.addActions(this.getActionContainer(), actions, {form: this, parent: this});
    }
});

var EngineIframe = Engine.instance.define('engine.ui.Iframe', {
    static: {
        template: '<iframe frameborder="0"></iframe>',
        defaultSettings: {
            width: '100%',
            height: '400px',
        },
    },
    constructor: function (settings) {
        this.settings = Object.assign({}, this.static.defaultSettings, settings);
        this.$container = settings.container instanceof jQuery ? settings.container : $(settings.container);
    },
    render: function () {
        this.rendered = true;
        const url = Engine.instance.ui.buildUrl(this.settings.url);
        this.$el = $(this.static.template);
        const _this = this;
        return new Promise(function (resolve, reject) {
            _this.$el.prop('src', url).css({
                height: _this.settings.height,
                width: _this.settings.width,
            }).appendTo(_this.$container).on('load', function () {
                resolve(this);
            });
        }).then(function (iframe) {
            return iframe;
        });
    }
});
Engine.instance.export(new EngineFormService(), 'formService');
Engine.instance.export(new EngineListService(), 'listService');
Engine.instance.export(new EngineUI(), 'ui');
