
const Engine = require('../core/engine');
const Filter = require('./filter');
const RestQuery = Engine.instance.define('engine.data.RestQuery', {
    constructor: function (model) {
        this.model = model;
    },
    static: {
        invokeAPI: function (options) {
            const ui = Engine.instance.ui;
            return Engine.instance.ui.request({
                loadingContainer: options.loadingContainer || (options.showLoader && '.main-wrapper'),
                $ajax: true,
                url: ui.getBaseTenantUrl() + options.endpoint,
                data: options.data,
            });
        },
        queryParser: new Filter(),
        toQueryBuilderRules: function (query) {
            const _this = this;
            let clonedQuery = JSON.parse(JSON.stringify(query));
            let mongoQuery = clonedQuery.where;
            if (!mongoQuery.$and && !mongoQuery.$or) {
                mongoQuery = {$and: [mongoQuery]};
            }
            clonedQuery.where = this.queryParser.parseMongoQuery(mongoQuery);
            if (clonedQuery.includes) {
                clonedQuery.includes = clonedQuery.includes.map(function (query) {
                    _this.toQueryBuilderRules(query);
                });
            }
            return clonedQuery;
        },
        /**
         * This will merge given query array and return a single query
         * Note: queries should be mongo query
         * @return Object
         */
        merge: function (queries) {
            const _this = this;
            return queries.slice(1).reduce(function (query, next) {
                if (next.model !== query.model) {
                    throw new Error('Can not merge querries of different models "' + query.model + '" != "' + next.model + '"');
                }
                /**initializing where*/
                let where = query.where;
                if (!where || Object.keys(where).length === 0) {
                    where = {$and: []};
                } else if (!where.$and) {
                    where = {$and: [where]};
                }
                query.where = where;
                /**merging include queries*/
                if (next.include) {
                    if (!query.include) {
                        query.include = [];
                    }
                    for (const include of next.include) {
                        const index = query.include.findIndex(qinclude => qinclude.model === include.model);
                        if (index > -1) {
                            _this.merge(query.include[index], include);
                        } else {
                            query.include.push(include);
                        }
                    }
                    delete next.include;
                }
                if (next.where && Object.keys(where).length > 0) {
                    query.where.$and.push(next.where);
                }
                return query;
            }, queries[0]);
        }

    },
    paginate: function (query, ajaxOptions) {
        return this.execute({
            query: query,
            method: 'paginate',
        }, ajaxOptions);
    },
    findOne: function (query, ajaxOptions) {
        return this.execute({
            query: query,
            method: 'findOne',
        }, ajaxOptions);
    },
    findById: function (id, ajaxOptions) {
        return this.execute({
            query: {where: {id: id}}, method: 'findById'
        }, ajaxOptions);
    },
    findAll: function (query, ajaxOptions) {
        return this.execute({query: query, method: 'findAll'}, ajaxOptions);
    },
    create: function (data, ajaxOptions = {}) {
        return this.execute({
            method: 'create',
            data: data,
        }, ajaxOptions);
    },
    update: function (data, query, ajaxOptions) {
        return this.execute({
            method: 'update',
            query: query,
            data: data,
        }, ajaxOptions);
    },
    delete: function (query, ajaxOptions) {
        return this.execute({
            method: 'delete',
            query: query,
        }, ajaxOptions);
    },
    execute: function (data, ajaxOptions = {}) {
        if (data.query) {
            data.query = this.static.toQueryBuilderRules(data.query);
        }
        data.model = this.model.replaceAll('.', '\\');
        return Engine.instance.ui.request('onQueryData', Object.assign({
            data: data,
            loadingContainer: ajaxOptions.loadingContainer || '.page-content',
        }, ajaxOptions));
    }
});
module.exports = RestQuery;
