var EngineUI = function () {
    this.currentModelRecord = null;
};
var EngineList = function () {

};
var EngineFrom = function () {
    this.formModel = null;
};


Object.assign(EngineUI.prototype, {
    navigate: function (model, type) {

    },
    getModelRecord: function () {
        return this.currentModelRecord;
    },
    setModelRecord: function (modelRecord) {
        this.currentModelRecord = modelRecord;
    },
    toUIAction: function (dbActions, modelRecord) {
        return dbActions.map(function (action) {
            action.css_class = 'btn btn-primary ' + action.css_class + ' ' + action.icon;
            action.handler = Function('return ' + action.script)();
            action.id = 'list-action-' + action.id;
            action.attributes = action.html_attributes;
            action.modelRecord = modelRecord;
            delete action.icon;
            delete action.html_attributes;
            return action;
        });
    }
});

Object.assign(EngineList.prototype, {
    getLocation: function (model) {
        return ('/backend/' + model.controller.replace(/\\/g,'/').replace('/Controllers','')).toLocaleLowerCase();
    },
    navigate: function (model, queryParams = {}, view = 'index') {
        window.location.href = this.getLocation(model) + '/' + view + '?' + $.param(queryParams);
    },
    addListActions: function (actionRecords, modelRecord) {
        var actions = EngineUI.instance.toUIAction(actionRecords, modelRecord);
        Engine.instance.addActions($('.engine-list-toolbar .toolbar-item').children().eq(0), actions);
    },
    getSelectedRecordIds: function () {
        return $('.control-list').listWidget('getChecked');
    }
});

Object.assign(EngineFrom.prototype, {

    getFormModel: function () {
        return this.formModel;
    },
    setFormModel: function (formModel) {
        this.formModel = formModel;
    },
    getLocation: function (model, recordId, view = 'update', params = {}) {
        var formUrl = EngineList.instance.getLocation(model);
        if (typeof recordId === 'undefined') {
            formUrl = formUrl + '/create';
        } else {
            formUrl = formUrl + '/' + view + '/' + recordId + '?' + $.param(params);
        }
        return formUrl;
    },
    navigate(model, recordId, view = 'update') {
        var formUrl = this.getLocation(model, recordId, view);
        window.location.href = formUrl;
    },
    addFormActions: function (actionRecords, modelRecord) {
        var actions = EngineUI.instance.toUIAction(actionRecords, modelRecord);
        Engine.instance.addActions($('.engine-form-wrapper .form-buttons .loading-indicator-container'), actions);
    }
});

EngineList.instance = new EngineList();
window.EngineList = EngineList;

EngineFrom.instance = new EngineFrom();
window.EngineFrom = EngineFrom;

EngineUI.instance = new EngineUI();
window.EngineUI = EngineUI;

Engine.instance.ui = EngineUI.instance;
Engine.instance.form = EngineFrom.instance;
Engine.instance.list = EngineList.instance;
