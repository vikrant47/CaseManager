window.modules = {
    Engine: require('./engine/core/engine'),
    'engine.data.RestQuery': require('./engine/data/rest.query'),
    'engine.data.Pagination': require('./engine/data/pagination'),
    'engine.data.Filter': require('./engine/data/filter'),
    'engine.ui.EngineForm': require('./engine/ui/engine.form'),
    'engine.ui.EngineList': require('./engine/ui/engine.list'),
}
window.require = function (module) {
    return require(module);
}
