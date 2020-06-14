var EngineObservable = Engine.instance.define({
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
var EngineUI = Engine.instance.define({
    constructor: function () {
        this.currentModel = null;
        this.registerPopStateListener();
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
        } else {
            promise = this.open(url);
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
    open: function (url) {
        return Engine.instance.ui.request({
            url: url,
            $ajax: true,
            data: {ajax: true},
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
        if (setting.form) {
            popup.form = setting.form;
            options.form.$el = $body;
        }
        return popup;

    },
    toUIAction: function (dbActions, modelRecord, props = {}) {
        return dbActions.map(function (action) {
            action.css_class = (action.css_class.indexOf('btn') < 0 ? 'btn btn-primary ' : 'btn') + ' ' + action.css_class + ' ' + action.icon;
            action.handler = Function('return ' + action.script)();
            action.id = 'list-action-' + action.id;
            action.attributes = typeof action.html_attributes === 'string' ? JSON.parse(action.html_attributes) : action.html_attributes;
            action.modelRecord = modelRecord;
            Object.assign(action, props);
            delete action.icon;
            delete action.html_attributes;
            return action;
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
var EngineFormService = Engine.instance.define({
    constructor: function () {

    }
});
var EngineListService = Engine.instance.define({
    constructor: function () {

    }
});
var EngineList = Engine.instance.define({
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
                    $('#content-body').html(data.result);
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
    getLocation: function () {
        return ('/backend/' + this.modelRecord.controller.replace(/\\/g, '/').replace('/Controllers', '')).toLocaleLowerCase();
    },
    navigate: function (view = 'index', queryParams = {}) {
        Engine.instance.ui.navigate(this.getLocation() + '/' + view + (Object.keys(queryParams).length > 0 ? '?' + $.param(queryParams) : ''));
    },
    addActions: function (actionRecords) {
        var actions = Engine.instance.ui.toUIAction(actionRecords, this.modelRecord, {list: this});
        Engine.instance.addActions(this.getActionContainer(), actions);
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
var EngineForm = Engine.instance.define({
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
            Engine.instance.ui.showPopup(Object.assign(options, {
                content: content.result,
                form: _this,
            }));
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
