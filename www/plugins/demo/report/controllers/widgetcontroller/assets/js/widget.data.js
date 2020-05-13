if (!Object.assign) {
    Object.assign = jQuery.extend;
}

var Widget = function (id, containerId) {
    this.id = id;
    this.option = {};
    this.containerId = containerId || id;
    this.model = {id: id};
    this.$container = $('#widget-container-' + this.containerId);
    this.$header = this.$container.find('.widget-header');
    this.$body = this.$container.find('.widget-body');
    this.$footer = this.$container.find('.widget-footer');
    this.$container.data('widget', this);
    this.events = {resize: []};
};
Widget.defaultOptions = {
    header: {
        title: function () {
            return this.model.name;
        },
        actions: [],
        defaultActions: [{
            label: '',
            icon: 'icon-minus',
            active: function () {
                return this.scope.getDashboard();
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
            icon: 'icon-wrench',
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
            css_class: 'close-widget',
            active: function () {
                return this.scope.getDashboard();
            },
            handler: function (event, widget) {
                widget.getDashboard().removeWidget(widget);
            }
        }],
    }, footer: {
        title: '',
        actions: []
    },
};

Object.assign(Widget.prototype, {
    init: function (option) {
        options = Object.assign(Widget.defaultOptions, option);
        this.setDefaultHeaderActions(options.header.defaultActions);
        this.setHeaderActions(options.header.actions);
        this.setFooterActions(options.footer.actions);
        this.setTitle(options.header.title);
    },
    getDashboard: function () {
        return this.$container.parents('.dashboard-container').eq(0).data('dashboard');
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
        return this.$container.get(0);
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
    setTitle: function (title) {
        if (typeof title === 'function') {
            title = title.apply(this);
        }
        this.$header.find('h3').text(title);
    },
    setDefaultHeaderActions: function (actions) {
        var $toolbar = this.$header.find('.default-toolbar');
        Engine.instance.addActions($toolbar, actions, this);
    },
    setHeaderActions: function (actions) {
        var $toolbar = this.$header.find('.user-toolbar');
        Engine.instance.addActions($toolbar, actions, this);
    },
    setFooterActions: function (actions) {
        var $toolbar = this.$header.find('.widget-toolbar');
        Engine.instance.addActions($toolbar, actions, this);
    },
    loadData: function (callabck) {
        var _this = this;
        $.request('onData', {
            url: '/backend/demo/report/widgetcontroller/render/' + this.model.slug,
            data: {id: this.model.id},
            success: function (data) {
                var result = JSON.parse(data.result);
                Object.assign(_this.model, result);
                _this.data = new Store(_this.model.data);
                callabck(_this);
            }
        })
    },
    render: function (widget) {
        this.init(this.option);
        $(this.getBody()).append(widget.model.template);
        var script = this.looseParseJSON(widget.model.script);
        script.call(this);
    },
    fetchAndRender: function () {
        var _this = this;
        this.loadData(function (widget) {
            _this.render(widget);
        });
    },
    looseParseJSON: function (script) {
        return new Function(script);
    },
    onResize: function (callback) {
        this.events['resize'].push(callback);
    }, resize: function () {
        for (var i = 0; i < this.events['resize'].length; i++) {
            this.events['resize'][i].call(this);
        }
    }
});

var Store = function (data) {
    this.data = data;
};
Object.assign(Store.prototype, {
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
window.Widget = Widget;

