import {FlowItem} from "./flow.item";

export class Port extends FlowItem {
    node;

    constructor(node) {
        super();
        this.node = node;
    }

    setNode(node) {
        this.node = node;
    }

    getNode() {
        return this.node;
    }
}
