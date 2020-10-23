const getLocalModules = function () {
    return {
        Engine: require('./engine/core/engine'),
        'engine.ui': require('./engine/ui/engine.ui'),
        'engine.data.RestQuery': require('./engine/data/rest.query'),
        'engine.data.Pagination': require('./engine/data/pagination'),
        'engine.data.Filter': require('./engine/data/filter'),
        'engine.ui.EngineForm': require('./engine/ui/engine.form'),
        'engine.ui.EngineList': require('./engine/ui/engine.list'),
        'themes.nobleui.theme': require('./themes/nobleui/theme'),
    };
}
/**require support for other scripts*/
window.require = function (module) {
    try {
        require(module)
    } catch (e) {
        const modules = getLocalModules();
        if (modules[module]) {
            return modules[module];
        } else {
            throw e;
        }
    }
}


getLocalModules(); // initializing local modules
