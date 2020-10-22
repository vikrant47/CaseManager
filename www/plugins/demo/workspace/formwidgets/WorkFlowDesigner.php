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
        $this->addJs('/plugins/demo/workspace/formwidgets/workflowdesigner/assests/js/workflowdesigner.js');
        return $this->makePartial('workflowdesigner');
    }
}
