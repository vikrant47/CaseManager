if (!Object.assign) {
    Object.assign = jQuery.extend;
}
var Dashboard = function (id) {
    this.id = id;
};
Object.assign(Dashboard.prototype, {
    getCanvas: function () {
        var $elem = $('#dashboard-container-' + this.id);
        var $canvas = $elem.find('canvas');
        if ($canvas.length === 0) {
            $canvas = $('<canvas style="width: 100%;height: 100%;"/>').appendTo($elem);
        }
        return $canvas.get(0);
    },
    getContainer: function () {
        return $('#dashboard-container-' + this.id).get(0);
    },
    loadData: function (callabck) {
        var _this = this;
        $.request('onData', {
            data: {id: this.id},
            success: function (data) {
                var data = JSON.parse(data.result);
                Object.assign(_this, data);
                _this.data = new Store(_this.data);
                callabck(_this);
            }
        })
    },
    render: function () {
        $(this.getContainer()).find('.grid-stack').gridstack({
            resizable: {
                handles: 'e, se, s, sw, w'
            }
        });
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
window.Dashboard = Dashboard;

