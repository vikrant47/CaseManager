import {BaseComponent} from "./base.component";

const {
    mxPoint,
} = mxgraph();

const PORT_TYPE = {
    IN: 'in',
    OUT: 'out',
};
const DEFAULT_SETTINGS = {
    spacing: 18,
    outPortDistance: 18,
}

export class PortComponent {
    node;
    settings = {};
    type = 'output';
    dimension = {
        width: 16,
        height: 16,
    }

    constructor(node, portType = 'output', settings = {}) {
        this.node = node;
        this.type = portType;
        this.settings = Object.assign({}, DEFAULT_SETTINGS, settings);
    }

    getType() {
        return this.type;
    }

    setNode(node) {
        this.node = node;
    }

    getNode() {
        return this.node;
    }

    makeDimension() {
        if (this.type === PORT_TYPE.IN) {
            this.dimensions = Object.assign(this.dimensions, {
                spacing: 'spacingRight',
                align: 'right',
                x: (this.node.getWidth() - this.width) / 2,
                y: 0.25
            });
        } else {
            Object.assign(this.dimensions, {
                spacing: 'spacingLeft',
                align: 'left',
                x: (this.node.getOutputPorts().length + 1) * this.settings.outPortDistance,
                y: 0.25,
            });
        }
        return this.dimensions;
    }

    render() {
        const graph = this.node.getFlowComponent().getEditor().graph;
        const vertex = this.node.getVertex();
        const dimensionConfig = this.makeDimension();
        if (dimensionConfig.x > this.node.getWidth()) {
            this.node.resize({
                width: dimensionConfig.x + this.settings.outPortDistance,
                height: this.node.getHeight(),
            });
        }
        // Adds the ports at various relative locations
        this.mxPort = graph.insertVertex(vertex, null, 'Trigger', dimensionConfig.x, dimensionConfig.y, dimensionConfig.width, dimensionConfig.height,
            'port;class=port;align=' + dimensionConfig.align + ';' + dimensionConfig.spacing + '=' + this.settings.spacing, true);
        this.mxPort.geometry.offset = new mxPoint(-6, -8);
    }
}
