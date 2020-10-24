<?php

namespace Demo\Workspace\FormWidgets;

use Backend\Classes\FormWidgetBase;

class WorkFlowDesigner extends FormWidgetBase
{
    static function getProperties()
    {
        return [

        ];
    }

    /**
     * @var string A unique alias to identify this widget.
     */
    protected $defaultAlias = 'workflowDesigner';
    public function init()
    {
        $this->vars['id'] = $this->getId();
        $this->vars['name'] = $this->getFieldName();
        $this->vars['value'] = $this->getLoadValue();
    }
    //
    // Configurable properties
    //

    public function widgetDetails()
    {
        return [
            'name' => 'Workflow Designer',
            'description' => 'Widget to design workflows'
        ];
    }

    public function render()
    {
        return $this->makePartial('workflowdesigner');
    }
}
