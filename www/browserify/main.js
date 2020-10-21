global.window.modules = {
    rxjs: require('rxjs'),
    lodash: require('lodash'),
}
global.window.require = function (module) {
    if (!global.window.modules[module]) {
        throw new Error(module + ' module is not installed/defined in browserify')
    }
    return global.window.modules[module];
};
