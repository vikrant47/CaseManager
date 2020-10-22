global.window.modules = {
    'engine.data.RestQuery': engine.data.RestQuery,
    'engine.data.Pagination': engine.data.Pagination,
    'engine.data.Filter': engine.data.Filter,
    'engine.ui.EngineForm': engine.ui.EngineForm,
    'engine.ui.EngineList': engine.ui.EngineList,
    Engine: Engine,
    rxjs: require('rxjs'),
    lodash: require('lodash'),
    mxgraph: require('mxgraph'),
    xml2json: require('xml2json'),
}
global.window.require = function (module) {
    if (!global.window.modules[module]) {
        throw new Error(module + ' module is not installed/defined in browserify')
    }
    return global.window.modules[module];
};
