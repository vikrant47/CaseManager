<?php


namespace Demo\Core\Classes\Beans;


class CascadeRecord
{
    const RESTRICT = 'restrict';
    const DELETE = 'delete';
    const CLEAR = 'clear';
    const NONE = 'none';

    public $modelType;
    public $id;

    public $parent;

    public $children;

    /**
     * CascadeRecord constructor.
     * @param $modelType
     * @param $id
     */
    public function __construct($modelType, $id)
    {
        $this->modelType = $modelType;
        $this->id = $id;
    }


}