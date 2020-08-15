if (!Object.assign) {
    Object.assign = jQuery.extend;
}
var WidgetHeader = Engine.instance.define('engine.report.WidgetHeader', {
    static: {
        defaultTemplate:
            '<h6 class="widget-title card-title mb-1 col-md-9"></h6>\n' +
            '<div class="widget-toolbar col-md-3" mb-1>\n' +
            '    <div class="user-toolbar d-flex flex-row-reverse"></div>\n' +
            '    <div class="default-toolbar"></div>\n' +
            '</div>\n' +
            '<div class="text-muted mb-1 widget-description col-md-12"></div>' +
            '<div class="widget-breadcrumb col-md-12"></div>',
        defaultActions: [{
            label: '',
            icon: 'icon-minus',
            active: function () {
                return false;// return this.scope.getDashboard();
            },
            css_class: 'widget-control minimize-widget',
            handler: function (event, widget) {
                var $this = $(this);
                $(this).find('i').toggleClass('icon-plus').toggleClass('icon-minus');
                var dashboard = widget.getDashboard();
                if (dashboard) {
                    if (!widget.$body.is(':hidden')) {
                        widget.height = dashboard.getHeight(widget);
                        dashboard.resize(widget, {height: 1});
                    } else {
                        dashboard.resize(widget, {height: widget.height});
                    }
                }
                widget.$body.slideToggle();
            }
        }, {
            label: '',
            icon: 'icon-gear',
            css_class: 'setting-widget',
            active: true,
            type: 'dropdown',
            actions: [{
                label: 'Export to CSV',
                icon: 'icon-csv',
                css_class: 'export-widget',
                active: true,
                type: 'dropdownItem',
                handler: function (event, widget) {
                    window.open('/backend/demo/report/widgetcontroller/export/' + widget.model.id + '/csv');
                }
            }, {
                label: 'Export to Excel',
                icon: 'icon-csv',
                css_class: 'export-widget',
                active: true,
                type: 'dropdownItem',
                handler: function (event, widget) {
                    window.open('/backend/demo/report/widgetcontroller/export/' + widget.model.id + '/xls');
                }
            }, {
                label: 'Export to Pdf',
                icon: 'icon-csv',
                css_class: 'export-widget',
                active: true,
                type: 'dropdownItem',
                handler: function (event, widget) {
                    window.open('/backend/demo/report/widgetcontroller/export/' + widget.model.id + '/pdf');
                }
            }],
            handler: function (event, widget) {

            }
        }, {
            label: '',
            icon: 'icon-trash',
            css_class: 'delete-widget',
            active: function () {
                return this.scope.widget.getDashboard() && this.scope.widget.getDashboard().context === 'preview';
            },
            handler: function (event, widget) {
                widget.getDashboard().removeWidget(widget);
            }
        }],
    },
    constructor: function (widget, template) {
        if (!template) {
            template = this.static.defaultTemplate;
        }
        this.widget = widget;
        this.$el = widget.$el.find('.widget-header');
        this.template = template;
        this.$template = $(this.template);
    },
    init: function () {

    },
    render: function () {
        this.$template.appendTo(this.$el.empty());
        this.setTitle(this.widget.model.name);
        this.setDescription(this.widget.model.description);
        this.setDefaultActions()
    },
    setTitle: function (title) {
        if (typeof title === 'function') {
            title = title.apply(this);
        }
        this.$el.find('.widget-title').text(title);
    },
    setDescription: function (description) {
        if (typeof description === 'function') {
            description = description.apply(this);
        }
        this.$el.find('.widget-description').text(description);
    },
    setDefaultActions: function () {
        var $toolbar = this.$el.find('.default-toolbar');
        Engine.instance.addActions($toolbar, engine.data.Store.cloneArray(this.static.defaultActions), this);
    },
    addActions: function (actions) {
        const $toolbar = this.$el.find('.user-toolbar');
        return Engine.instance.addActions($toolbar, actions, this);
    }
});

