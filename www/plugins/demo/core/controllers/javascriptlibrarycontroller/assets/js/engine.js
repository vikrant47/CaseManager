if (!Object.assign) {
    Object.assign = jQuery.extend;
}
var Engine = function () {
};

Object.assign(Engine.prototype, {
    boot: function () {
        this.addNavFlyout();
        this.addResizeFlyout();
        this.registerEvents();
    },
    registerEvents: function () {
        var _this = this;
    },
    confirm: function (message, callback) {
        var _event = jQuery.Event('ajaxConfirmMessage')

        _event.promise = $.Deferred();
        if ($(window).triggerHandler(_event, [message]) !== undefined) {
            _event.promise.done(function () {
                callback();
            });
            return false
        }
    },
    addResizeFlyout: function () {
        var _this = this;
        this.$resizeFlyout = $('#resize-flyout');
        if (this.$resizeFlyout.length === 0) {
            $('.mainmenu-preview').hide();
            this.$resizeFlyout = $('<div id="resize-flyout" class="flyout-toggle"><i class="oc-icon-external-link-square"></i></div>').css({
                'top': '52px',
                'right': '8px',
                position: 'fixed',
                'font-size': '20px',
                left: 'auto',
                background: 'none',
            }).appendTo(document.body).click(function () {
                _this.toggleResizeBody();
            }).data('flyout-state', 'minimized');
        }
    },
    addNavFlyout: function () {
        this.$navFlyout = $('#nav-flyout');
        if (this.$navFlyout.length === 0) {
            this.$navFlyout = $('<div id="nav-flyout" class="flyout-toggle"><i class="icon-chevron-left"></i></div>').css({
                'top': '82px',
                position: 'fixed'
            }).appendTo(document.body).click(function () {
                $(this).find('i').toggleClass('icon-chevron-right').toggleClass('icon-chevron-left');
                $('.layout-sidenav-container').toggle()
            })
        }
    },
    removeNavFlyout: function () {
        this.$navFlyout.remove();
        this.$navFlyout = null;
    },
    getRandomColor: function () {
        var letters = '0123456789ABCDEF'.split('');
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    },
    maximizeBody: function () {
        $('.layout-row.min-size').hide();
        $('.layout-sidenav-container').hide()
    },
    minimizeBody: function () {
        $('.layout-row.min-size').show();
        $('.layout-sidenav-container').show()
    },
    toggleResizeBody: function () {
        this.$resizeFlyout.find('i').toggleClass('oc-icon-external-link-square').toggleClass('oc-icon-square-o');
        if (this.$resizeFlyout.data('flyout-state') === 'maximized') {
            this.$resizeFlyout.css('top', '52px');
            this.minimizeBody();
            this.$resizeFlyout.data('flyout-state', 'minimized');
            this.$navFlyout.show();
        } else {
            this.maximizeBody();
            this.$resizeFlyout.css('top', '0px');
            this.$resizeFlyout.data('flyout-state', 'maximized');
            this.$navFlyout.hide();
        }
    }
})
;
Engine.instance = new Engine();
$(document).ready(function () {
    Engine.instance.boot();
});
