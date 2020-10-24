import {FlowItem} from "./flow.item";

export class Edge extends FlowItem {
    source;
    target;

    constructor(source, target) {
        super();
        this.source = source;
        this.target = target;
    }
}
