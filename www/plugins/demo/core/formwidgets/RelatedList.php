<?php

namespace Demo\Core\FormWidgets;

use Backend\Classes\FormWidgetBase;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Workflow\Models\QueueItem;
use October\Rain\Database\QueryBuilder;
use October\Rain\Exception\ApplicationException;

class RelatedList extends FormWidgetBase
{
    static function getProperties()
    {
        return [
            'relation' => [
                'title' => 'Type of the relation',
                'type' => 'dropdown',
                'options' => [
                    'HasMany' => 'Has Many',
                    'BelongsToMany' => 'Belongs To Many',
                ],
                'ignoreIfEmpty' => false,
                'validation' => [
                    'required' => [
                        'message' => 'Please select the relation'
                    ]
                ]
            ],
            'sourceKey' => [
                'title' => 'Source Key',
                'type' => 'string',
                'ignoreIfEmpty' => false,
                'default' => 'id',
                'validation' => [
                    'required' => [
                        'message' => 'Please enter Source Key'
                    ]
                ]
            ],
            'targetModel' => [
                'title' => 'Target Model',
                'type' => 'dropdown',
                'options' => PluginConnection::getAllModelAlias(),
                'ignoreIfEmpty' => false,
                'validation' => [
                    'required' => [
                        'message' => 'Please select the Target Model'
                    ]
                ]
            ],
            'targetKey' => [
                'title' => 'Target Key',
                'type' => 'string',
                'ignoreIfEmpty' => false,
                'validation' => [
                    'required' => [
                        'message' => 'Please enter Target Key'
                    ]
                ]
            ],
            'throughModel' => [
                'title' => 'Through Model',
                'type' => 'dropdown',
                'options' => PluginConnection::getAllModelAlias(),
                'ignoreIfEmpty' => true,
            ],
            'throughTable' => [
                'title' => 'Through Table',
                'type' => 'string',
                'ignoreIfEmpty' => true,
            ],
            'otherKey' => [
                'title' => 'Other Key',
                'description' => 'This should be the key column of through table in HasMany relationship',
                'type' => 'string',
                'ignoreIfEmpty' => false
            ],
            'recordUrl' => [
                'title' => 'Record Url',
                'type' => 'string',
            ],
        ];
    }

    /**
     * @var string A unique alias to identify this widget.
     */
    protected $defaultAlias = 'relatedlist';

    //
    // Configurable properties
    //

    /**
     * @var string $relation HasMany or BelongsToMany.
     */
    public $relation = 'HasMany';

    /**
     * Target Model Class
     */
    public $targetModel = null;

    /**
     * Target Model Class
     */
    public $targetTable = null;

    /**
     * @var string source key column of the relation
     */
    public $sourceKey = 'id';

    /**
     * @var string target key column of the relation
     */
    public $targetKey;

    /**
     * @var string through table name in case of BelongsToMany
     */
    public $throughTable;

    /**
     * @var string through model
     */
    public $throughModel;

    /**
     * @var string other key column of the relation
     */
    public $otherKey;

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
                    return $query->where($relatedList->targetKey, '=', $relatedList->model->{$relatedList->sourceKey});
                }
                $this->loadTableNames($relatedList);
                return $query->join($relatedList->throughTable, $relatedList->targetTable . '.' . $relatedList->otherKey, '=', $relatedList->throughTable . '.id')
                    ->where($relatedList->throughTable . '.' . $relatedList->targetKey, '=', $relatedList->model->{$relatedList->sourceKey});
                // TODO: HasMany with through table
            } else if ($relatedList->relation === 'BelongsToMany') {
                $this->loadTableNames($relatedList);
                return $query->join($relatedList->throughTable, $relatedList->targetTable . '.' . $relatedList->otherKey, '=', $relatedList->throughTable . '.id')
                    ->where($relatedList->throughTable . '.' . $relatedList->targetKey, '=', $relatedList->model->{$relatedList->sourceKey});
            }
        });
        return $widget;
    }

    public function init()
    {
        $this->fillFromConfig([
            'relation',
            'targetModel',
            'sourceKey',
            'targetKey',
            'throughTable',
            'throughModel',
            'recordUrl',
            'otherKey',
        ]);
        $config = $this->makeConfig('$/' . strtolower($this->targetModel) . '/columns.yaml');

        $config->model = new $this->targetModel;

        $config->recordUrl = $this->recordUrl;

        $widget = $this->makeWidget('Backend\Widgets\Lists', $config);

        $widget->bindToController();
        $this->applyRelationFilter($widget);
        $this->vars['widget'] = $widget;

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