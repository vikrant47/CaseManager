var EngineEvent = Engine.instance.define({
    constructor: function () {
        this.events = {};
    }, emit: function (eventName, args) {
        const _this = this;
        if (this.events[eventName]) {
            this.events[eventName].forEach(function (callbaack) {
                callbaack.apply(_this, args);
            });
        }
        return this;
    }, on: function (eventName, callback) {
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
    },
    navigate: function (model, type) {

    },
    getModel: function () {
        return this.currentModel;
    },
    setModel: function (model) {
        this.currentModel = model;
    },
    showPopup: function (options) {
        const $popup = $.popup(options);
        const popup = $popup.data('oc.popup');
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
        if (options.title) {
            $body.find('.modal-header').append('<h4 class="modal-title">' + options.title + '</h4>');
        }
        if (options.actions) {
            Engine.instance.addActions($('<div class="modal-footer"></div>').appendTo($body), options.actions, popup);
        }
        if (options.form) {
            popup.form = options.form;
            options.form.$el = $body;
        }

    },
    toUIAction: function (dbActions, model) {
        return dbActions.map(function (action) {
            action.css_class = (action.css_class.indexOf('btn') < 0 ? 'btn btn-primary ' : 'btn') + ' ' + action.css_class + ' ' + action.icon;
            action.handler = Function('return ' + action.script)();
            action.id = 'list-action-' + action.id;
            action.attributes = typeof action.html_attributes === 'string' ? JSON.parse(action.html_attributes) : action.html_attributes;
            action.model = model;
            delete action.icon;
            delete action.html_attributes;
            return action;
        });
    },
    request: function (handler, options) {
        if (typeof handler !== 'string') {
            options = handler;
        }
        var setting = Object.assign({}, options);
        return new Promise(function (resolve, reject) {
            Object.assign(setting, {
                beforeUpdate: function () {
                    if (typeof options.success === 'function') {
                        options.success.apply(this, arguments);
                    }
                    resolve.apply(this, arguments);
                }, error: function () {
                    if (typeof options.error === 'function') {
                        options.success.apply(this, arguments);
                    }
                    reject.apply(this, arguments);
                }
            });
            if (typeof handler === 'string') {
                $.request(handler, setting);
            } else {
                $.request(setting);
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

    },
    getCurrentForm: function () {
        if (!this.currentForm) {
            this.currentForm = EngineForm.getInstance(Engine.instance.ui.getModel());
        }
        return this.currentForm;
    }
});
var EngineListService = Engine.instance.define({
    constructor: function () {
        this.currentList = null;
    },
    getCurrentList: function () {
        if (!this.currentList) {
            this.currentList = new EngineList(Engine.instance.ui.getModel());
        }
        return this.currentList;
    }
});
var EngineList = Engine.instance.define({
    constructor: function (model, el) {
        this.model = model;
        this.pagination = {};
        if (!el) {
            el = '.control-list';
        }
        this.$el = $(el).eq(0);
        this.$el.data('engineList', this);
    },
    static: {
        getCurrentList: function () {
            if (!this.currentList) {
                this.currentList = new EngineList(Engine.instance.ui.getModel());
            }
            return this.currentList;
        }
    },
    getContainer() {
        return this.$el;
    },
    getActionContainer: function () {
        return $('.engine-list-toolbar .toolbar-item').children().eq(0);
    },
    getLocation: function () {
        return ('/backend/' + this.model.controller.replace(/\\/g, '/').replace('/Controllers', '')).toLocaleLowerCase();
    },
    navigate: function (view = 'index', queryParams = {}) {
        window.location.href = this.getLocation(this.model) + '/' + view + (Object.keys(queryParams).length > 0 ? '?' + $.param(queryParams) : '');
    },
    addActions: function (actionRecords) {
        var actions = Engine.instance.ui.toUIAction(actionRecords, this.model);
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
        getInstance: function (model, el) {
            const form = new EngineForm();
            form.model = model;
            form.formData = null;
            if (!el) {
                el = '[data-control="formwidget"]';
            }
            form.$el = $(el).eq(0);
            form.$el.data('engineForm', this);
        },
        getCurrentForm: function () {
            if (!this.currentForm) {
                this.currentForm = EngineForm.getInstance(Engine.instance.ui.getModel());
            }
            return this.currentForm;
        }
    },
    extends: EngineEvent,
    constructor: function (config) {
        this.config = config
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
                form: this,
            }));
            _this.emit('render', [content]);
        });
    },
    isNew: function () {

    },
    getActionContainer: function () {
        return $('.engine-form-wrapper .form-buttons .loading-indicator-container .actions');
    },
    getOctoberFormWidget: function () {
        return this.$el.data('formWidget');
    },
    getFormData: function () {
        return this.formData;
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
        window.location.href = formUrl;
    },
    addActions: function (actionRecords) {
        var actions = Engine.instance.ui.toUIAction(actionRecords, this.model);
        Engine.instance.addActions(this.getActionContainer(), actions);
    }
});


Engine.instance.export(new EngineFormService(), 'formService');
Engine.instance.export(new EngineListService(), 'listService');
Engine.instance.export(new EngineUI(), 'ui');
