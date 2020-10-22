<?php


namespace Demo\Core\FlowDesigner\Classes\Beans;


use Illuminate\Support\Collection;

/**
 * A flow represent a complete diagram in mx graph
 */
class Flow extends FlowItem
{
    /**@var array $diagram */
    protected $diagram;

    /**@var Collection<Node> $nodes */
    protected $nodes;

    /**@var Collection<Edge> $edges */
    protected $edges;

    /**@param array $definition */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param array $diagram
     * @return Flow
     */
    public function unserialize($diagram)
    {
        $this->diagram = $diagram;
    }

    /**@return Collection<Edge> */
    public function getEdges()
    {
        return $this->edges;
    }

    /**@return Collection<Node> */
    public function getNodes()
    {
        return $this->nodes;
    }
}
