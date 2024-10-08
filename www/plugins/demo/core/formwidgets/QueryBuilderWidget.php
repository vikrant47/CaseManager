<?php

namespace Demo\Core\FormWidgets;

use Backend\Classes\FormWidgetBase;
use Demo\Core\Classes\Beans\TemplateEngine;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Models\ModelModel;
use Demo\Workspace\Models\Task;
use October\Rain\Database\QueryBuilder;
use October\Rain\Exception\ApplicationException;

class QueryBuilderWidget extends FormWidgetBase
{
    static function getProperties()
    {
        return [
            'modelType' => [
                'title' => 'Model',
                'type' => 'dropdown',
                'ignoreIfEmpty' => true,
                'options' => ModelModel::getModelAsDropdownOptions()
            ],
            'modelField' => [
                'title' => 'Model Field',
                'type' => 'dropdown',
                'ignoreIfEmpty' => true,
                'default' => 'model',
                'options' => WorkFlowDesigner::getModelFieldOptions()
            ]
        ];
    }

    /**
     * @var string A unique alias to identify this widget.
     */
    protected $defaultAlias = 'queryBuilderWidget';

    //
    // Configurable properties
    //

    /**
     * @var string Name of the model class
     */
    public $modelType = null;

    /**
     * Field name to fetch model
     */
    public $modelField = null;

    public static function getModelFieldOptions()
    {
        return [];
    }

    public function init()
    {
        $this->fillFromConfig([
            'modelType',
            'modelField',
        ]);
        if (!empty($this->modelField)) {
            $this->vars['modelType'] = $this->model->{$this->modelField};
        } else {
            if (TemplateEngine::isDynamicTemplate($this->modelType)) {
                $this->vars['modelType'] = TemplateEngine::evalTemplate($this->modelType, ['model' => $this->model]);
            } else {
                $this->vars['modelType'] = $this->modelType;
            }
        }
        $this->vars['modelField'] = $this->modelField;
        $this->vars['fetchModelFromField'] = empty($this->modelType);
        $this->vars['id'] = $this->getId();
        $this->vars['name'] = $this->getFieldName();
        $this->vars['value'] = $this->getLoadValue();
        $this->vars['model'] = $this->model;
    }

    public function widgetDetails()
    {
        return [
            'name' => 'Query Builder',
            'description' => 'Widget to design queries'
        ];
    }

    public function getSaveValue($value)
    {
        return $value;
    }

    public function loadAssets()
    {
        parent::loadAssets();
    }

    public function render()
    {
        return $this->makePartial('querybuilderwidget');
    }
}
