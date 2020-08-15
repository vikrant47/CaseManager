let Pagination = Engine.instance.define('engine.data.Pagination', {
    static: {
        template: `<nav aria-label="Engine Pagination" style="display: flex;cursor: pointer;">
                      <ul class="pagination">
                        <li class="page-item ml-1 {{?!it.hasPrev() }}disabled{{?}}">
                            <a class="page-link prev" href="javascript:void(0)">Previous</a> 
                        </li>
                        {{for(var i=0;i<it.getMaxPageNum();i++){}}
                            <li class="page-item ml-1"><a class="page-link goto {{?i==it.getCurrentPage()}}active{{?}}" href="javascript:void(0)" data-page="{{=i+1}}">{{=i+1}}</a></li>
                        {{}}}
                        {{?it.totalPage>it.pageNumDigitDisplayCount+1}}
                            <li class="page-item ml-1"><a class="" href="javascript:void(0)" >......</a></li>
                            <li class="page-item ml-1"><a class="page-link goto {{?it.totalPage-1==it.getCurrentPage()}}active{{?}}" href="javascript:void(0)" data-page="{{=it.totalPage-1 }}">{{=it.totalPage -1}}</a></li>
                            <li class="page-item ml-1"><a class="page-link goto {{?it.totalPage==it.getCurrentPage()}}active{{?}}" href="javascript:void(0)" data-page="{{=it.totalPage}}">{{=it.totalPage}}</a></li>
                        {{?}}
                        <li class="page-item ml-1 {{?!it.hasNext() }}disabled{{?}}">
                             <a class="page-link next" href="javascript:void(0)">Next</a> 
                        </li>
                      </ul>
                      <select class="form-control page-size ml-1" style="height: 27px;">
                          {{~it.settings.pageSizeOptions :item:index}}
                          <option value="{{=item}}" {{?it.getPageSize()==item}}selected="selected"{{?}}>{{=item}}</option>
                          {{~}}
                      </select>
                    </nav>`,
        defaultConfig: {
            totalRecords: -1,
            recordsPerPage: 20,
            offset: 0,
            pageNumDigitDisplayCount: 5,
            pageSizeOptions: [20, 40, 80, 100],
        },
        create: function (config) {
            return new engine.data.Pagination(config.el, config);
        }
    },
    constructor: function (el, config) {
        this.setEl(el);
        this.settings = Object.assign(this.static.defaultConfig, config);
        this.rxjsSubscriptions = [];
        this.init();
    },
    destroy: function () {
        this.unscbscribe();
        this.$el.find('.')
        this.$el.data('engine.pagination', undefined);
    },
    setEl: function (el) {
        if (!el) {
            el = '<div class="engine-pagination"></div>';
        }
        this.$el = $(el);
        this.$el.data('engine.pagination', this);
    },
    init: function () {
        this.pageNumDigitDisplayCount = parseInt(this.settings.pageNumDigitDisplayCount, 10);
        this.totalRecords = parseInt(this.settings.totalRecords, 10);
        this.recordsPerPage = parseInt(this.settings.recordsPerPage, 10);
        this.offset = parseInt(this.settings.offset, 10);
        this.totalPage = this.totalRecords / this.recordsPerPage;
        this.rxjsSubscriptions = [];
        this.rxjsSubject = new rxjs.Subject();
    },
    update: function (config, commands = {}) {
        Object.assign(this.settings, config);
        // repaint = repaint || this.totalPage !== this.settings.totalPage || this.recordsPerPage !== this.settings.recordsPerPage;
        this.init();
        if (commands.paginate) {
            this.paginate();
        }
        if (commands.repaint) {
            this.render();
        }
    },
    reset: function () {
        this.httpSettings = null;
        this.unscbscribe();
        this.init();
        return this;
    },
    getMaxPageNum: function () {
        return this.totalPage > this.pageNumDigitDisplayCount + 1 ? this.pageNumDigitDisplayCount : this.totalPage;
    },
    getCurrentPage: function () {
        return (this.offset / this.recordsPerPage) + 1;
    },
    map: function (callback) {
        return this.rxjsSubject.pipe(rxjs.operators.map(callback));
    },
    subscribe: function (callback) {
        const subscription = this.rxjsSubject.subscribe({next: callback});
        this.rxjsSubscriptions.push(subscription);
        return subscription;
    },
    unscbscribe: function (subscription) {
        if (subscription) {
            subscription.unsubscribe();
        } else {
            for (const subscription of this.rxjsSubscriptions) {
                try {
                    subscription.unsubscribe();
                } catch (e) {

                }
            }
            this.rxjsSubscriptions = [];
        }
    },
    httpConfig: function (config) {
        this.httpSettings = Object.assign({
            callback: function () {

            },
        }, config);
        return this;
    },
    toRequestParams: function () {
        return {
            offset: this.offset,
            limit: this.offset + this.recordsPerPage,
        };
    },
    paginate: function () {
        const _this = this;
        let options = Object.assign({}, this.httpSettings.options); // new object
        let action = this.httpSettings.action;
        if (!options) {
            options = action;
        } else {
            options.handler = action;
        }
        const ui = Engine.instance.ui;
        options.data = Object.assign({}, {pagination: this.toRequestParams()}, options.data);
        ui.request(options).then(function (response) {
            _this.httpSettings.callback.call(_this, response);
            _this.rxjsSubject.next(response);
            return response;
        });
        return this;
    },
    hasNext: function () {
        return this.offset < this.totalRecords;
    },
    next: function () {
        this.offset = this.offset + this.recordsPerPage;
        if (!this.hasNext()) {
            throw new Error('Unable to paginate next, Reached end of page');
        }
        return this.paginate();
    },
    hasPrev: function () {
        return this.offset >= this.recordsPerPage;
    },
    prev: function () {
        this.offset = this.offset + this.recordsPerPage;
        if (!this.hasPrev()) {
            throw new Error('Unable to paginate prev, Reached start of page');
        }
        return this.paginate();
    },
    goTo: function (pageNum) {
        if (isNaN(pageNum) || pageNum < 1) {
            throw new Error('Unable to goto a negative or 0 page ' + pageNum);
        }
        this.offset = this.recordsPerPage * (pageNum - 1);
        return this.paginate();
    },
    getPageSize: function () {
        return this.recordsPerPage;
    },
    updatePageSize: function (recordsPerPage) {
        this.update({recordsPerPage: recordsPerPage}, {paginate: true});
    },
    getTemplate: function () {
        const _this = this;
        const template = doT.template(this.static.template)(this);
        const $template = $(template).data('engine.pagination', this);
        $template.find('.next').click(function () {
            _this.next();
            return false;
        });
        $template.find('.prev').click(function () {
            _this.prev();
            return false;
        });
        $template.find('.goto').click(function () {
            _this.goTo($(this).data('page'));
            return false;
        });
        $template.find('.page-size').change(function () {
            _this.updatePageSize($(this).val());
            return false;
        });
        return $template;
    },
    render: function () {
        this.$el.empty().append(this.getTemplate());
    },
});