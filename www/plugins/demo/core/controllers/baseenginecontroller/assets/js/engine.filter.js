const _ = require('lodash');
let Filter = Engine.instance.define('engine.data.Filter', {
    static: {
        defaultPopupConfig: {
            size: 'lg',
            title: 'Filter',
            close: function (e, popup) {
                popup.target.rebuildDom();
            },
            actions: [{
                name: 'search',
                label: 'Search',
                active: true,
                icon: '',
                css_class: 'btn btn-primary',
                handler: function (e, popup) {
                    popup.target.apply();
                }
            }]
        },
        defaultConfig: {
            fields: [],
            type: 'base',
            breadcrumbContainer: null,
            renderBreadcrumb: true,
            apply: function () {
            },
        },
        create: function (config) {
            const setting = Object.assign({}, this.defaultConfig, config);
            let filter;
            if (setting.type === 'parent') {
                filter = new engine.ParentFilter(setting.el);
            } else {
                filter = new engine.data.Filter(setting.el);
            }
            if (setting.fields.length > 0) {
                filter.setFields(setting.fields);
            }
            filter.breadcrumbContainer = setting.breadcrumbContainer;
            if (setting.breadcrumbContainer && setting.renderBreadcrumb) {
                filter.on('engine.filter.build', function () {
                    filter.renderBreadcrumb();
                });
                filter.on('engine.filter.apply', function () {
                    filter.renderBreadcrumb();
                    setting.apply.call(filter);
                });
            }
            return filter;
        },
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
                let association = field.association || this.static.getBelongsToAssociation(definition, field.name);
                if (association) {
                    return Object.assign({
                        id: association.key,
                    }, field, {
                        input: 'select',
                        type: 'relation',
                        plugin: 'select2',
                        values: {},
                        name: association.key,
                        plugin_config: engine.component.Reference.getConfig(Object.assign(association, {nameFrom: field.nameFrom})),
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
        _static: function () { // when class loads in memory
            this.registerCustomTypes();
        },
        _ready: function () { // when document is ready

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
        },
        mergeDefinitions: function (definitions) {
            const mereged = {};
            for (const definition of definitions) {
                _.merge(mereged, definition);
            }
            return mereged;
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
        getColumns: function (definition) {
            return definition.columns || [];
        },
        isEmptyRule: function (rule) {
            return _.isEmpty(rule) || JSON.stringify(rule) === JSON.stringify({
                "condition": "AND",
                "not": "false",
                "valid": "true"
            });
        }
    },
    extends: engine.EngineObservable,
    constructor: function (el) {
        if (!el) {
            el = $('<div class="filter"></div>').get(0);
        }
        this.$el = $(el);
    },
    setDefinition: function (definition) {
        this.definition = definition;
    },
    setModel: function (model) {
        this.model = model;
        this.definition = model.definition; // do not remove this
    },
    loadDefinition: function () {
        const _this = this;
        const ui = Engine.instance.ui;
        if (!this.definition) {
            return ui.request('onGetModelDefinition', {
                loadingContainer: '.page-content',
                data: {model: this.model},
                url: ui.getCurrentControllerUrl(),
            }).then(function (response) {
                _this.definition = response.definition;
                return response.definition;
            })
        }
        return Promise.resolve(this.definition);
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
        beforeDestroy: function () {
            console.log('filter destroyed', this);
        },
        afterUpdateRuleValue: function (e, rule) {
            // console.log(rule);
            const $valueEl = rule.$el.find('.rule-value-container :input');
            if ($valueEl.is('select')) {
                const $selection = $valueEl.find('option').filter(function () {
                    return $(this).val().trim() === rule.value.trim();
                });
                if ($selection.length > 0) {
                    rule.displayValue = $selection.text().trim();
                } /*else if (typeof rule.value !== 'undefined') { // no option found for value ,i.e. its being rendered by setRules method
                    $('<option/>').appendTo($valueEl).prop('value', rule.value).prop('selected', true).text(rule.displayValue);
                }*/
            }
        },
        rulesChanged: function (e, rules) {
            try {
                const rules = this.getQueryBuilder().getRules();
                if (!this.static.isEmptyRule(rules)) {
                    this._rules = rules;
                }
                this.emit('engine.filter.rulesChanged', this._rules);
            } catch (e) {

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
    getDefinition() {
        return this.definition;
    },
    makeFields: function () {
        if (!this.definition) {
            throw new Error('No definition loaded in filter, use setDefinition or loadDefinition before calling this');
        }
        const _this = this;
        let formFields = engine.ui.EngineForm.getFormFields(this.definition).map(function (field) {
            if (field.type === 'relation') {
                return _this.static.queryBuilderTypeMappings.relation.call(_this, field, _this.definition);
            }
            return field;
        });
        let columns = this.static.getColumns(this.definition);
        return formFields.concat(columns.filter(function (column) {
            return formFields.findIndex(field => {
                return field.name === column.name || field.id === column.name;
            }) < 0;
        }).map(function (column) {
            return Object.assign({}, column, {
                    label: _.startCase(column.name.replace(/_/g, ' ').replace('id', '')),
                    type: column.name.endsWith('id') ? 'relation' : column.type,
                }
            )
        }))
    },
    mapFieldsToQueryBuilderFields: function () {
        const _this = this;
        let fields = this.makeFields().sort((field1, field2) => field1.label.localeCompare(field2.label));
        let qbFields = [];
        fields.forEach(function (field) {
            let qbField = Object.assign({id: field.name}, field);
            if (typeof _this.static.queryBuilderTypeMappings[qbField.type] === 'function') {
                qbField = _this.static.queryBuilderTypeMappings[qbField.type].call(_this, qbField, _this.definition);
            } else {
                qbField.type = 'string';
            }
            qbFields.push(qbField);
        });
        return qbFields;
    },
    initQueryBuilder: function () {
        if (!this.$el[0].queryBuilder) {
            this.$el.queryBuilder({
                allow_empty: true,
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
                filters: this.mapFieldsToQueryBuilderFields()
            });
            this.registerEvents();
            this.$el.data('engine.filter', this);
        }
    },
    build: function (rules) {
        rules = rules || this._rules;
        const _this = this;
        this.defPromise = Promise.resolve(this.definition);
        if (!this.definition) {
            this.defPromise = this.loadDefinition();
        }
        return this.defPromise.then(function (definition) {
            _this.initQueryBuilder(definition);
            if (rules) {
                _this.setRules(rules)
            }
            ;_this.emit('engine.filter.build', [_this]);
            return _this;
        });
    },
    toPromise() {
        return this.defPromise;
    },
    rebuildDom: function () {
        this.$el = $('<div class="filter"></div>');
        this.initQueryBuilder(this.definition);
        this.setRules(this._appliedRules);
    },
    showInPopup: function (options) {
        const settings = Object.assign({}, this.static.defaultPopupConfig, options);
        this.popup = Engine.instance.ui.showPopup(Object.assign({
            content: this.$el,
            target: this,
        }, settings, {
            id: 'filter-popup-' + new Date().getTime(),
        }));
        return this;
    },
    closePopup: function () {
        if (this.popup && this.popup.$modal) {
            this.popup.close();
        }
    },
    isEmpty: function () {
        return this.static.isEmptyRule(this.getRules());
    },
    getRules: function () {
        return this._rules || {};
    },
    setRules: function (rules) {
        /**TODO:Removing non relevant rules*/
        this._rules = rules;
        if (!_.isEmpty(rules) && this.getQueryBuilder()) {
            try {
                this.getQueryBuilder().setRules(rules);
            } catch (e) {

            }
        }
    },
    clearRules: function () {
        /**TODO:Removing non relevant rules*/
        this.getQueryBuilder().setRules({rules: []});
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
    mongoQuery: function (rules) {
        this.mongoQuery = rules;
    },
    setRulesFromMongo: function (rules) {
        if (!rules.$and && !rules.$or) {
            rules.$and = [rules];
        }
        const qb = this.getQueryBuilder();
        return qb.setRulesFromMongo(rules);
    },
    getMongo: function () {
        const qb = this.getQueryBuilder();
        return qb.getMongo();
    },
    destroy: function () {
        if (this.getQueryBuilder()) {
            this.getQueryBuilder().destroy();
        }
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
            this.definition = this.definition || {
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
            this.initQueryBuilder();
            this.setRulesFromMongo(query);
            return this.getRules();
        }
        return null;
    },
    select: function (options) {
        options = options || {};
        options.operation = 'read';
        return this.query(options);
    },
    query: function (options) {
        const ui = Engine.instance.ui;
        const modelRecord = ui.getModel();
        const settings = Object.assign({
            model: this.definition && this.definition.model || modelRecord && modelRecord.model,
            where: {},
            operation: 'select',
            loadingContainer: '.page-content',
            ajax: {},
        }, options);
        const rules = this.parseMongoQuery(options.where);
        return Engine.instance.ui.request('onQueryData', Object.assign({
            data: {
                where: rules || undefined,
                queryType: settings.operation,
                table: settings.table,
                model: settings.model,
            },
            loadingContainer: settings.loadingContainer,
        }, settings.ajax));
    },
    getRelevantRules: function (rule, fields) {
        if (!rule) {
            rule = this.getRules();
            if (rule) {
                return this.getRelevantRules(rule, fields);
            }
        }
        if (rule.rules) {
            let relevantRules = [];
            for (const childRule of rule.rules) {
                if (!childRule.condition) {
                    if (fields.findIndex(field => field.id === childRule.id) >= 0) {
                        relevantRules.push(childRule);
                    }
                } else {
                    relevantRules.concat(this.getRelevantRules(rule, fields));
                }
            }
            rule.rules = relevantRules;
            return rule;
        }
        return {};
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
                        return f.id === childRule.field;
                    });
                    if (!fieldObject) {
                        fieldObject = {name: childRule.field, label: childRule.label || childRule.field};
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
    setBreadcrumbContainer: function (breadcrumbContainer) {
        this.breadcrumbContainer = breadcrumbContainer;
    },
    renderBreadcrumb: function () {
        const $breadcrumbContainer = this.breadcrumbContainer instanceof jQuery ? this.breadcrumbContainer : $(this.breadcrumbContainer);
        $breadcrumbContainer.empty().append(this.getBreadcrumbTemplate(this.getRules(), this.definition));
    },
    getBreadcrumbTemplate: function () {
        const ui = Engine.instance.ui;
        const _this = this;
        const breadcrumbData = this.getBreadcrumbData(this.getRules(), this.makeFields());
        const template = doT.template(_this.static.breadcrumbTemplate)({items: breadcrumbData});
        const $template = $(template).data('filter', this).data('breadcrumbData', breadcrumbData);
        $template.find('.breadcrumb-item').not('.breadcrumb-item-all').find('a').click(function () {
            const $this = $(this);
            const index = $this.parent().index();
            const remainingRules = breadcrumbData.slice(0, index);
            const rules = _this.toFilterRules(remainingRules);
            _this.setRules(rules);
            _this.apply();
        });
        $template.find('.breadcrumb-item-all a').click(function () {
            _this.clearRules();
            _this.apply();
        });
        return $template;
    },
    parent: null,
    setParent: function (filter) {
        this.parent = filter;
    },
    setFields: function (fields) {
        if (_.isArray(fields)) {
            this.definition = {form: {controls: {fields: {}}}};
            for (const field of fields) {
                this.addField(field);
            }
        } else {
            this.definition = {form: {controls: {fields: fields}}}
        }
        return this;
    },
    addField: function (field) {
        this.definition = this.definition || {form: {controls: {fields: {}}}};
        this.definition.form.controls.fields[field.name] = field;
        return this;
    },
    removeField: function (name) {
        delete this.definition.form.controls.fields[name];
    },
    apply: function (callback) {
        if (typeof callback == 'function') {
            this.on('engine.filter.apply', callback);
        } else {
            this._appliedRules = this.getRules();
            this.emit('engine.filter.apply', this);
        }
        return this;
    },
});

/***Parent Filter implementation*/
let ParentFilter = Engine.instance.define('engine.ParentFilter', {
    extends: Filter,
    children: [],
    staticInheritance: true,
    addChild: function (child) {
        child.setParent(this);
        this.children.push(child);
    },
    getDefinition() {
        return this.definition = Filter.mergeDefinitions(this.children.map(child => child.definition));
    },
    build: function () {
        this.definition = this.getDefinition();
        return Filter.prototype.build.apply(this, arguments);
    },
    apply: function (callback) {
        if (typeof callback == 'function') {
            this.on('engine.filter.apply', callback);
        } else {
            for (const child of this.children) {
                const relevantRules = child.getRelevantRules(this.getRules(), child.makeFields());
                child.setRules(relevantRules);
                child.apply();
            }
            this.emit('engine.filter.apply', this);
        }
        return this;
    },
});

let RestQuery = Engine.instance.define('engine.data.RestQuery', {
    constructor: function (model) {
        this.model = model;
    },
    static: {
        invokeAPI: function (options) {
            const ui = Engine.instance.ui;
            return Engine.instance.ui.request({
                loadingContainer: options.loadingContainer || (options.showLoader && '.main-wrapper'),
                $ajax: true,
                url: ui.getBaseTenantUrl() + options.endpoint,
                data: options.data,
            });
        },
        queryParser: new Filter(),
        toQueryBuilderRules: function (query) {
            const _this = this;
            let clonedQuery = JSON.parse(JSON.stringify(query));
            let mongoQuery = clonedQuery.where;
            if (!mongoQuery.$and && !mongoQuery.$or) {
                mongoQuery = {$and: [mongoQuery]};
            }
            clonedQuery.where = this.queryParser.parseMongoQuery(mongoQuery);
            if (clonedQuery.includes) {
                clonedQuery.includes = clonedQuery.includes.map(function (query) {
                    _this.toQueryBuilderRules(query);
                });
            }
            return clonedQuery;
        },
        /**
         * This will merge given query array and return a single query
         * Note: queries should be mongo query
         * @return Object
         */
        merge: function (queries) {
            const _this = this;
            return queries.slice(1).reduce(function (query, next) {
                if (next.model !== query.model) {
                    throw new Error('Can not merge querries of different models "' + query.model + '" != "' + next.model + '"');
                }
                /**initializing where*/
                let where = query.where;
                if (!where || Object.keys(where).length === 0) {
                    where = {$and: []};
                } else if (!where.$and) {
                    where = {$and: [where]};
                }
                query.where = where;
                /**merging include queries*/
                if (next.include) {
                    if (!query.include) {
                        query.include = [];
                    }
                    for (const include of next.include) {
                        const index = query.include.findIndex(qinclude => qinclude.model === include.model);
                        if (index > -1) {
                            _this.merge(query.include[index], include);
                        } else {
                            query.include.push(include);
                        }
                    }
                    delete next.include;
                }
                if (next.where && Object.keys(where).length > 0) {
                    query.where.$and.push(next.where);
                }
                return query;
            }, queries[0]);
        }

    },
    paginate: function (query, ajaxOptions){
        return this.execute({
            query: query,
            method: 'paginate',
        }, ajaxOptions);
    },
    findOne: function (query, ajaxOptions) {
        return this.execute({
            query: query,
            method: 'findOne',
        }, ajaxOptions);
    },
    findById: function (id, ajaxOptions) {
        return this.execute({
            query: {where: {id: id}}, method: 'findById'
        }, ajaxOptions);
    },
    findAll: function (query, ajaxOptions) {
        return this.execute({query: query, method: 'findAll'}, ajaxOptions);
    },
    create: function (data, ajaxOptions = {}) {
        return this.execute({
            method: 'create',
            data: data,
        }, ajaxOptions);
    },
    update: function (data, query, ajaxOptions) {
        return this.execute({
            method: 'update',
            query: query,
            data: data,
        }, ajaxOptions);
    },
    delete: function (query, ajaxOptions) {
        return this.execute({
            method: 'delete',
            query: query,
        }, ajaxOptions);
    },
    execute: function (data, ajaxOptions = {}) {
        if (data.query) {
            data.query = this.static.toQueryBuilderRules(data.query);
        }
        data.model = this.model.replaceAll('.', '\\');
        return Engine.instance.ui.request('onQueryData', Object.assign({
            data: data,
            loadingContainer: ajaxOptions.loadingContainer || '.page-content',
        }, ajaxOptions));
    }
});
