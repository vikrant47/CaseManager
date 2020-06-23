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
        template: '<button class="action action-button"><i></i></button>',
        icon: 'icon-link',
        event: 'click',
        css_class: '',
        attributes: [],
        handler: function () {

        }
    },
    input: {
        template: '<input class="action action-input"><i></i></input>',
        icon: 'icon-link',
        event: 'change',
        events: {},
        css_class: '',
        attributes: [],
        handler: function () {

        }
    },
    dropdown: {
        template: '<div class="dropdown action action-list">   <a href="#" data-toggle="dropdown" class="dropdown-title"></a>' +
            '<ul class="dropdown-menu" role="menu" data-dropdown-title="Add something large"></ul>' +
            '</div>',
        element: {text: '.dropdown-title', appendTo: 'ul', icon: '.dropdown-title'},
        attributes: [],
        icon: 'icon-link',
        event: 'click',
        css_class: '',
        handler: function () {

        }
    },
    dropdownItem: {
        template: '<li class="action-list-item" role="presentation"><a role="menuitem" tabindex="-1" href="#" class=" dropdown-item-title"></a></li>',
        element: {text: '.dropdown-item-title', appendTo: 'li', icon: '.dropdown-item-title'},
        icon: 'icon-link',
        attributes: [],
        event: 'click',
        css_class: '',
        handler: function () {

        }
    }
};
Object.assign(Engine.prototype, {
    boot: function () {
        this.addNavFlyout();
        this.addResizeFlyout();
        this.registerEvents();
        this.moveActions();
    },
    registerEvents: function () {
        var _this = this;
        $(document).ready(function () {
            _this.onDocumentReady();
        });
    },
    evalFunction: function (fun, scope, args) {
        scope = scope || this;
        let keys = Object.keys(args);
        return (Function('return function(' + keys.join(',') + '){\n' +
            fun + '\n}')()).apply(scope, keys.map(function (key) {
            return args[key];
        }));
    },
    onDocumentReady: function () {
        var _this = this;
        var dataActionConfig = {
            show: function (value) {
                if (value) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            }, hide: function (value) {
                if (value) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            }, disable: function (value) {
                $(this).prop('disabled', !!value);
            }
        };
        $('[data-show],[data-disable],[data-hide]').each(function () {
            var $this = $(this);
            var data = $this.data();
            data.engine = _this;
            for (var dataActionKey in dataActionConfig) {
                if (data[dataActionKey]) {
                    this.data = data;
                    dataActionConfig[dataActionKey].call(
                        this,
                        data[dataActionKey] === 'true'
                        || _this.evalFunction(data[dataActionKey], this, data)
                    );
                }
            }
        });
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
    moveActions: function () {
        $('.engine-list-toolbar .engine-actions').appendTo($('.engine-list-toolbar .toolbar-item').children().eq(0))
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
        return actions.map(function (action) {
            action.scope = scope;
            if (typeof action.active === 'function') {
                action.active = action.active.call(action, $element, scope);
            }
            if (action.active) {
                action = Object.assign({}, Engine.defaultActionOption[action.type || 'button'], action);
                var $template = $(action.template).data('action', action).data('scope', scope).prop('id', action.id);
                if (action.label) {
                    var $textElement = $template;
                    if (action.element && action.element.text) {
                        $textElement = $template.find(action.element.text);
                    }
                    $textElement.text(action.label);
                }
                $template.addClass(action.css_class);
                var $target = $template;
                if (action.target) {
                    $target = $template.find(action.target);
                }
                $target.on(action.event, function (event) {
                    event.preventDefault();
                    action.handler.apply(this, [event, scope, action, $element]);
                });
                if (action.events) {
                    for (var eventName in action.events) {
                        $target.on(eventName, function (event) {
                            action.events[eventName].apply(this, [event, scope, action, $element]);
                        });
                    }
                }
                if (action.icon) {
                    var $icon = $template.find('i');
                    if (action.element && action.element.icon) {
                        $icon = $template.find(action.element.icon);
                    }
                    $icon.addClass(action.icon);
                }
                if (action.attributes) {
                    action.attributes.forEach(function (attr) {
                        $template.attr(attr.name, attr.value);
                    });
                }
                $element.append($template);
                if (action.actions && action.actions.length > 0) {
                    var $appendTo = $template;
                    if (action.element.appendTo) {
                        $appendTo = $template.find(action.element.appendTo);
                    }
                    _this.addActions($appendTo, action.actions, scope);
                }
                return $template;
            }
            return null;
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
    },
    export: function (module, namespace) {
        this[namespace] = module;
    },
    define: function (name, options) {
        if (typeof options === 'undefined') {
            options = name;
        } else {
            options.name = name;
        }
        const settings = Object.assign({
            constructor: function () {

            },
            static: [],
        }, options);
        const cls = function () {
            if (settings.extends) {
                const parent = new settings.extends();
                for (const i in parent) {
                    if (typeof i !== 'function') {
                        this[i] = parent[i];
                    }
                }
            }
            settings.constructor.apply(this, arguments);
        };
        for (let i in settings.static) {
            cls[i] = settings.static[i];
        }
        if (settings.extends) {
            cls.prototype = Object.create(settings.extends.prototype);
        }
        Object.assign(cls.prototype, settings);
        if (settings.name) {
            let parentPackage = window;
            const namespace = settings.name.split('.');
            const name = namespace[namespace.length - 1];
            cls.constructor.name = name;
            Object.defineProperty(cls, 'name', {value: name});
            namespace.splice(-1, 1);
            for (const package of namespace) {
                if (!parentPackage[package]) {
                    parentPackage[package] = {};
                }
                parentPackage = parentPackage[package];
            }
            parentPackage[name] = cls;
        }
        return cls;
    },
    extend: function (child, parent) {
        child.prototype = Object.create(parent.prototype, child.prototype);
        return child;
    }
});
window.Engine = Engine;
Engine.instance = new Engine();
$(document).ready(function () {
    Engine.instance.boot();
});
