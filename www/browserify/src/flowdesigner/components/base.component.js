export class BaseComponent {
    el;
    settings = {};
    template = null;

    constructor(el) {
        if (el instanceof jQuery) {
            this.$el = el;
        } else {
            this.$el = $(container);
        }
        this.el.data('flow.component', this);
    }
}
