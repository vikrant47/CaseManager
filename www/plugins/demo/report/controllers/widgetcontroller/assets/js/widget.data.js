if (!Object.assign) {
    Object.assign = jQuery.extend;
}
var WidgetHeader = Engine.instance.define('engine.report.WidgetHeader', {
    static: {
        defaultTemplate:
            '<div class="widget-toolbar row">\n' +
            '    <div class="user-toolbar col-md-12"></div>\n' +
            '    <div class="default-toolbar"></div>\n' +
            '</div>\n' +
            '<h6 class="widget-title card-title mb-0 col-md-12"></h6>\n' +
            '<div class="text-muted mb-4 widget-description col-md-12"></div>',
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
        this.setTitle(widget.model.name);
        this.setDescription(widget.model.description);
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
        this.model = null;
        this.option = {};
        this.containerId = containerId || id;
        this.$el = $('#widget-container-' + this.containerId);
        this.$body = this.$el.find('.widget-body');
        this.$footer = this.$el.find('.widget-footer');
        this.$el.data('widget', this);
        this.events = {resize: []};
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
        option = Object.assign(this.static.defaultOptions, option);
        if (!this.isInsideDashboard()) {
            this.$el.find('.widget-body').css('height', '70vh');
        }
        this.setHeader(new WidgetHeader(this));
        this.setFooterActions(engine.data.Store.cloneArray(option.footer.actions));
    },
    setModel: function (model) {
        this.model = model;
    },
    setHeader: function (header) {
        this.header = header;
        this.header.init();
    },
    /**
     * Setting filter to widget
     * @param filter - instance of engine.Filter or field definition {fields:[]}
     */
    setFilter: function (filter) {
        const _this = this;
        if (filter instanceof engine.Filter) {
            this.filter = filter;
        } else {
            this.filter = engine.Filter.create(Object.assign({
                breadcrumbContainer: this.header.$el.find('.user-toolbar'),
            }, filter));
        }
        if (!filter.hideAction) {
            this.makeFilterHeaderAction();
        }
        return this.filter.apply(function () {
            _this.fetchAndRender();
        }).build();
    },
    getFilter: function () {
        return this.filter;
    },
    makeFilterHeaderAction: function () {
        const _this = this;
        this.header.addActions([{
            label: 'filter',
            name: 'filter',
            icon: 'fa fa-filter',
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
    loadData: function () {
        const _this = this;
        return Engine.instance.ui.request('onLoadData', {
            url: '/backend/demo/report/widgetcontroller/render/' + this.model.id,
            data: {
                id: this.model.id,
                filter: this.filter ? this.filter.getRules() : null,
            }
        }).then(function (data) {
            if (typeof data === 'string') {
                data = JSON.parse(result);
            }
            return _this.store = new Store(data);
        });
    },
    loadView: function () {
        const _this = this;
        return Engine.instance.ui.request('onLoadView', {
            url: '/backend/demo/report/widgetcontroller/render/' + this.model.id,
            data: {
                id: this.model.id,
                filter: this.filter ? this.filter.getRules() : null,
            }
        }).then(function () {
            Object.assign(_this.model, data);
            return _this.model;
        });
    },
    render: function () {
        this.init(this.option);
        this.header.render();
        $(this.getBody()).append(this.model.template);
        const script = this.looseParseJSON(this.model.script);
        script.call(this);
    },
    fetchAndRender: function () {
        const _this = this;
        this.loadView(function (widget) {
            _this.render(widget);
        });
    },
    looseParseJSON: function (script) {
        return new Function(script);
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
        if (typeof data.current_page !== 'undefined' && typeof data.per_page !== 'undefed' && typeof data.data !== 'undefined') {
            this.data = data.data;
            this.paginator = data;
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

