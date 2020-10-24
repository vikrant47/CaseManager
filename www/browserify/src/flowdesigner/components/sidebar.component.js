import {BaseComponent} from "./base.component";

const {
    mxUtils, mxRectangle,
} = mxgraph();

export class SidebarComponent extends BaseComponent {
    flowComponent;

    constructor(el, settings) {
        super(el, settings);
    }

    setFlowComponent(flowComponent) {
        this.flowComponent = flowComponent;
    }

    addSidebarIcon(graph, sidebar, label, image) {
        // Function that is executed when the image is dropped on
        // the graph. The cell argument points to the cell under
        // the mousepointer if there is one.
        const funct = function (graph, evt, cell, x, y) {
            const parent = graph.getDefaultParent();
            const model = graph.getModel();

            let v1 = null;

            model.beginUpdate();
            try {
                // NOTE: For non-HTML labels the image must be displayed via the style
                // rather than the label markup, so use 'image=' + image for the style.
                // as follows: v1 = graph.insertVertex(parent, null, label,
                // pt.x, pt.y, 120, 120, 'image=' + image);
                v1 = graph.insertVertex(parent, null, label, x, y, 120, 120);
                v1.setConnectable(false);

                // Presets the collapsed size
                v1.geometry.alternateBounds = new mxRectangle(0, 0, 120, 40);

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

        // Creates the image which is used as the sidebar icon (drag source)
        const img = document.createElement('img');
        img.setAttribute('src', image);
        img.style.width = '48px';
        img.style.height = '48px';
        img.title = 'Drag this to the diagram to create a new vertex';
        sidebar.appendChild(img);

        const dragElt = document.createElement('div');
        dragElt.style.border = 'dashed black 1px';
        dragElt.style.width = '120px';
        dragElt.style.height = '120px';

        // Creates the image which is used as the drag icon (preview)
        const ds = mxUtils.makeDraggable(img, graph, funct, dragElt, 0, 0, true, true);
        ds.setGuidesEnabled(true);
    }

    addIcons() {
        // Adds sidebar icons.
        //
        // NOTE: For non-HTML labels a simple string as the third argument
        // and the alternative style as shown in configureStylesheet should
        // be used. For example, the first call to addSidebar icon would
        // be as follows:
        // addSidebarIcon(graph, sidebar, 'Website', 'images/icons48/earth.png');
        this.addSidebarIcon(graph, sidebar,
            '<h1 style="margin:0px;">Website</h1><br>' +
            '<img src="images/icons48/earth.png" width="48" height="48">' +
            '<br>' +
            '<a href="http://www.jgraph.com" target="_blank">Browse</a>',
            'images/icons48/earth.png');
        this.addSidebarIcon(graph, sidebar,
            '<h1 style="margin:0px;">Process</h1><br>' +
            '<img src="images/icons48/gear.png" width="48" height="48">' +
            '<br><select><option>Value1</option><option>Value2</option></select><br>',
            'images/icons48/gear.png');
        this.addSidebarIcon(graph, sidebar,
            '<h1 style="margin:0px;">Keys</h1><br>' +
            '<img src="images/icons48/keys.png" width="48" height="48">' +
            '<br>' +
            '<button onclick="mxUtils.alert(\'generate\');">Generate</button>',
            'images/icons48/keys.png');
        this.addSidebarIcon(graph, sidebar,
            '<h1 style="margin:0px;">New Mail</h1><br>' +
            '<img src="images/icons48/mail_new.png" width="48" height="48">' +
            '<br><input type="checkbox"/>CC Archive',
            'images/icons48/mail_new.png');
        this.addSidebarIcon(graph, sidebar,
            '<h1 style="margin:0px;">Server</h1><br>' +
            '<img src="images/icons48/server.png" width="48" height="48">' +
            '<br>' +
            '<input type="text" size="12" value="127.0.0.1"/>',
            'images/icons48/server.png');
    }
}
