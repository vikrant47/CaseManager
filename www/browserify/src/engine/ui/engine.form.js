const Engine = require('../core/engine');
const EngineForm = Engine.instance.define('engine.ui.EngineForm', {
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
module.exports = EngineForm;
