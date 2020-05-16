var EngineUI = function () {
    this.currentModel = null;
};
var EngineFormService = function () {

};
var EngineListService = function () {
    this.currentList = null;
};
var EngineList = function (model, el) {
    this.model = model;
    if (!el) {
        el = '.control-list';
    }
    this.$el = $(el).eq(0);
    this.$el.data('engineList', this);
};
var EngineFrom = function (model, el) {
    this.model = model;
    this.formData = null;
    if (!el) {
        el = '[data-control="formwidget"]';
    }
    this.$el = $(el).eq(0);
    this.$el.data('engineForm', this);
};


Object.assign(EngineUI.prototype, {
    navigate: function (model, type) {

    },
    getModel: function () {
        return this.currentModel;
    },
    setModel: function (model) {
        this.currentModel = model;
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
    request: function (options) {
        return new Promise(function (resolve, reject) {
            $.request({
                url: options.url,
                data: options.data,
                method: options.method || 'get',
                success: function () {
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
            })
        });
    },
    requestControllerAction: function (controller, action, options) {
        options.url = (controller.startsWith('/backend') ? controller : EngineList.instance.getLocation({
            controller: controller,
        })) + '/' + action;
        return this.request(options);
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
    },
});
Object.assign(EngineListService.prototype, {
    getCurrentList: function () {
        if (!this.currentList) {
            this.currentList = new EngineList(Engine.instance.ui.getModel());
        }
        return this.currentList;
    }
});
Object.assign(EngineFormService.prototype, {
    getCurrentForm: function () {
        if (!this.currentForm) {
            this.currentForm = new EngineFrom(Engine.instance.ui.getModel());
        }
        return this.currentForm;
    }
});
Object.assign(EngineList.prototype, {
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
    }
});

Object.assign(EngineFrom.prototype, {

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
