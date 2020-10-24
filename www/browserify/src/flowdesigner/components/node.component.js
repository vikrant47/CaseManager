import {BaseComponent} from "./base.component";

const {
    mxUtils, mxRectangle,
} = mxgraph();

const DEFAULT_SETTINGS = {
    shape: mxRectangle,
}

export class NodeComponent extends BaseComponent {
    flowComponent;
    inputPort;
    outputPorts = [];
    vertex;

    constructor(el, settings) {
        super(el);
        this.settings = Object.assign({}, DEFAULT_SETTINGS, settings);
    }

    /**Add an output port*/
    addOutputPort(port) {
        this.outputPorts.push(port);
    }

    getOutputPorts() {
        return this.outputPorts;
    }

    /**Remove an output port*/
    removePort(port) {
        const portIndex = this.outputPorts.indexOf(p => p.id === port);
        this.outputPorts.splice(portIndex, 1);
    }

    getFlowComponent() {
        return this.flowComponent;
    }

    setFlowComponent(flowComponent) {
        this.flowComponent = flowComponent;
    }

    getVertex() {
        return this.vertex;
    }

    render() {
        const graph = this.flowComponent.getEditor().graph;
        const parent = graph.getDefaultParent();
        const model = graph.getModel();
        let v1 = null;

        model.beginUpdate();
        try {
            // NOTE: For non-HTML labels the image must be displayed via the style
            // rather than the label markup, so use 'image=' + image for the style.
            // as follows: v1 = graph.insertVertex(parent, null, label,
            // pt.x, pt.y, 120, 120, 'image=' + image);
            this.vertex = graph.insertVertex(parent, null, label, x, y, 120, 120);
            this.vertex.setConnectable(false);

            // Presets the collapsed size
            this.vertex.geometry.alternateBounds = new this.settings.shape(0, 0, 120, 40);

            // Adds the ports at various relative locations
            let port = graph.insertVertex(v1, null, 'Trigger', 0, 0.25, 16, 16,
                'port;image=editors/images/overlays/flash.png;align=right;imageAlign=right;spacingRight=18', true);
            port.geometry.offset = new mxPoint(-6, -8);

            port = graph.insertVertex(v1, null, 'Input', 0, 0.75, 16, 16,
                'port;image=editors/images/overlays/check.png;align=right;imageAlign=right;spacingRight=18', true);
            port.geometry.offset = new mxPoint(-6, -4);

            port = graph.insertVertex(v1, null, 'Error', 1, 0.25, 16, 16,
                'port;image=editors/images/overlays/error.png;spacingLeft=18', true);
            port.geometry.offset = new mxPoint(-8, -8);

            port = graph.insertVertex(v1, null, 'Result', 1, 0.75, 16, 16,
                'port;image=editors/images/overlays/information.png;spacingLeft=18', true);
            port.geometry.offset = new mxPoint(-8, -4);
        } finally {
            model.endUpdate();
        }

        graph.setSelectionCell(v1);
    }
}
