if (!Object.assign) {
    Object.assign = jQuery.extend;
}
var Widget = function (id, containerId) {
    this.id = id;
    this.containerId = containerId || id;
    this.model = {id: id};
    this.$el = $('#widget-container-' + this.containerId);
    this.$header = this.$el.find('.widget-header');
    this.$body = this.$el.find('.widget-body');
    this.$footer = this.$el.find('.widget-footer');
    this.$el.data('widget', this);
    this.events = {resize: []};
};
Widget.defaultOptions = {
    header: {
        title: '',
        actions: [],
        defaultActions: [{

        }],
    }, footer: {
        title: '',
        actions: []
    },
};
Object.assign(Widget.prototype, {
    init: function (options) {
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
    addActions: function ($element, actions) {
        var defaultActionOption = {
            template: '<button><i class=""></i> </button>',
            icon: 'icon-link',
            event: 'click',
            handler: function () {

            }
        };
        var _this = this;
        actions.forEach(function (action) {
            action = Object.assign(defaultActionOption, action);
            var $template = $(action.template).on(action.event, function () {
                action.handler.apply(this, arguments);
            }).find('i').addClass(action.icon);
            if (action.text) {
                $template.text(action.text);
            }
            $element.append($template);
        });
    },
    setHeaderActions: function (actions) {
        var $toolbar = this.$header.find('widget-toolbar');
        this.addActions($toolbar, actions);
    },
    setFooterActions: function (actions) {
        var $toolbar = this.$header.find('widget-toolbar');
        this.addActions($toolbar, actions);
    },
    loadData: function (callabck) {
        var _this = this;
        $.request('onData', {
            url: '/backend/demo/report/widgetcontroller/render-widget/' + this.model.slug,
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

