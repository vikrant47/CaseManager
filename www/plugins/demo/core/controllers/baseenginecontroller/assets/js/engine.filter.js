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
            '       <a href="javascript:void(0)">{{=item.fieldObject.label}} {{=item.operator}} {{=item.displayValue || item.value}}</a> ' +
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
                return Object.assign(field, {
                    id: field.name,
                    input: 'select',
                    type: 'string',
                    plugin: 'select2',
                    values: field.options || {},
                    plugin_config: {
                        dropdownCssClass: 'filter-select2',
                        /* dropdownParent: function () {
                             return $('#filter-popup');
                         },*/
                    },
                });
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
                let association = this.getBelongsToAssociation(definition, field.name);
                if (association) {
                    return Object.assign({}, field, {
                        input: 'select',
                        type: 'relation',
                        plugin: 'select2',
                        values: {},
                        name: association.key,
                        plugin_config: {
                            ajax: {
                                transport: _.debounce(function (params, success, failure) {
                                    if (params.data.q) {
                                        const nameFrom = association.nameFrom || 'name';
                                        const otherKey = association.otherKey || 'id';
                                        new engine.Filter().select({
                                            model: association[0],
                                            attributes: [nameFrom, otherKey],
                                            limit: 20,
                                            query: params.data.q ? {
                                                "$and": [
                                                    {
                                                        [nameFrom]: {
                                                            "$regex": params.data.q
                                                        }
                                                    }
                                                ]
                                            } : {},
                                        }).then(function (data) {
                                            success({
                                                results: data.map(function (record) {
                                                    return {
                                                        id: record[otherKey],
                                                        text: record[nameFrom],
                                                    };
                                                })
                                            });
                                        })
                                    }
                                }, 1000),
                            },
                            dropdownCssClass: 'filter-select2',
                        },
                    });
                }
                return this.static.queryBuilderTypeMappings.text(field);
            },
            richeditor: function (field) {
                field.id = field.name;
                field.type = 'string';
                return field;
            }
        },
        _ready: function () {
            this.registerCustomTypes();
        },
        registerCustomTypes: function () {
            const QueryBuilder = $.fn.queryBuilder.constructor;
            QueryBuilder.extend({
                change: function (e, t) {
                    var r = new $.Event(this._tojQueryEvent(e, !0), {
                        builder: this,
                        value: t
                    });
                    const args = Array.prototype.slice.call(arguments, 2);
                    args.push(arguments[1]);
                    return this.$el.triggerHandler(r, args),
                        r.value
                },
            });
            QueryBuilder.types = Object.assign({
                relation: 'relation'
            }, QueryBuilder.types);
            const operators = QueryBuilder.OPERATORS;
            for (let op in operators) {
                if (['equal', 'not_equal', 'is_not_empty', 'is_empty', 'is_null'].indexOf(op) > -1) {
                    operators[op].apply_to.push('relation');
                }
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
    qbEvents: {
        'jsonToRule.changer': function (e, ruleData, rule) {
            const qb = this.getQueryBuilder();
            if (ruleData.displayValue) {
                rule.displayValue = ruleData.displayValue;
                const $valueEl = rule.$el.find('.rule-value-container :input');
                if ($valueEl.is('select')) {
                    $('<option/>').appendTo($valueEl).prop('value', rule.value).prop('selected', true).text(rule.displayValue);
                }
            }
        },
        'ruleToJson.changer': function (e, rule, ruleData) {
            const qb = this.getQueryBuilder();
            if (rule.displayValue) {
                ruleData.displayValue = rule.displayValue;
            }
        },
        afterUpdateRuleValue: function (e, rule) {
            console.log(rule);
            const $valueEl = rule.$el.find('.rule-value-container :input');
            if ($valueEl.is('select')) {
                const $selection = $valueEl.find('option[value="' + rule.value + '"]');
                if ($selection.length > 0) {
                    rule.displayValue = $selection.text().trim();
                } /*else if (typeof rule.value !== 'undefined') { // no option found for value ,i.e. its being rendered by setRules method
                    $('<option/>').appendTo($valueEl).prop('value', rule.value).prop('selected', true).text(rule.displayValue);
                }*/
            }
        },
        rulesChanged: function (e, rule) {
            if (this.$valueField.length > 0) {
                this.$valueField.val(JSON.stringify(this.getRules()));
            }
        }
    },
    registerEvents: function () {
        const _this = this;
        const qb = this.getQueryBuilder();
        for (let event in this.qbEvents) {
            let $event = qb._tojQueryEvent(event);
            const changerIndex = event.indexOf('.changer');
            if (changerIndex > 0) {
                $event = qb._tojQueryEvent(event.substring(0, changerIndex), true);
            }
            qb.$el.on($event, function (e, level) {
                _this.qbEvents[event].apply(_this, arguments);
            });
        }
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
    getBelongsToAssociation: function (definition, fieldName) {
        let belongsToAssocs = definition.associations.belongsTo;
        if (belongsToAssocs) {
            for (let key in belongsToAssocs) {
                if (key === fieldName || belongsToAssocs[key].key === fieldName) {
                    const association = belongsToAssocs[key];
                    return Object.assign({
                        association: 'belongsTo',
                        key: fieldName,
                        targetModel: association[0],
                    }, association);
                }
            }
        }
    },
    makeFields: function (definition) {
        if (!definition) {
            return [];
        }
        const _this = this;
        let formFields = this.getFormFields(definition).map(function (field) {
            if (field.type === 'relation') {
                return Filter.queryBuilderTypeMappings.relation.call(_this, field, definition);
            }
            return field;
        });
        let columns = this.getColumns(definition);
        return formFields.concat(columns.filter(function (column) {
            return formFields.findIndex(field => {
                return field.name === column.name || field.id === column.name;
            }) < 0;
        }).map(function (column) {
            return Object.assign({label: _.startCase(column.name.replace(/_/g, ' '))}, column)
        }))
    },
    mapFieldsToQueryBuilderFields: function (definition) {
        const _this = this;
        let fields = this.makeFields(definition).sort((field1, field2) => field1.label.localeCompare(field2.label));
        let qbFields = [];
        fields.forEach(function (field) {
            let qbField = Object.assign({id: field.name}, field);
            if (typeof Filter.queryBuilderTypeMappings[qbField.type] === 'function') {
                qbField = Filter.queryBuilderTypeMappings[qbField.type].call(_this, qbField, definition);
            } else {
                qbField.type = 'string';
            }
            qbFields.push(qbField);
        });
        return qbFields;
    },
    initQueryBuilder: function (definition) {
        this.$el.queryBuilder({
            plugins: [
                // 'sortable',
                // 'filter-description',
                'unique-filter',
                'bt-tooltip-errors',
                // 'bt-selectpicker',
                'bt-checkbox',
                'invert',
                'not-group'
            ],
            filters: this.mapFieldsToQueryBuilderFields(definition)
        });
        this.registerEvents();
    },
    build: function () {
        const _this = this;
        let defPromise = Promise.resolve(this.definition);
        if (!this.definition) {
            defPromise = this.loadDefinition();
        }
        return defPromise.then(function (definition) {
            _this.initQueryBuilder(definition);
            _this.$el.trigger('engine.filter.build', [this]);
            return _this;
        });
    },
    showInPopup: function (options) {
        this.popup = Engine.instance.ui.showPopup(Object.assign({
            content: this.$el,
            target: this,
        }, options, {
            id: 'filter-popup'
        }));
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
    setRulesFromSQL: function (rules) {
        if (this.value.trim().length > 0) {
            this.$el.queryBuilder('setRulesFromSQL', rules);
        }
    },
    getSQL: function () {
        const qb = this.getQueryBuilder();
        return qb.getSQL();
    },
    setRulesFromMongo: function (rules) {
        const qb = this.getQueryBuilder();
        return qb.setRulesFromMongo(rules);
    },
    getMongo: function () {
        const qb = this.getQueryBuilder();
        return qb.getMongo();
    },
    destroy: function () {
        if (this.$el.queryBuilder && this.$el.queryBuilder.destroy) {
            this.$el.queryBuilder.destroy();
        }
    },
    on: function (event, callback) {
        return this.getQueryBuilder().on(event, callback);
    },
    getFieldsFromMongoQuery: function (query) {
        const condition = Object.keys(query).find(function (condition) {
            return condition === '$and' || condition === '$or' || condition === '$not';
        });
        if (condition) {
            let fields = [];
            for (const rule of query[condition]) {
                fields = fields.concat(this.getFieldsFromMongoQuery(rule));
            }
            return fields;
        } else {
            return Object.keys(query);
        }
    },
    parseMongoQuery: function (query) {
        if (!_.isEmpty(query)) {
            const definition = this.definition || {
                form: {
                    controls: {
                        fields: this.getFieldsFromMongoQuery(query).map(function (field) {
                            return {
                                name: field,
                                type: 'text',
                            }
                        })
                    }
                },
                columns: [],
            };
            this.initQueryBuilder(definition);
            this.setRulesFromMongo(query);
            return this.getRules();
        }
        return null;
    },
    select: function (options) {
        options = options || {};
        options.operation = 'select';
        return this.query(options);
    },
    query: function (options) {
        const ui = Engine.instance.ui;
        const modelRecord = ui.getModel();
        const settings = Object.assign({
            model: this.definition && this.definition.model || modelRecord.model,
            query: {},
            operation: 'select',
            loadingContainer: '.page-content',
            ajax: {},
        }, options);
        const rules = this.parseMongoQuery(options.query);
        return Engine.instance.ui.request('onQueryData', Object.assign({
            data: {
                query: rules || undefined,
                queryType: settings.operation,
                table: settings.table,
                model: settings.model,
            },
            loadingContainer: settings.loadingContainer,
        }, settings.ajax));
    },
    getBreadcrumbData: function (rule, fields) {
        fields = fields || [];
        const _this = this;
        if (!rule) {
            rule = this.getRules();
            if (rule) {
                return this.getBreadcrumbData(rule, fields);
            }
        }
        if (rule.rules) {
            let data = [];
            for (const childRule of rule.rules) {
                if (!childRule.condition) {
                    let fieldObject = fields.find(function (f) {
                        return f.name === childRule.field;
                    });
                    if (!fieldObject) {
                        fieldObject = {name: childRule.field, label: childRule.field};
                    }
                    data.push(Object.assign({condition: rule.condition, fieldObject: fieldObject}, childRule));
                } else {
                    data = data.concat(this.getBreadcrumbData(childRule, fields));
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
    getBreadcrumbTemplate: function (rule, definition) {
        const ui = Engine.instance.ui;
        const _this = this;
        const breadcrumbData = this.getBreadcrumbData(rule, this.makeFields(definition));
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
    parent: null,
    setParent: function (filter) {
        this.parent = filter;
        filter.children.push(this);
    },
    addField: function (field) {
        this.definition = this.definition || {form: {controls: {fields: {}}}};
        this.definition.form.controls.fields[field.name] = field;
    },
    removeField: function (name) {
        delete this.definition.form.controls.fields[name];
    }
});

/***Parent Filter implementation*/
let ParentFilter = Engine.instance.define('engine.ParentFilter', {
    extends: Filter,
    children: [],
    addChild: function (child) {
        child.setParent(this);
    },
    makeDefinition: function () {
        for (const child of this.children) {

        }
    },
    build: function () {
        return Filter.prototype.build.apply(this, arguments);
    },
});