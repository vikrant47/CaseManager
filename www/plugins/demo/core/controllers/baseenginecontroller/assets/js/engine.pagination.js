let Pagination = Engine.instance.define('engine.data.Pagination', {
    static: {
        template: `<nav aria-label="Engine Pagination">
                      <ul class="pagination">
                        <li class="page-item">
                            {{?it.hasNext() }}
                                <a class="page-link prev" href="javascript:void(0)">Previous</a>
                            {{??}}
                                <a class="page-link disabled" href="javascript:void(0)">Previous</a>
                            {{?}}    
                        </li>
                        {{for(var i=0;i<(it.totalPage>it.pageNumDigitDisplayCount+1?it.pageNumDigitDisplayCount:it.totalPage);i++){}}
                            <li class="page-item"><a class="page-link goto {{?i==it.getCurrentPage()}}active{{?}}" href="javascript:void(0)" data-page="{{=i+1}}">{{=i+1}}</a></li>
                        {{}}
                        {{?it.totalPage>it.pageNumDigitDisplayCount+1}}
                            <li class="page-item"><a class="" href="javascript:void(0)" >......</a></li>
                            <li class="page-item"><a class="page-link goto {{?it.totalPage-1==it.getCurrentPage()}}active{{?}}" href="javascript:void(0)" data-page="{{=it.totalPage-1 }}">{{=it.totalPage -1}}</a></li>
                            <li class="page-item"><a class="page-link goto {{?it.totalPage==it.getCurrentPage()}}active{{?}}" href="javascript:void(0)" data-page="{{=it.totalPage}}">{{=it.totalPage}}</a></li>
                        {{?}}
                        <li class="page-item">
                            {{?it.hasNext() }}
                                <a class="page-link next" href="javascript:void(0)">Previous</a>
                            {{??}}
                                <a class="page-link disabled" href="javascript:void(0)">Previous</a>
                            {{?}}  
                        </li>
                      </ul>
                    </nav>`,
        defaultConfig: {
            totalRecords: 0,
            recordsPerPage: 0,
            offset: 0,
            pageNumDigitDisplayCount: 5,
        }
    },
    constructor: function (el, config) {
        if (!el) {
            el = '<div class="engine-pagination"></div>';
        }
        this.$el = $(el);
        this.$el.data('engine.pagination', this);
        this.settings = Object.assign(this.static.defaultConfig, config);
        this.rxjsSubscriptions = [];
        this.reset();
    },
    reset: function () {
        this.unscbscribe();
        this.totalRecords = this.settings.totalRecords;
        this.recordsPerPage = this.settings.recordsPerPage;
        this.offset = this.settings.offset;
        this.totalPage = this.totalRecords / this.recordsPerPage;
        this.httpSettings = null;
        this.rxjsSubscriptions = [];
        this.rxjsSubject = new rxjs.Subject();
        return this;
    },
    getCurrentPage: function () {
        return (this.offset / this.recordsPerPage) + 1;
    },
    map: function (callback) {
        this.rxjsSubject.map(callback);
    },
    subscribe: function (callback) {
        const subscription = this.subject.subscribe({next: callback});
        this.subscribe.push(subscription);
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
        let options = this.httpSettings.options;
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
    getTemplate: function () {
        const _this = this;
        const template = doT.template(this.static.template)(this);
        const $template = $(template).data('engine.pagination', this);
        $template.find('.next').click(function () {
            _this.next();
        });
        $template.find('.prev').click(function () {
            _this.prev();
        });

        $template.find('.goto').click(function () {
            _this.goTo($(this).data('page'));
        });
        return $template;
    },
    render: function () {
        this.$el.empty().append(this.getTemplate());
    },
});