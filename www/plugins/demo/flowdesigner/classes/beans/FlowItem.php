<?php


namespace Demo\Core\FlowDesigner\Classes\Beans;

/***
 *
 * Abstract class to represent a flow item
 * <mxCell id="60" value="Input" style="port;image=editors/images/overlays/check.png;align=right;imageAlign=right;spacingRight=18" vertex="1" parent="58">
 * * <mxGeometry y="0.75" width="16" height="16" relative="1" as="geometry">
 * * *<mxPoint x="-6" y="-4" as="offset" />
 * * </mxGeometry>
 * </mxCell>
 */
abstract class FlowItem
{
    /**@var string $id */
    protected $id;
    /**@var string $value */
    protected $value;

    /**@var FlowItem $parent */
    protected $parent;

    /**@var string $parentId */
    protected $parentId;

    /**@var array $data */
    protected $data;
    /**@var Flow $flow Flow for the item */
    protected $flow;

    public function unserialize(array $jsonItem)
    {
        $this->id = $jsonItem['id'];
        $this->value = $jsonItem['value'];
        $this->parentId = $jsonItem['parent'];
    }

    /**
     * @param Flow $flow Flow for the item
     */
    public function setFlow($flow)
    {
        $this->flow = $flow;
    }
}
