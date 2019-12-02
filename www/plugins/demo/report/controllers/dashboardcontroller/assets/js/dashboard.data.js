if (!Object.assign) {
    Object.assign = jQuery.extend;
}
var Dashboard = function (id) {
    this.id = id;
    this.$el = $('#dashboard-container-' + this.id);
    this.$el.data('dashboard', this);
};
Object.assign(Dashboard.prototype, {
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
        var $grid = this.$el.find('.grid-stack').gridstack({
            resizable: {
                handles: 'e, se, s, sw, w'
            },
            gridType: 'fit',
        }).on('gsresizestop', function (event, elem) {
            $(elem).find('.report-container').data('report').resize();
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
    },
    serialize: function () {
        var items = [];
        var $grid = this.$el.find('.grid-stack')
        $grid.find('.grid-stack-item.ui-draggable').each(function () {
            var $this = $(this);
            items.push({
                x: $this.attr('data-gs-x'),
                y: $this.attr('data-gs-y'),
                width: $this.attr('data-gs-width'),
                height: $this.attr('data-gs-height'),
                report: $this.find('.report-container').data('report').id
            });
        });
        return items;
    },
    save: function () {
        var data = this.serialize();
        $.request('onSaveData', {
            // confirm: 'Are you sure?',
            data: {
                id: this.id,
                reports_config: data,
            },
            flash: 1,
        })
    }
});
window.Dashboard = Dashboard;

