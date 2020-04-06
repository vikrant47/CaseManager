if (!Object.assign) {
    Object.assign = jQuery.extend;
}
var Engine = function () {
};
Engine.QUERY_BUILDER_TYPE_MAPPINGS = {
    dropdown: function (field) {
        field.id = field.name;
        field.input = 'select';
        field.type = 'string';
        field.values = field.options || {};
        return field;
    }, text: function (field) {
        field.id = field.name;
        field.type = 'string';
        return field;
    }, switch: function (field) {
        field.id = field.name;
        field.input = 'radio';
        field.type = 'boolean';
        field.values = {1: 'Yes', 0: 'No'};
        return field;
    }, number: function (field) {
        field.id = field.name;
        field.type = 'double';
        return field;
    }, relation: function (field, definition) {
        var belongsToAssoc = definition.associations.belongsTo;
        if (belongsToAssoc && belongsToAssoc[field.name]) {
            field.id = belongsToAssoc[field.name].key;
        } else {
            field.id = field.name;
        }
        field.type = 'string';
        return field;
    }, richeditor: function (field) {
        field.id = field.name;
        field.type = 'string';
        return field;
    }
};
Engine.defaultActionOption = {
    button: {
        template: '<button class="action action-button"><i></i> </button>',
        icon: 'icon-link',
        event: 'click',
        cls: '',
        handler: function () {

        }
    },
    dropdown: {
        template: '<div class="dropdown action action-list">   <a href="#" data-toggle="dropdown" class="dropdown-title"></a>' +
            '<ul class="dropdown-menu" role="menu" data-dropdown-title="Add something large"></ul>' +
            '</div>',
        element: {text: '.dropdown-title', appendTo: 'ul', icon: '.dropdown-title'},
        icon: 'icon-link',
        event: 'click',
        cls: '',
        handler: function () {

        }
    },
    dropdownItem: {
        template: '<li class="action-list-item" role="presentation"><a role="menuitem" tabindex="-1" href="#" class=" dropdown-item-title"></a></li>',
        element: {text: '.dropdown-item-title', appendTo: 'li', icon: '.dropdown-item-title'},
        icon: 'icon-link',
        event: 'click',
        cls: '',
        handler: function () {

        }
    }
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
        var _event = jQuery.Event('ajaxConfirmMessage');

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
    },
    addActions: function ($element, actions, scope) {
        var _this = this;
        if (!scope) {
            scope = this;
        }
        actions.forEach(function (action) {
            action.scope = scope;
            if (typeof action.active === 'function') {
                action.active = action.active.call(action, $element, scope);
            }
            if (action.active) {
                action = Object.assign({}, Engine.defaultActionOption[action.type || 'button'], action);
                var $template = $(action.template).data('action', action).data('scope', scope);
                if (action.text) {
                    var $textElement = $template;
                    if (action.element && action.element.text) {
                        $textElement = $template.find(action.element.text);
                    }
                    $textElement.text(action.text);
                }
                $template.addClass(action.cls).on(action.event, function (event) {
                    action.handler.apply(this, [event, scope, action, $element]);
                });
                if (action.icon) {
                    var $icon = $template.find('i');
                    if (action.element && action.element.icon) {
                        $icon = $template.find(action.element.icon);
                    }
                    $icon.addClass(action.icon);
                }
                $element.append($template);
                if (action.actions && action.actions.length > 0) {
                    var $appendTo = $template;
                    if (action.element.appendTo) {
                        $appendTo = $template.find(action.element.appendTo);
                    }
                    _this.addActions($appendTo, action.actions, scope);
                }
            }
        });
    },
    // definition form field manipulation
    getFields(definition) {
        var fields = definition.form.controls.fields;
        if (definition.form.controls.tabs) {
            fields = Object.assign(fields, definition.form.controls.tabs.fields);
        }
        return fields;
    },
    mapFieldsToQueryBuilderFields: function (definition) {
        var fields = Engine.instance.getFields(definition);
        var qbFields = [];
        Object.keys(fields).map(function (fieldName) {
            var field = fields[fieldName];
            if (typeof Engine.QUERY_BUILDER_TYPE_MAPPINGS[field.type] === 'function') {
                var qbField = Engine.QUERY_BUILDER_TYPE_MAPPINGS[field.type](Object.assign({
                    name: fieldName,
                    id: fieldName
                }, field), definition);
                qbFields.push(qbField);
            }
        });
        return qbFields;
    }
});
window.Engine = Engine;
Engine.instance = new Engine();
$(document).ready(function () {
    Engine.instance.boot();
});
