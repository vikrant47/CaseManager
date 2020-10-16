<?php

namespace Demo\Core\FormWidgets;

use Backend\Classes\FormWidgetBase;
use Demo\Core\Classes\Beans\TwigEngine;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Models\ModelModel;
use Demo\Workspace\Models\Task;
use October\Rain\Database\QueryBuilder;
use October\Rain\Exception\ApplicationException;
use Ramsey\Uuid\Uuid;

class RelatedList extends FormWidgetBase
{
    static function getProperties()
    {
        return [
            'list' => [
                'title' => 'List',
                'list' => 'string',
                'ignoreIfEmpty' => false,
                'default' => 'default',
            ],
            'targetModel' => [
                'title' => 'Target Model',
                'list' => 'dropdown',
                'options' => PluginConnection::getAllModelAlias(),
                'ignoreIfEmpty' => false,
                'validation' => [
                    'required' => [
                        'message' => 'Please select the Target Model'
                    ]
                ]
            ],
            'query' => [
                'title' => 'Other list',
                'description' => 'This should be the key column of through table in HasMany relationship',
                'list' => 'repeater',
                'ignoreIfEmpty' => false
            ],
            'recordUrl' => [
                'title' => 'Record Url',
                'list' => 'string',
            ],
        ];
    }

    /**
     * @var string A unique alias to identify this widget.
     */
    protected $defaultAlias = 'relatedlist';


    /**
     * Target Model Class
     */
    public $targetModel = null;

    /**
     * @var array query for the related list
     */
    public $query;

    public $editable = false;
    public $recordUrl;

    private function loadTableNames(RelatedList $relatedList)
    {
        if (empty($relatedList->throughTable)) {
            $throughModel = new $relatedList->throughModel();
            $relatedList->throughTable = $throughModel->table;
        }
        $targetModel = new $relatedList->targetModel();
        $relatedList->targetTable = $targetModel->table;
    }

    public function getAssociationConfig()
    {
        return [
            'targetModel' => $this->targetModel,
            'list' => $this->list,
            'query' => json_decode(TwigEngine::eval(json_encode($this->query), ['model' => $this->model, 'self' => $this])),
            'recordUrl' => $this->recordUrl,
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function applyRelationFilter(\Backend\Widgets\Lists $widget)
    {
        $relatedList = $this;
        $widget->addFilter(function (\October\Rain\Database\Builder $query) use ($relatedList) {
            if ($relatedList->relation === 'HasMany') {
                /** @var \October\Rain\Database\Builder $query */
                if (empty($relatedList->throughModel) && empty($relatedList->throughTable)) {
                    return $query->where($relatedList->targettype, '=', $relatedList->model->{$relatedList->list});
                }
                $this->loadTableNames($relatedList);
                return $query->join($relatedList->throughTable, $relatedList->targetTable . '.' . $relatedList->query, '=', $relatedList->throughTable . '.id')
                    ->where($relatedList->throughTable . '.' . $relatedList->targettype, '=', $relatedList->model->{$relatedList->list});
                // TODO: HasMany with through table
            } else if ($relatedList->relation === 'BelongsToMany') {
                $this->loadTableNames($relatedList);
                return $query->join($relatedList->throughTable, $relatedList->targetTable . '.' . $relatedList->query, '=', $relatedList->throughTable . '.id')
                    ->where($relatedList->throughTable . '.' . $relatedList->targettype, '=', $relatedList->model->{$relatedList->list});
            }
        });
        return $widget;
    }

    public function init()
    {
        $this->fillFromConfig([
            'relation',
            'targetModel',
            'list',
            'recordUrl',
            'query',
        ]);
        /*$config = $this->makeConfig('$/' . strtolower($this->targetModel) . '/columns.yaml');

        $config->model = new $this->targetModel;

        $config->recordUrl = $this->recordUrl;

        $widget = $this->makeWidget('Backend\Widgets\Lists', $config);

        $widget->bindToController();
        $this->applyRelationFilter($widget);
        $this->vars['widget'] = $widget;*/
        $this->vars['id'] = 'related-list-' . Uuid::uuid4()->toString();
        $this->vars['modelRecord'] = ModelModel::where('model', $this->targetModel)->first();

    }

    public function widgetDetails()
    {
        return [
            'name' => 'Related List',
            'description' => 'Widget to show related record as list'
        ];
    }

    /**Nothing to save*/
    public function getSaveValue($value)
    {
        return;
    }

    public function loadAssets()
    {
        parent::loadAssets(); // TODO: Change the autogenerated stub
    }

    public function render()
    {
        return $this->makePartial('relatedlist');
    }
}
