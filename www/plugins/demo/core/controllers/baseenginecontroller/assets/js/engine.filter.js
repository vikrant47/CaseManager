let Filter = Engine.instance.define('engine.Filter', {
    static: {
        breadcrumbTemplate:
            '<ul class="filter-breadcrumb breadcrumb">\n' +
            '   <li id="item-all" class="breadcrumb-item breadcrumb-item-all">' +
            '       <a href="javascript:void(0)">All</a>' +
            '       {{?it.items.length > 0}}<div class="condition and"></div> {{?}}' +
            '   </li>' +
            '{{~it.items :item:index}}' +
            '   <li id="{{=item.id}}" class="breadcrumb-item">' +
            '       <a href="javascript:void(0)">{{=item.field}} {{=item.operator}} {{=item.value}}</a> ' +
            '   {{? index !== it.items.length -1 }}' +
            '       <div class="condition {{=item.condition.toLowerCase()}}"></div> ' +
            '   {{?}}' +
            '   </li>\n' +
            '{{~}}' +
            '</ul>',
        init: function () {

        },
        queryBuilderTypeMappings: {
            dropdown: function (field) {
                field.id = field.name;
                field.input = 'select';
                field.type = 'string';
                field.plugin = 'select2',
                    field.values = field.options || {};
                return field;
            }, datetime: function (field) {
                return Object.assign(field, {
                    id: field.name,
                    type: 'date',
                    plugin: 'datepicker',
                    plugin_config: {
                        format: 'yyyy/mm/dd',
                        todayBtn: 'linked',
                        todayHighlight: true,
                        autoclose: true
                    }
                });
            }, text: function (field) {
                field.id = field.name;
                field.type = 'string';
                return field;
            }, switch: function (field) {
                field.id = field.name;
                field.input = 'radio';
                field.type = 'boolean';
                field.values = {1: 'Yes', 0: 'No'};
                return field;
            }, number: function (field) {
                field.id = field.name;
                field.type = 'double';
                return field;
            }, relation: function (field, definition) {
                let belongsToAssoc = definition.associations.belongsTo;
                if (belongsToAssoc && belongsToAssoc[field.name]) {
                    field.id = belongsToAssoc[field.name].key;
                } else {
                    field.id = field.name;
                }
                field.type = 'string';
                return field;
            }, richeditor: function (field) {
                field.id = field.name;
                field.type = 'string';
                return field;
            }
        }
    },
    constructor: function (el, valueElement, value, destroyExisting = true) {
        if (!el) {
            el = $('<div class="filter"></div>').get(0);
        }
        this.$el = $(el);
        this.$el.data('engine.filter', this);
        this.$valueField = $(valueElement);
        if (!value && this.$valueField.length > 0) {
            value = this.$valueField.val();
        }
        this.value = value;
        if (destroyExisting) {
            this.destroy();
        }
    },
    setDefinition: function (definition) {
        this.definition = definition;
    },
    setModel: function (model) {
        this.model = model;
    },
    loadDefinition: function () {
        const _this = this;
        const ui = Engine.instance.ui;
        return ui.request('onGetModelDefinition', {
            loadingContainer: '.page-content',
            data: {model: this.model},
            url: ui.getCurrentControllerUrl(),
        }).then(function (response) {
            _this.definition = response.definition;
            return response.definition;
        })
    },
    formatRuleDom: function (rule) {
        /*let $container = this.$el;
        if (rule) {
            $container = rule.$el;
        }
        $container.find('select').filter(function () {
            return !$(this).data('select2');
        }).select2();*/
    },
    registerEvents: function () {
        const _this = this;
        const qb = this.getQueryBuilder();
        if (this.$valueField.length > 0) {
            qb.on('rulesChanged', function (e, level) {
                try {
                    let sql = _this.getSql() || {};
                    if (!sql.sql) {
                        // TODO : prevent form to be submitted
                    }
                    _this.$valueField.val(sql.sql);
                } catch (e) {
                    console.error(e);
                }
            });
        }
        qb.on('afterAddRule', function (event, rule) {
            _this.formatRuleDom(rule);
        });
    },
// definition form field manipulation
    getFormFields(definition) {
        definition = definition || this.definition;
        let fields = definition.form.controls.fields;
        if (definition.form.controls.tabs) {
            fields = Object.assign(fields, definition.form.controls.tabs.fields);
        }
        return Object.keys(fields).map(function (fieldName) {
            return Object.assign({name: fieldName}, fields[fieldName]);
        })
    },
    getColumns(definition) {
        definition = definition || this.definition;
        return definition.columns;
    },
    mapFieldsToQueryBuilderFields: function (definition) {
        let formFields = this.getFormFields(definition).map(function (field) {
            if (field.type === 'relation') {
                return Filter.queryBuilderTypeMappings.relation(field, definition);
            }
            return field;
        });
        let columns = this.getColumns(definition);
        let fields = formFields.concat(columns.filter(function (column) {
            return formFields.findIndex(field => {
                return field.name === column.name || field.id === column.name;
            }) < 0;
        }).map(function (column) {
            return Object.assign({label: _.startCase(column.name.replace(/_/g, ' '))}, column)
        })).sort((field1,field2) => field1.label.localeCompare(field2.label));
        let qbFields = [];
        fields.forEach(function (field) {
            let qbField = Object.assign({id: field.name}, field);
            if (typeof Filter.queryBuilderTypeMappings[qbField.type] === 'function') {
                qbField = Filter.queryBuilderTypeMappings[qbField.type](qbField, definition);
            } else {
                qbField.type = 'string';
            }
            qbFields.push(qbField);
        });
        return qbFields;
    },
    build: function () {
        const _this = this;
        let defPromise = Promise.resolve(this.definition);
        if (!this.definition) {
            defPromise = this.loadDefinition();
        }
        return defPromise.then(function (definition) {
            _this.$el.queryBuilder({
                plugins: [
                    'bt-tooltip-errors',
                    'not-group'
                ],
                filters: _this.mapFieldsToQueryBuilderFields(definition)
            });
            _this.formatRuleDom();
            _this.registerEvents();
            if (_this.value) {
                _this.setValueFromSql(_this.value);
            }
            _this.$el.trigger('engine.filter.build', [this]);
            return _this;
        });
    },
    showInPopup: function (options) {
        this.popup = Engine.instance.ui.showPopup(Object.assign({
            content: this.$el,
            target: this,
        }, options));
        return this;
    },
    closePopup: function () {
        this.popup.close();
    },
    getRules: function () {
        return this.getQueryBuilder().getRules();
    },
    setRules: function (rules) {
        this.getQueryBuilder().setRules(rules);
    },
    getQueryBuilder: function () {
        return this.$el.data('queryBuilder');
    },
    setValueFromSql: function (value) {
        if (this.value.trim().length > 0) {
            this.$el.queryBuilder('setRulesFromSQL', value);
        }
    },
    getSQL: function () {
        const qb = this.getQueryBuilder();
        return qb.getSQL();
    },
    destroy: function () {
        if (this.$el.queryBuilder && this.$el.queryBuilder.destroy) {
            this.$el.queryBuilder.destroy();
        }
    },
    on: function (event, callback) {
        return this.getQueryBuilder().on(event, callback);
    },
    getBreadcrumbData: function (rule) {
        const _this = this;
        if (!rule) {
            rule = this.getRules();
            if (rule) {
                return this.getBreadcrumbData(rule);
            }
        }
        if (rule.rules) {
            let data = [];
            for (const childRule of rule.rules) {
                if (!childRule.condition) {
                    data.push(Object.assign({condition: rule.condition}, childRule));
                } else {
                    data = data.concat(this.getBreadcrumbData(childRule));
                }
            }
            return data;
        }
        return [];
    },
    toFilterRules: function (breadcrumbRules) {
        if (breadcrumbRules.length > 0) {
            const filterRules = [];
            let lastCondition = breadcrumbRules[0].condition;
            let parentRule = {condition: lastCondition, rules: []};
            for (let i = 0; i < breadcrumbRules.length; i++) {
                const rule = Object.assign({}, breadcrumbRules[i], {condition: undefined});
                if (breadcrumbRules[0].condition === lastCondition) {
                    parentRule.rules.push(rule);
                } else {
                    parentRule.rules.push(this.toFilterRules(breadcrumbRules.slice(i)));
                }
            }
            return parentRule;
        }
        return null;
    },
    getBreadcrumbTemplate: function (rule) {
        const ui = Engine.instance.ui;
        const _this = this;
        const breadcrumbData = this.getBreadcrumbData(rule);
        const template = doT.template(Filter.breadcrumbTemplate)({items: breadcrumbData});
        const $template = $(template).data('rule', rule).data('breadcrumbData', breadcrumbData);
        $template.find('.breadcrumb-item').not('.breadcrumb-item-all').find('a').click(function () {
            const $this = $(this);
            const index = $this.parent().index();
            const remainingRules = breadcrumbData.slice(0, index);
            const rules = _this.toFilterRules(remainingRules);
            if (rules) {
                ui.navigateByQueryString('urlFilter', rules);
            } else {
                ui.navigateByQueryString('urlFilter', {});
            }
        });
        $template.find('.breadcrumb-item-all a').click(function () {
            ui.navigateByQueryString('urlFilter', {});
        });
        return $template;
    },
});