import {BaseComponent} from "./base.component";

const {
    mxUtils, mxEvent, mxCodec,
} = mxgraph();

export class ToolbarComponent extends BaseComponent {
    flowComponent;

    constructor(el, settings) {
        super(el, settings);
    }

    setFlowComponent(flowComponent) {
        this.flowComponent = flowComponent;
    }

    addToolbarButton(editor, action, label, image, isTransparent) {
        const button = document.createElement('button');
        button.style.fontSize = '10';
        if (image != null) {
            const img = document.createElement('img');
            img.setAttribute('src', image);
            img.style.width = '16px';
            img.style.height = '16px';
            img.style.verticalAlign = 'middle';
            img.style.marginRight = '2px';
            button.appendChild(img);
        }
        if (isTransparent) {
            button.style.background = 'transparent';
            button.style.color = '#FFFFFF';
            button.style.border = 'none';
        }
        mxEvent.addListener(button, 'click', function (evt) {
            editor.execute(action);
        });
        mxUtils.write(button, label);
        this.el.appendChild(button);
    }

    addToolbarButtons() {
        const editor = this.flowComponent.getEditor();
        const graph = editor.graph;
        // Creates a new DIV that is used as a this.el and adds
        // this.el buttons.
        const spacer = document.createElement('div');
        spacer.style.display = 'inline';
        spacer.style.padding = '8px';

        this.addToolbarButton(editor, 'groupOrUngroup', '(Un)group', 'images/group.png');

        // Defines a new action for deleting or ungrouping
        editor.addAction('groupOrUngroup', function (editor, cell) {
            cell = cell || editor.graph.getSelectionCell();
            if (cell != null && editor.graph.isSwimlane(cell)) {
                editor.execute('ungroup', cell);
            } else {
                editor.execute('group');
            }
        });

        this.addToolbarButton(editor, 'delete', 'Delete', 'images/delete2.png');

        this.el.appendChild(spacer.cloneNode(true));

        this.addToolbarButton(editor, 'cut', 'Cut', 'images/cut.png');
        this.addToolbarButton(editor, 'copy', 'Copy', 'images/copy.png');
        this.addToolbarButton(editor, 'paste', 'Paste', 'images/paste.png');

        this.el.appendChild(spacer.cloneNode(true));

        this.addToolbarButton(editor, 'undo', '', 'images/undo.png');
        this.addToolbarButton(editor, 'redo', '', 'images/redo.png');

        this.el.appendChild(spacer.cloneNode(true));

        this.addToolbarButton(editor, 'show', 'Show', 'images/camera.png');
        this.addToolbarButton(editor, 'print', 'Print', 'images/printer.png');

        this.el.appendChild(spacer.cloneNode(true));
        // Defines a new export action
        editor.addAction('exportToXML', (editor, cell) => {
            const textarea = document.createElement('textarea');
            textarea.style.width = '400px';
            textarea.style.height = '400px';
            const enc = new mxCodec(mxUtils.createXmlDocument());
            const node = enc.encode(editor.graph.getModel());
            textarea.value = mxUtils.getPrettyXml(node);
            this.flowComponent.showModalWindow(graph, 'XML', textarea, 410, 440);
        });

        this.addToolbarButton(editor, 'exportToXML', 'Export', 'images/export1.png');
    }
}
