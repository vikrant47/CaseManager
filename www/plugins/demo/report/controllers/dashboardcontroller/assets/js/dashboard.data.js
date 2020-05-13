if (!Object.assign) {
    Object.assign = jQuery.extend;
}
var Dashboard = function (id) {
    this.id = id;
    this.$el = $('#dashboard-container-' + this.id);
    this.$el.data('dashboard', this);
    this.registerEvents();
};

Object.assign(Dashboard.prototype, {
    getGridStack: function () {
        return this.$el.find('.grid-stack').data('gridstack');
    },
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
    registerEvents: function () {
        var _this = this;
        $(window).on('demo.dashboardWidgetAdded', function (event, data) {
            _this.addWidget(data.widget, data.size);
        });
        /*$(document).on('click', '.close-widget', function () {
            _this.removeWidget($(this).next().data('widget'));
        });*/
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
            $(elem).find('.widget-container').data('widget').resize();
        });
    },
    fetchAndRender: function () {
        var _this = this;
        this.loadData(function (data) {
            _this.render(data);
        });
    },
    getGridStackNode: function (widget) {
        return $(widget.getContainer()).parents('.grid-stack-item').eq(0).data('_gridstack_node');
    },
    getWidth: function (widget) {
        return this.getGridStackNode(widget).width;
    },
    resize: function (widget, dimension) {
        if (!dimension.width) {
            dimension.width = this.getWidth(widget);
        }
        if (!dimension.height) {
            dimension.height = this.getHeight(widget);
        }
        return this.getGridStack().resize($(widget.getContainer()).parents('.grid-stack-item').eq(0), dimension.width, dimension.height);
    },
    getHeight: function (widget, height) {
        return this.getGridStackNode(widget).height;
    },
    addWidget: function (widget, size) {
        var _this = this;
        var gridStack = this.getGridStack();
        var $template = $('<div class="widget-template"><button type="button" class="close widget-control close-widget" >×</button></div>');
        $template.request('onPreview', {
            url: '/backend/demo/report/widgetcontroller/render/' + widget.id,
            data: Object.assign({dashboard: true}, widget),
            update: {widget_renderer: '#widget-template'}
        });
        $template.on('ajaxSuccess', function (event, context, data) {
            var lastGrid = gridStack.grid.nodes[gridStack.grid.nodes.length - 1];
            gridStack.addWidget($template.append(data.widget_renderer).get(0), 0, lastGrid.y + lastGrid.height, size, 5);
            $template.find('.preview-link').hide();
        });
    },
    removeWidget(widget) {
        var _this = this;
        Engine.instance.confirm('Are you sure?', function () {
            var gridStack = _this.getGridStack();
            gridStack.removeWidget($(widget.getContainer()).parents('.grid-stack-item').eq(0));
        });
    },
    looseParseJSON: function (script) {
        return new Function(script);
    },
    serialize: function () {
        var items = [];
        var $grid = this.$el.find('.grid-stack');
        $grid.find('.grid-stack-item.ui-draggable').each(function () {
            var $this = $(this);
            items.push({
                x: $this.attr('data-gs-x'),
                y: $this.attr('data-gs-y'),
                width: $this.attr('data-gs-width'),
                height: $this.attr('data-gs-height'),
                widget: $this.find('.widget-container').data('widget').id
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
                config_widgets: data,
            },
            flash: 1,
        })
    }
});
window.Dashboard = Dashboard;

