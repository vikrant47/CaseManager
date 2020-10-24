import {BaseComponent} from "./base.component";

const mxgraph = require('mxgraph');
const {
    mxClient, mxGraph, mxRubberband, mxUtils, mxEvent, mxConstants, mxGraphHandler, mxGuide,
    mxEdgeHandler, mxDivResizer, mxEditor, mxCell, mxImage, mxGeometry, mxPerimeter, mxEdgeStyle,
    mxOutline, mxRectangle, mxPoint,
} = mxgraph();

const DEFAULT_SETTINGS = {
    guidesEnabled: true,
    MIN_HOTSPOT_SIZE: 16,
    DEFAULT_HOTSPOT: 1,
    dropEnable: false,
};

export class FlowDesignerComponent extends BaseComponent {
    editor;
    sidebar;
    toolbar;
    outline;
    statusContainer;

    constructor(el, options = {}) {
        super(el);
        this.settings = Object.assign({}, DEFAULT_SETTINGS, options)
    }

    setSidebar(sidebar) {
        this.sidebar = sidebar;
    }

    getSidebar() {
        return this.sidebar;
    }

    setToolbar(toolbar) {
        this.toolbar = toolbar;
    }

    getToolbar() {
        return this.sidebar;
    }

    setOutline(outline) {
        this.outline = outline;
    }

    getOutline() {
        return this.outline;
    }

    setStatusContainer(statusContainer) {
        this.statusContainer = statusContainer;
    }

    getStatusContainer() {
        return this.statusContainer;
    }

    getEditor() {
        return this.editor;
    }

    init() {
        // Assigns some global constants for general behaviour, eg. minimum
        // size (in pixels) of the active region for triggering creation of
        // new connections, the portion (100%) of the cell area to be used
        // for triggering new connections, as well as some fading options for
        // windows and the rubberband selection.
        mxConstants.MIN_HOTSPOT_SIZE = this.settings.MIN_HOTSPOT_SIZE;
        mxConstants.DEFAULT_HOTSPOT = this.settings.DEFAULT_HOTSPOT;

        // Enables guides
        mxGraphHandler.prototype.guidesEnabled = this.settings.guidesEnabled;

        // Alt disables guides
        mxGuide.prototype.isEnabledForEvent = function (evt) {
            return !mxEvent.isAltDown(evt);
        };

        // Enables snapping waypoints to terminals
        mxEdgeHandler.prototype.snapToTerminals = true;

        // Workaround for Internet Explorer ignoring certain CSS directives
        if (mxClient.IS_QUIRKS) {
            document.body.style.overflow = 'hidden';
            new mxDivResizer(container);
            new mxDivResizer(outline);
            new mxDivResizer(toolbar);
            new mxDivResizer(sidebar);
            new mxDivResizer(status);
        }
    }

    createEditor() {
        // Creates a wrapper editor with a graph inside the given container.
        // The editor is used to create certain functionality for the
        // graph, such as the rubberband selection, but most parts
        // of the UI are custom in this example.
        this.editor = new mxEditor();
        const graph = this.editor.graph;
        const model = graph.getModel();

        // Disable highlight of cells when dragging from toolbar
        graph.setDropEnabled(this.settings.dropEnable);

        // Uses the port icon while connections are previewed
        graph.connectionHandler.getConnectImage = function (state) {
            return new mxImage(state.style[mxConstants.STYLE_IMAGE], 16, 16);
        };

        // Centers the port icon on the target port
        graph.connectionHandler.targetConnectImage = true;

        // Does not allow dangling edges
        graph.setAllowDanglingEdges(false);

        // Sets the graph container and configures the editor
        this.editor.setGraphContainer(this.el);
        const config = mxUtils.load(
            'editors/config/keyhandler-commons.xml').getDocumentElement();
        this.editor.configure(config);
        // Enables new connections
        graph.setConnectable(true);
    }

