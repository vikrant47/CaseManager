var EngineObservable = Engine.instance.define('engine.EngineObservable', {
    constructor: function () {
        this.events = {};
    },
    emit: function (eventName, args) {
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
    navigateByQueryString(param, value) {
        if (typeof param === 'string') {
            let name = param;
            param = {};
            param[name] = value;
        }
        const existingParams = this.parseParams();
        let queryString = $.param(Object.assign(existingParams, param));
        const urlSplit = window.location.href.split('?');
        this.navigate(urlSplit[0] + '?' + queryString);
    },
    registerPopStateListener: function () {
        const _this = this;
        window.addEventListener('popstate', function (e) {
            if (e.state) {
                _this.navigate(e.state.href, true);
            }
        });
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
        let promise;
        if (link.type === 'list') {
            promise = EngineList.open(link.url);
        } else if (link.type === 'form') {
            promise = EngineForm.open(link.url, link.context, link.recordId);
        } else if (link.type === 'widget' || link.type === 'dashboard' || link.type === 'embed') {
            promise = this.openRenderableUrl(link.url);
        } else {
            promise = this.open(link.url);
        }
        if (promise) {
            promise.then(function () {
                if (!skipPushState) {
                    $(document).trigger('engine.ui.navigate');
                    window.history.pushState({href: link.url}, '', link.url);
                }
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
            action.id = 'list-action-' + action.id;
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
        return window.location.origin + '/backend';
    },
    getCurrentControllerUrl: function () {
        return this.getBaseUrl() + '/' + this.currentModel.controller.replace(/\\/g, '/').replace('/Controllers', '').toLocaleLowerCase();
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
                    $reqElem.request(setting);
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
        getInstance: function (el, modelRecord) {
            const $el = $(el).eq(0);
            if ($el.data('engineList')) {
                return $el.data('engineList');
            }
            const list = new EngineList();
            list.bind($el, modelRecord);
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
        open: function (controller) {
            return Engine.instance.ui.request('onListRender', {
                url: controller,
                loadingContainer: '.page-content',
                success: function (data) {
                    $('#page-content').html(data.result);
                    $('[data-control="rowlink"]').rowLink();
                    $('[data-control="listwidget"]').listWidget();
                    const list = EngineList.getCurrentList();
                    EngineList.afterOpen(list);
                }
            });
        },
    },
    getContainer() {
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
        return ('/backend/' + this.modelRecord.controller.replace(/\\/g, '/').replace('/Controllers', '')).toLocaleLowerCase();
    },
    navigate: function (view = 'index', queryParams = {}) {
        Engine.instance.ui.navigate(this.getLocation() + '/' + view + (Object.keys(queryParams).length > 0 ? '?' + $.param(queryParams) : ''));
    },
    addActions: function (actionRecords) {
        var actions = Engine.instance.ui.toUIAction(actionRecords, this.modelRecord, {list: this});
        Engine.instance.addActions(this.getActionContainer(), actions.filter(function (action) {
            return !action.toolbar;
        }));
        // toolbar actions
        Engine.instance.addActions(this.getToolbar(), actions.filter(function (action) {
            return action.toolbar;
        }), this, true);
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
        el: '.engine-form-wrapper',
        getInstance: function (el, modelRecord) {
            const $el = $(el).eq(0);
            if ($el.data('engineForm')) {
                return $el.data('engineForm');
            } else {
                return new EngineForm().bind($el, modelRecord);
            }
        },
        getCurrentForm: function () {
            var $form = $(EngineForm.el).eq(0);
            var form = $form.data('engineForm');
            if (!form) {
                form = new EngineForm($form.get(0), Engine.instance.ui.getModel());
            }
            form.bind($form, Engine.instance.ui.getModel());
            return form;
        },
        afterOpen: function (form) {
            $(document).trigger('engine.form.open', form);
        },
        open: function (controller, context, recordId) {
            if (context) {
                controller = controller + '/';
                if (recordId) {
                    controller = controller + '/' + recordId;
                }
            }
            return Engine.instance.ui.request('onFormRender', {
                url: controller,
                data: {context, context, recordId: recordId},
                loadingContainer: '.page-content',
                success: function (data) {
                    $('#page-content').html(data.result);
                    const form = EngineForm.getCurrentForm();
                    EngineForm.afterOpen(form);
                }
            });
        },
    },
    extends: EngineObservable,
    constructor: function (config) {
        this.config = config
    },
    bind: function ($el, modelRecord) {
        this.modelRecord = modelRecord;
        if (this.modelRecord) {
            if (typeof modelRecord === 'string') {
                this.modelRecord = {model: modelRecord};
            }
            this.model = this.modelRecord.model;
        }
        this.formData = null;
        this.$el = $el;
        this.$el.data('engineForm', this);
        return this;
    },
    getValue: function (field) {
        return this.getField(field).val()
    },
    getField: function (field) {
        return this.$el.find('[name$="[' + field + ']"]')
    },
    setConfig: function (config) {
        this.config = config;
    },
    getField: function (fieldName) {
        var fields = Engine.instance.getFormFields(this.config);
        for (var fieldName in fields) {
            return fields[fieldName];
        }
    },
    addFields: function (fields, showInTab = false) {
        let container;
        if (showInTab) {
            if (this.config.tabs) {
                this.config.tabs = {};
            }
            container = this.config.tabs;
        } else {
            if (!this.config.fields) {
                this.config.fields = {};
            }
            container = this.config.fields;
        }
        Object.assign(container, fields);
    },
    build: function (url, wrap = false) {
        const _this = this;
        this.contentPromise = Engine.instance.ui.request('onBuildForm', {
            url: url,
            wrap: wrap,
            data: {config: this.config}
        });
        return this;
    },
    render: function (selector) {
        const _this = this;
        this.contentPromise.then(function (content) {
            _this.emit('beforeRender', [content]);
            $(selector).append(content);
            _this.emit('render', [content]);
        });
    },
    showInPopup: function (options = {}) {
        const _this = this;
        this.contentPromise.then(function (content) {
            _this.emit('beforeRender', [content]);
            const popup = Engine.instance.ui.showPopup(Object.assign(options, {
                content: content.result,
                target: _this,
            }));
            _this.popup = popup;
            _this.$el = popup.$body;
            _this.emit('render', [content]);
        });
    },
    isNew: function () {

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
        Engine.instance.addActions(this.getActionContainer(), actions);
    }
});


Engine.instance.export(new EngineFormService(), 'formService');
Engine.instance.export(new EngineListService(), 'listService');
Engine.instance.export(new EngineUI(), 'ui');
