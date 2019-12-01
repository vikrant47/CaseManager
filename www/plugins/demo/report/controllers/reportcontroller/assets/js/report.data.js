if (!Object.assign) {
    Object.assign = jQuery.extend;
}
var Report = function (id) {
    this.id = id;
};
Object.assign(Report.prototype, {
    getCanvas: function () {
        var $elem = $('#report-container-' + this.id);
        var $canvas = $elem.find('canvas');
        if ($canvas.length === 0) {
            $canvas = $('<canvas style="width: 100%;height: 100%;"/>').appendTo($elem);
        }
        return $canvas.get(0);
    },
    getContainer: function () {
        return $('#report-container-' + this.id).get(0);
    },
    loadData: function (callabck) {
        var _this = this;
        $.request('onData', {
            url:'/backend/demo/report/reportcontroller/render-report/'+this.slug,
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
    }
});
window.Report = Report;

