if (!Object.assign) {
    Object.assign = jQuery.extend;
}
var Widget = function (id, containerId) {
    this.id = id;
    this.containerId = containerId || id;
    this.$el = $('#widget-container-' + this.containerId);
    this.$el.data('widget', this);
    this.events = {resize: []};
};
Object.assign(Widget.prototype, {
    getCanvas: function () {
        var $elem = this.$el;
        var $canvas = $elem.find('canvas');
        if ($canvas.length === 0) {
            $canvas = $('<canvas style="width: 100%;height: 100%;"/>').appendTo($elem);
        }
        return $canvas.get(0);
    },
    getContainer: function () {
        return this.$el.get(0);
    },
    loadData: function (callabck) {
        var _this = this;
        $.request('onData', {
            url: '/backend/demo/report/widgetcontroller/render-widget/' + this.slug,
            data: {id: this.id},
            success: function (data) {
                var data = JSON.parse(data.result);
                Object.assign(_this, data);
                _this.data = new Store(_this.data);
                callabck(_this);
            }
        })
    },
    render: function (data) {
        $(this.getContainer()).append(data.template);
        var script = this.looseParseJSON(data.script);
        script.call(this);
    },
    fetchAndRender: function () {
        var _this = this;
        this.loadData(function (data) {
            _this.render(data);
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