Engine.instance.define('engine.report.Widget', {
    constructor: function (id, containerId) {
        this.model = {id: id};
        this.option = {};
        this.containerId = containerId || id;
        this.$el = $('#widget-container-' + this.containerId);
        this.$body = this.$el.find('.widget-body');
        this.$footer = this.$el.find('.widget-footer');
        this.$el.data('widget', this);
        this.events = {resize: []};
        this.pagination = new engine.data.Pagination();
    },
    static: {
        defaultOptions: {
            footer: {
                title: '',
                actions: []
            },
        }
    },
    init: function (option) {
        if (!this.initialized) {
            option = Object.assign(this.static.defaultOptions, option);
            if (!this.isInsideDashboard()) {
                this.$el.find('.widget-body').css('height', '70vh');
            }
            this.setHeader(new WidgetHeader(this));
            this.setFooterActions(engine.data.Store.cloneArray(option.footer.actions));
            this.header.render();
            this.initWidgetScript();
            this.initialized = true;
        }
    },
    setModel: function (model) {
        this.model = model;
    },
    setHeader: function (header) {
        this.header = header;
        this.header.init();
    },
    setPagination: function (pagination) {
        if (!(pagination instanceof engine.data.Pagination)) {
            pagination = engine.data.Pagination.create(Object.assign({el: this.$footer.find('.engine-pagination').get()}, pagination));
        }
        this.pagination = pagination;
    },
    /**
     * Setting filter to widget
     * @param filter - instance of engine.data.Filter or field definition {fields:[]}
     */
    setFilter: function (filter) {
        const _this = this;
        const ui = Engine.instance.ui;
        if (filter instanceof engine.data.Filter) {
            this.filter = filter;
        } else {
            this.filter = engine.data.Filter.create(Object.assign({
                breadcrumbContainer: this.header.$el.find('.widget-breadcrumb'),
            }, filter));
        }
        const params = ui.parseParams();
        this.filter.setRules(params.urlFilter);
        if (!filter.hideAction) {
            this.makeFilterHeaderAction();
        }
        return this.filter.apply(function () {
            if (!_this.isInsideDashboard()) {
                ui.updateQueryString('urlFilter', this.getRules(), false);
            }
            _this.pagination.reset();
            _this.fetchAndRender();
            _this.filter.closePopup();
        }).build().then(function () {
            if (_this.isInsideDashboard()) {
                _this.getDashboard().getFilter().addChild(_this.filter);
            }
        });
    },
    getFilter: function () {
        return this.filter;
    },
    makeFilterHeaderAction: function () {
        const _this = this;
        this.header.addActions([{
            /*label: 'filter',*/
            name: 'filter',
            icon: 'oc-icon-filter',
            handler: function () {
                _this.filter.showInPopup();
            }
        }]);
    },
    getDashboard: function () {
        return this.$el.parents('.dashboard-container').eq(0).data('dashboard');
    },
    isInsideDashboard: function () {
        return typeof this.getDashboard() !== 'undefined';
    },
    getCanvas: function () {
        var $elem = this.$body;
        var $canvas = $elem.find('canvas');
        if ($canvas.length === 0) {
            $canvas = $('<canvas style="width: 100%;height: 100%;"/>').appendTo($elem);
        }
        return $canvas.get(0);
    },
    getContainer: function () {
        return this.$el.get(0);
    },
    getHeader: function () {
        return this.$header.get(0);
    },
    getFooter: function () {
        return this.$footer.get(0);
    },
    getBody: function () {
        return this.$body.get(0);
    },
    setOption: function (option) {
        this.option = option;
    },
    setFooterActions: function (actions) {
        var $toolbar = this.$footer.find('.widget-toolbar');
        Engine.instance.addActions($toolbar, actions, this);
    },
    setData: function (data) {
        return this.store = new Store(data);
    },
    loadData: function () {
        const _this = this;
        return this.pagination.httpConfig({
            action: 'onLoadData', options: {
                url: '/backend/demo/report/widgetcontroller/render/' + this.model.id,
                data: {
                    id: this.model.id,
                    filter: this.filter ? this.filter.getRules() : null,
                }
            }
        }).paginate().map(function (data) {
            if (typeof data === 'string') {
                data = JSON.parse(data);
            }
            _this.setData(data);
            return _this.model;
        });
    },
    onLoadWidget: function (includeScript = true) {
        const _this = this;
        return this.pagination.httpConfig({
            action: 'onLoadWidget', options: {
                url: '/backend/demo/report/widgetcontroller/render/' + this.model.id,
                // loadingContainer: _this.getBody(),
                data: {
                    id: this.model.id,
                    filter: this.filter ? this.filter.getRules() : null,
                    script: includeScript,
                }
            }
        }).paginate().map(function (widget) {
            const pagination = widget.data.pagination;
            _this.pagination.update(pagination);
            Object.assign(_this.model, widget);
            _this.setData(widget.data);
            return _this.model;
        });
    },
    render: function () {
        const _this = this;
        $(this.getBody()).empty().append(this.model.template);
        const widgetScript = this.parseScript();
        widgetScript.render.call(this);
        this.pagination.render();
    },
    parseScript: function () {
        const script = this.looseParseJSON(this.model.script);
        let widgetScript = script.call(this);
        if (widgetScript) {
            if (typeof widgetScript !== 'object') {
                widgetScript = {
                    init: function () {
                    }, render: widgetScript
                };
            }
        }
        return widgetScript;
    },
    initWidgetScript: function () {
        if (!this.widgetScriptInitialized) {
            const script = this.parseScript();
            script.init.call(this);
            this.widgetScriptInitialized = true;
        }
    },
    fetchAndRender: function () {
        const _this = this;
        this.init(this.option);
        this.onLoadWidget(!this.initialized).subscribe(function (widget) {
            _this.render(widget);
        });
    },
    looseParseJSON: function (script) {
        return new Function('return ' + script);
    },
    onResize: function (callback) {
        this.events['resize'].push(callback);
    },
    resize: function () {
        for (var i = 0; i < this.events['resize'].length; i++) {
            this.events['resize'][i].call(this);
        }
    }
});
var Store = Engine.instance.define('engine.data.Store', {
    static: {
        cloneArray: function (array) {
            return array.map(function (element) {
                return typeof element === 'object' ? Object.assign({}, element) : element;
            });
        }
    },
    constructor: function (data) {
        if (typeof data.pagination !== 'undefined') {
            this.data = data.data;
            this.pagination = data.pagination;
        } else {
            this.data = data;
        }
    },
    getKeys: function () {
        var keyData = this.data;
        if (jQuery.isArray(keyData)) {
            keyData = keyData[0];
        }
        return Object.keys(keyData);
    },
    getValues: function (field) {
        var values = [];
        var dataValue = this.data;
        if (!jQuery.isArray(dataValue)) {
            dataValue = [dataValue];
        }
        dataValue.forEach(function (data) {
            if (field) {
                values.push(data[field]);
            } else {
                var record = [];
                for (var i in data) {
                    record.push(data[i]);
                }
                values.push(record);
            }

        });
        return values;
    }, replaceKey: function (key, newKey) {
        this.data.forEach(function (rec) {
            if (rec[key]) {
                rec[newKey] = rec[key];
                delete rec[key];
            }
        })
    },
    get: function () {
        return this.data;
    }
});