    defineGroup() {
        // Defines the default group to be used for grouping. The
        // default group is a field in the mxEditor instance that
        // is supposed to be a cell which is cloned for new cells.
        // The groupBorderSize is used to define the spacing between
        // the children of a group and the group bounds.
        const graph = this.editor.graph;
        const group = new mxCell('Group', new mxGeometry(), 'group');
        group.setVertex(true);
        group.setConnectable(false);
        this.editor.defaultGroup = group;
        this.editor.groupBorderSize = 20;

        // Disables drag-and-drop into non-swimlanes.
        graph.isValidDropTarget = function (cell, cells, evt) {
            return this.isSwimlane(cell);
        };

        // Disables drilling into non-swimlanes.
        graph.isValidRoot = function (cell) {
            return this.isValidDropTarget(cell);
        }

        // Does not allow selection of locked cells
        graph.isCellSelectable = function (cell) {
            return !this.isCellLocked(cell);
        };
    }

    overrideLabel() {
        // Returns a shorter label if the cell is collapsed and no
        // label for expanded groups
        const graph = this.editor.graph;
        graph.getLabel = function (cell) {
            let tmp = mxGraph.prototype.getLabel.apply(this, arguments); // "supercall"

            if (this.isCellLocked(cell)) {
                // Returns an empty label but makes sure an HTML
                // element is created for the label (for event
                // processing wrt the parent label)
                return '';
            } else if (this.isCellCollapsed(cell)) {
                const index = tmp.indexOf('</h1>');

                if (index > 0) {
                    tmp = tmp.substring(0, index + 5);
                }
            }

            return tmp;
        }
        // Disables HTML labels for swimlanes to avoid conflict
        // for the event processing on the child cells. HTML
        // labels consume events before underlying cells get the
        // chance to process those events.
        //
        // NOTE: Use of HTML labels is only recommended if the specific
        // features of such labels are required, such as special label
        // styles or interactive form fields. Otherwise non-HTML labels
        // should be used by not overidding the following function.
        // See also: configureStylesheet.
        graph.isHtmlLabel = function (cell) {
            return !this.isSwimlane(cell);
        }

        // To disable the folding icon, use the following code:
        /*graph.isCellFoldable = function(cell)
        {
            return false;
        }*/
    }

    registerDbClick() {
        // Shows a "modal" window when double clicking a vertex.
        const graph = this.editor.graph;
        graph.dblClick = function (evt, cell) {
            // Do not fire a DOUBLE_CLICK event here as mxEditor will
            // consume the event and start the in-place editor.
            if (this.isEnabled() &&
                !mxEvent.isConsumed(evt) &&
                cell != null &&
                this.isCellEditable(cell)) {
                if (this.model.isEdge(cell) ||
                    !this.isHtmlLabel(cell)) {
                    this.startEditingAtCell(cell);
                } else {
                    const content = document.createElement('div');
                    content.innerHTML = this.convertValueToString(cell);
                    showModalWindow(this, 'Properties', content, 400, 300);
                }
            }

            // Disables any default behaviour for the double click
            mxEvent.consume(evt);
        };
    }

