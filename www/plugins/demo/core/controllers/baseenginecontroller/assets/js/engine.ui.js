var EngineUI = function () {
    this.currentModelRecord = undefined;
    this.currentController = undefined;
};
var EngineList = function () {

};
var EngineFrom = function () {

};


Object.assign(EngineUI.prototype, {
    navigate: function (model, type) {

    }, getCurrentModel: function () {
        return this.currentModelRecord;
    }, setCurrentModel: function (modelRecord) {
        this.currentModelRecord = modelRecord;
    }, getCurrentController: function () {
        return this.currentController;
    }, getCurrentController: function (currentController) {
        this.currentController = currentController;
    }, toUIAction: function (dbActions, modelRecord) {
        return dbActions.map(function (action) {
            action.css_class = 'btn btn-primary ' + action.css_class + ' ' + action.icon;
            action.handler = Function(action.script);
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
    getLocation: function (controller, model) {
        var packagePath = model.model.split('\\');
        return ('/backend/' + packagePath[0] + '/' + packagePath[1]).toLocaleLowerCase();
    },
    navigate: function (controller, model, queryParams = {}) {
        window.location.href = this.getLocation(controller, model) + '?' + $.param(queryParams);
    },
    addListActions: function (actionRecords, modelRecord) {
        var actions = EngineUI.instance.toUIAction(actionRecords, modelRecord);
        Engine.instance.addActions($('.engine-list-toolbar .toolbar-item').children().eq(0), actions);
    }
});

Object.assign(EngineFrom.prototype, {
    getLocation: function (controller, model, recordId, view = 'update') {
        var formUrl = EngineList.getLocation(controller, model);
        if (typeof recordId === 'undefined') {
            formUrl = formUrl + '/create';
        } else {
            formUrl = formUrl + '/' + view;
        }
        return formUrl;
    },
    navigateToForm(controller, model, recordId, view = 'update') {
        var formUrl = this.getLocation(controller, model, recordId, view);
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
