global.window.modules = {
    rxjs: require('rxjs'),
    lodash: require('lodash')
}
global.window.$require = function (modules) {
    return require(modules);
};
