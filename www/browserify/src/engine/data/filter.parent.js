/***Parent Filter implementation*/
let ParentFilter = Engine.instance.define('engine.ParentFilter', {
    extends: Filter,
    children: [],
    staticInheritance: true,
    addChild: function (child) {
        child.setParent(this);
        this.children.push(child);
    },
    getDefinition() {
        return this.definition = Filter.mergeDefinitions(this.children.map(child => child.definition));
    },
    build: function () {
        this.definition = this.getDefinition();
        return Filter.prototype.build.apply(this, arguments);
    },
    apply: function (callback) {
        if (typeof callback == 'function') {
            this.on('engine.filter.apply', callback);
        } else {
            for (const child of this.children) {
                const relevantRules = child.getRelevantRules(this.getRules(), child.makeFields());
                child.setRules(relevantRules);
                child.apply();
            }
            this.emit('engine.filter.apply', this);
        }
        return this;
    },
});
module.exports = ParentFilter
