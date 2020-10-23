const Engine = require('../core/engine');
const EngineIframe = Engine.instance.define('engine.ui.Iframe', {
    static: {
        template: '<iframe frameborder="0"></iframe>',
        defaultSettings: {
            width: '100%',
            height: '400px',
        },
    },
    constructor: function (settings) {
        this.settings = Object.assign({}, this.static.defaultSettings, settings);
        this.$container = settings.container instanceof jQuery ? settings.container : $(settings.container);
    },
    render: function () {
        this.rendered = true;
        const url = Engine.instance.ui.buildUrl(this.settings.url);
        this.$el = $(this.static.template);
        const _this = this;
        return new Promise(function (resolve, reject) {
            _this.$el.prop('src', url).css({
                height: _this.settings.height,
                width: _this.settings.width,
            }).appendTo(_this.$container).on('load', function () {
                resolve(this);
            });
        }).then(function (iframe) {
            return iframe;
        });
    }
});
module.exports = EngineIframe;
