<?php


namespace Demo\Core\FlowDesigner\Classes\Beans;

use Illuminate\Support\Collection;

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
    const DATA_PREFIX = 'engine-data-';
    /**@var string $id */
    protected $id;
    /**@var string $value */
    protected $value;

    /**@var FlowItem $parent */
    protected $parent;

    /**@var string $parentId */
    protected $parentId;

    /**@var Collection $data */
    protected $data;
    /**@var Flow $flow Flow for the item */
    protected $flow;

    public function __construct()
    {
        $this->data = collect([]);
    }

    /***
     *
     * This will unserialize the given array element
     * example -
     * <mxCell id="30" value="Trigger" style="port;image=editors/images/overlays/flash.png;align=right;imageAlign=right;spacingRight=18" vertex="1" parent="29">
     * * <mxGeometry y="0.25" width="16" height="16" relative="1" as="geometry">
     * * * <mxPoint x="-6" y="-8" as="offset" />
     * * </mxGeometry>
     * </mxCell>
     */
    public function unserialize(array $jsonItem)
    {
        $this->id = $jsonItem['id'];
        $this->value = $jsonItem['value'];
        $this->parentId = $jsonItem['parent'];
        foreach ($jsonItem as $item => $value) {
            if (starts_with($item, self::DATA_PREFIX)) {
                $this->data->put(camel_case(substr($item, strlen(self::DATA_PREFIX))), $value);
            }
        }
    }

    /**
     * @param Flow $flow Flow for the item
     */
    public function setFlow($flow)
    {
        $this->flow = $flow;
    }
}
