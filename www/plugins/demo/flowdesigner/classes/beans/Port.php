<?php


namespace Demo\Core\FlowDesigner\Classes\Beans;


use Illuminate\Support\Collection;

/**
 * mxGraph type - <mxPoint x="-8" y="-4" as="offset" />
 */
class Port extends FlowItem
{
    /**@var Collection<Edge> $edges */
    protected $edges;

    public function __construct()
    {
        parent::__construct();
        $this->edges = collect([]);
    }

    /**
     * This will return the collection of output ports
     * @return \Illuminate\Support\Collection
     */
    public function getEdges()
    {
        return $this->edge;
    }

    /***@param Edge $edge */
    public function addEdge(Edge $edge)
    {
        $this->edges->push($edge);
    }

    /**@return  FlowItem */
    public function getNode()
    {
        return $this->parent;
    }

    public function unserialize(array $jsonItem)
    {
        parent::unserialize($jsonItem); // TODO: Change the autogenerated stub

    }
}