    configureStylesheet() {
        const graph = this.editor.graph;
        graph.getStylesheet().putDefaultVertexStyle({
            [mxConstants.STYLE_SHAPE]: mxConstants.SHAPE_RECTANGLE,
            [mxConstants.STYLE_PERIMETER]: mxPerimeter.RectanglePerimeter,
            [mxConstants.STYLE_ALIGN]: mxConstants.ALIGN_CENTER,
            [mxConstants.STYLE_VERTICAL_ALIGN]: mxConstants.ALIGN_MIDDLE,
            [mxConstants.STYLE_GRADIENTCOLOR]: '#41B9F5',
            [mxConstants.STYLE_FILLCOLOR]: '#8CCDF5',
            [mxConstants.STYLE_STROKECOLOR]: '#1B78C8',
            [mxConstants.STYLE_FONTCOLOR]: '#000000',
            [mxConstants.STYLE_ROUNDED]: true,
            [mxConstants.STYLE_OPACITY]: '80',
            [mxConstants.STYLE_FONTSIZE]: '12',
            [mxConstants.STYLE_FONTSTYLE]: 0,
            [mxConstants.STYLE_IMAGE_WIDTH]: '48',
            [mxConstants.STYLE_IMAGE_HEIGHT]: '48',
        });

        // NOTE: Alternative vertex style for non-HTML labels should be as
        // follows. This repaces the above style for HTML labels.
        /*var style = new Object();
        style[mxConstants.STYLE_SHAPE] = mxConstants.SHAPE_LABEL;
        style[mxConstants.STYLE_PERIMETER] = mxPerimeter.RectanglePerimeter;
        style[mxConstants.STYLE_VERTICAL_ALIGN] = mxConstants.ALIGN_TOP;
        style[mxConstants.STYLE_ALIGN] = mxConstants.ALIGN_CENTER;
        style[mxConstants.STYLE_IMAGE_ALIGN] = mxConstants.ALIGN_CENTER;
        style[mxConstants.STYLE_IMAGE_VERTICAL_ALIGN] = mxConstants.ALIGN_TOP;
        style[mxConstants.STYLE_SPACING_TOP] = '56';
        style[mxConstants.STYLE_GRADIENTCOLOR] = '#7d85df';
        style[mxConstants.STYLE_STROKECOLOR] = '#5d65df';
        style[mxConstants.STYLE_FILLCOLOR] = '#adc5ff';
        style[mxConstants.STYLE_FONTCOLOR] = '#1d258f';
        style[mxConstants.STYLE_FONTFAMILY] = 'Verdana';
        style[mxConstants.STYLE_FONTSIZE] = '12';
        style[mxConstants.STYLE_FONTSTYLE] = '1';
        style[mxConstants.STYLE_ROUNDED] = '1';
        style[mxConstants.STYLE_IMAGE_WIDTH] = '48';
        style[mxConstants.STYLE_IMAGE_HEIGHT] = '48';
        style[mxConstants.STYLE_OPACITY] = '80';
        graph.getStylesheet().putDefaultVertexStyle(style);*/
        graph.getStylesheet().putCellStyle('group', {
            [mxConstants.STYLE_SHAPE]: mxConstants.SHAPE_SWIMLANE,
            [mxConstants.STYLE_PERIMETER]: mxPerimeter.RectanglePerimeter,
            [mxConstants.STYLE_ALIGN]: mxConstants.ALIGN_CENTER,
            [mxConstants.STYLE_VERTICAL_ALIGN]: mxConstants.ALIGN_TOP,
            [mxConstants.STYLE_FILLCOLOR]: '#FF9103',
            [mxConstants.STYLE_GRADIENTCOLOR]: '#F8C48B',
            [mxConstants.STYLE_STROKECOLOR]: '#E86A00',
            [mxConstants.STYLE_FONTCOLOR]: '#000000',
            [mxConstants.STYLE_ROUNDED]: true,
            [mxConstants.STYLE_OPACITY]: '80',
            [mxConstants.STYLE_STARTSIZE]: '30',
            [mxConstants.STYLE_FONTSIZE]: '16',
            [mxConstants.STYLE_FONTSTYLE]: 1
        });

        graph.getStylesheet().putCellStyle('port', {
            [mxConstants.STYLE_SHAPE]: mxConstants.SHAPE_IMAGE,
            [mxConstants.STYLE_FONTCOLOR]: '#774400',
            [mxConstants.STYLE_PERIMETER]: mxPerimeter.RectanglePerimeter,
            [mxConstants.STYLE_PERIMETER_SPACING]: '6',
            [mxConstants.STYLE_ALIGN]: mxConstants.ALIGN_LEFT,
            [mxConstants.STYLE_VERTICAL_ALIGN]: mxConstants.ALIGN_MIDDLE,
            [mxConstants.STYLE_FONTSIZE]: '10',
            [mxConstants.STYLE_FONTSTYLE]: 2,
            [mxConstants.STYLE_IMAGE_WIDTH]: '16',
            [mxConstants.STYLE_IMAGE_HEIGHT]: '16',
        });

        const edgeStyle = graph.getStylesheet().getDefaultEdgeStyle();
        Object.assign(edgeStyle, {
            [mxConstants.STYLE_LABEL_BACKGROUNDCOLOR]: '#FFFFFF',
            [mxConstants.STYLE_STROKEWIDTH]: '2',
            [mxConstants.STYLE_ROUNDED]: true,
            [mxConstants.STYLE_EDGE]: mxEdgeStyle.EntityRelation
        });
    }

