<?php


namespace Demo\Core\FlowDesigner\Classes\Beans;


use Demo\FlowDesigner\Models\NodeModel;
use FontLib\TrueType\Collection;

class Node extends FlowItem
{
    /**
     * @param string $type name of the node implementer  class , NodeModel, WorkflowState
     */
    protected $type;

    /**@var NodeModel $nodeModel */
    protected $nodeModel;

    /**@var string $id of the node model */
    protected $nodeModelId;

    /**@var Collection<Port> $outputPorts */
    protected $outputPorts;

    /**@var Port $inputPort */
    protected $inputPort;

    /**
     * @param string $type name of the node implementer  class , NodeModel, WorkflowState
     */
    protected function __construct($type)
    {
        $this->type = $this;
        $this->outputPorts = collect([]);
    }

    /** Loads the node model from the database */
    public function load()
    {
        $this->nodeModel = $this->type::where('id', $this->nodeModelId)->first();
        return $this;
    }

    /**
     * This will return the collection of output ports
     * @return Collection<Port>
     */
    public function getOutputPorts()
    {
        return $this->outputPorts;
    }

    /***@param Port $port */
    public function addOutputPort(Port $port)
    {
        $this->outputPorts->push($port);
    }

    /**
     * This will return the collection of output ports
     * @return Port
     */
    public function getInputPort()
    {
        return $this->inputPort;
    }

    /**
     * @return Collection<Node>
     */
    public function getAllConnectingNodes()
    {
        $edges = $this->flow->getEdges();
        foreach ($edges as $edge) {

        }
    }

    /**
     * @return Collection<Node>
     */
    public function getOutConnectingNodes()
    {
        $outPorts = $this->getOutputPorts();
        foreach ($outPorts as $outPort) {
           
        }
    }

    /**
     * @return Collection<Node>
     */
    public function getInConnectingNodes()
    {
        $edges = $this->flow->getEdges();
        foreach ($edges as $edge) {

        }
    }
}

