const EngineList = Engine.instance.define('engine.ui.EngineList', {
    constructor: function (el, modelRecord) {
        this.modelRecord = modelRecord;
        this.pagination = {};
        if (!el) {
            el = EngineList.el;
        }
        this.$el = $(el).eq(0);
        this.$el.data('engineList', this);
        this.$container = this.$el.parent();
        this.emit('init');
        $(document).trigger('engine.list.init', [this]);
    },
    bindModel: function (modelRecord) {
        this.modelRecord = modelRecord;
        $(document).trigger('engine.list.bindModel', [this]);
    },
    bind: function ($el, modelRecord) {
        this.bindModel(modelRecord);
        this.pagination = {};
        this.$el = $el;
        this.$el.data('engineList', this);
        this.emit('bind');
        $(document).trigger('engine.list.bind', [this]);
    },
    extends: EngineObservable,
    static: {
        el: '.engine-list-wrapper',
        getInstance: function (el, modelRecord, id) {
            const $el = $(el).eq(0);
            if ($el.data('engineList')) {
                return $el.data('engineList');
            }
            const list = new EngineList();
            list.bind($el, modelRecord);
            list.id = id;
            return list;
        },
        getCurrentList: function () {
            var $list = $(EngineList.el).eq(0);
            var list = $list.data('engineList');
            if (!list) {
                list = new EngineList($list.get(0), Engine.instance.ui.getModel());
            }
            list.bind($list, Engine.instance.ui.getModel());
            return list;
        },
        afterOpen: function (list) {
            $(document).trigger('engine.list.open', list);
        },
        open: function (options) {
            const _this = this;
            return new EngineList('<div/>', {
                controller: options.controller,
            }).render(Object.assign({container: '#page-content'}, options)).then(function (list) {
                _this.afterOpen(list);
                return list;
            });
        },
    },
    setRestQuery: function (restQuery) {
        this.restQuery = Object.assign({
            model: this.modelRecord.model,
        }, restQuery);
        return this;
    },
    applyFilter: function () {
        this.render();
    },
    render: function (options) {
        options = options || {};
        let $container = [];
        if (options.container) {
            $container = options.container instanceof jQuery ? options.container : $(options.container);
        } else if (this.$container) {
            $container = this.$container;
        }
        if ($container.length === 0) {
            throw new Error('Empty container ');
        }
        const _this = this;
        return Engine.instance.ui.request('onListRender', Object.assign({
            url: options.url ? options.url : Engine.instance.ui.getControllerUrl(this.modelRecord.controller),
            loadingContainer: $container.get(0) || '.page-content',
            data: {
                restQuery: this.restQuery,
            },
            success: function (data) {
                $container.html(data.result);
                $container.find('[data-control="rowlink"]').rowLink();
                $container.find('[data-control="listwidget"]').listWidget();
                Object.assign(_this, $container.find('.engine-list-wrapper').data('engineList')); // updating current object with new
            }
        }, options))
    },
    getDom() {
        return this.$el;
    },
    getActionContainer: function () {
        return this.$el.find('.engine-list-toolbar .toolbar-item').children().eq(0);
    },
    getToolbar: function () {
        if (this.$el.find('.toolbar-item .toolbar').length === 0) {
            this.$el.find('.toolbar-item').eq(1).append($('<div class="toolbar"></div>'));
        }
        return this.$el.find('.toolbar-item .toolbar');
    },
    getLocation: function () {
        return Engine.instance.ui.getBaseUrl() + '/' + (this.modelRecord.controller.replace(/\\/g, '/').replace('/Controllers', '')).toLocaleLowerCase();
    },
    navigate: function (view = 'index', queryParams = {}) {
        Engine.instance.ui.navigate(this.getLocation() + '/' + view + (Object.keys(queryParams).length > 0 ? '?' + $.param(queryParams) : ''));
    },
    addActions: function (actionRecords) {
        var actions = Engine.instance.ui.toUIAction(actionRecords, this.modelRecord, {list: this});
        Engine.instance.addActions(this.getActionContainer(), actions.filter(function (action) {
            return !action.toolbar;
        }), {list: this, parent: this});
        // toolbar actions
        Engine.instance.addActions(this.getToolbar(), actions.filter(function (action) {
            return action.toolbar;
        }), {list: this}, true);
    },
    getSelectedRecordIds: function () {
        return $('.control-list').listWidget('getChecked');
    },
    getOctoberListWidget: function () {
        return $('.control-list').listWidget();
    },
    getTotalRecord: function () {
        return this.pagination.total;
    },
    setPagination: function (pagination) {
        this.pagination = pagination;
    },
    getPagination: function () {
        return this.pagination;
    }
});
module.exports = EngineList