    createHints() {
        // Displays useful hints in a small semi-transparent box.
        const hints = document.createElement('div');
        hints.style.position = 'absolute';
        hints.style.overflow = 'hidden';
        hints.style.width = '230px';
        hints.style.bottom = '56px';
        hints.style.height = '76px';
        hints.style.right = '20px';

        hints.style.background = 'black';
        hints.style.color = 'white';
        hints.style.fontFamily = 'Arial';
        hints.style.fontSize = '10px';
        hints.style.padding = '4px';

        mxUtils.setOpacity(hints, 50);

        mxUtils.writeln(hints, '- Drag an image from the sidebar to the graph');
        mxUtils.writeln(hints, '- Doubleclick on a vertex or edge to edit');
        mxUtils.writeln(hints, '- Shift- or Rightclick and drag for panning');
        mxUtils.writeln(hints, '- Move the mouse over a cell to see a tooltip');
        mxUtils.writeln(hints, '- Click and drag a vertex to move and connect');
        this.el.appendChild(hints);
    }

    setEffects() {
        // Creates the outline (navigator, overview) for moving
        // around the graph in the top, right corner of the window.
        var outln = new mxOutline(graph, outline);

        // To show the images in the outline, uncomment the following code
        //outln.outline.labelsVisible = true;
        //outln.outline.setHtmlLabels(true);

        // Fades-out the splash screen after the UI has been loaded.
        const splash = document.getElementById('splash');
        if (splash != null) {
            try {
                mxEvent.release(splash);
                mxEffects.fadeOut(splash, 100, true);
            } catch (e) {

                // mxUtils is not available (library not loaded)
                splash.parentNode.removeChild(splash);
            }
        }
    }

    render() {
        // Checks if the browser is supported
        if (!mxClient.isBrowserSupported()) {
            // Displays an error message if the browser is not supported.
            mxUtils.error('Browser is not supported!', 200, false);
        } else {
            this.init();
            this.createEditor();
            this.defineGroup();
            this.overrideLabel();
            this.registerDbClick();
            // Adds all required styles to the graph (see below)
            this.configureStylesheet();
            this.createHints();
            this.setEffects();
        }
    }

    showModalWindow(graph, title, content, width, height) {
        const background = document.createElement('div');
        background.style.position = 'absolute';
        background.style.left = '0px';
        background.style.top = '0px';
        background.style.right = '0px';
        background.style.bottom = '0px';
        background.style.background = 'black';
        mxUtils.setOpacity(background, 50);
        document.body.appendChild(background);

        if (mxClient.IS_IE) {
            new mxDivResizer(background);
        }

        const x = Math.max(0, document.body.scrollWidth / 2 - width / 2);
        const y = Math.max(10, (document.body.scrollHeight ||
            document.documentElement.scrollHeight) / 2 - height * 2 / 3);
        const wnd = new mxWindow(title, content, x, y, width, height, false, true);
        wnd.setClosable(true);

        // Fades the background out after after the window has been closed
        wnd.addListener(mxEvent.DESTROY, function (evt) {
            graph.setEnabled(true);
            mxEffects.fadeOut(background, 50, true,
                10, 30, true);
        });

        graph.setEnabled(false);
        graph.tooltipHandler.hide();
        wnd.setVisible(true);
    };

}
