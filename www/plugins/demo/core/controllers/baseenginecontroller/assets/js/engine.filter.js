var Filter = Engine.instance.define('engine.Filter', {
    static: {
        init: function () {

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
                    var sql = _this.getSql() || {};
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
    build: function () {
        const _this = this;
        let defPromise = Promise.resolve(this.definition);
        if (!this.definition) {
            defPromise = this.loadDefinition();
        }
        defPromise.then(function (definition) {
            _this.$el.queryBuilder({
                plugins: [
                    'bt-tooltip-errors',
                    'not-group'
                ],
                filters: Engine.instance.mapFieldsToQueryBuilderFields(definition)
            });
            _this.formatRuleDom();
            _this.registerEvents();
            if (_this.value) {
                _this.setValueFromSql(_this.value);
            }
            _this.$el.trigger('engine.filter.build', [this]);
            return _this;
        });
        return this;
    },
    showInPopup: function (options) {
        this.popup = Engine.instance.ui.showPopup(Object.assign({
            content: this.$el,
            target: this,
        }, options));
        return this;
    },
    getQueryBuilder: function () {
        return this.$el.data('queryBuilder');
    },
    setValueFromSql: function (value) {
        this.value = value;
        if (this.value.trim().length > 0) {
            this.$el.queryBuilder('setRulesFromSQL', this.value);
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
    }
});