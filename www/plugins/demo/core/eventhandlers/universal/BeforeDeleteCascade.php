<?php

namespace Demo\Core\EventHandlers\Universal;

use BackendAuth;
use Demo\Core\Classes\Beans\CascadeRecord;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Models\ModelAssociation;
use Demo\Core\Models\ModelModel;
use October\Rain\Exception\ApplicationException;
use Illuminate\Http\Request;

class BeforeDeleteCascade
{
    public $model = 'universal';
    public $events = ['deleting'];
    public $sort_order = 1001;

    public function handler($event, $model)
    {
        /**
         * @var $request Request
         */
        $request = request();

        $associations = ModelAssociation::where([
            'active' => 1,
            'target_model' => get_class($model),
            'relation' => 'belongsTo',
        ])->where('cascade', '!=', 'none')->orderBy('cascade_priority_order')->get();
        if (count($associations) === 0) {
            return;
        }
        // Tree root node ref
        $rootNode = $request->attributes->get('CASCADE_TREE');
        if (!$rootNode) {
            $rootNode = new CascadeRecord($associations[0]['target_model'], $model->id);
            $request->attributes->set('CASCADE_TREE', $rootNode);
        }
        // last node ref
        $parentNode = $request->attributes->get('PARENT_NODE');
        if (!$parentNode) {
            $parentNode = $rootNode;
        }
        // traversing the association to apply cascade
        foreach ($associations as $association) {
            // handling restrict cascade type
            if ($association->cascade === CascadeRecord::RESTRICT) {
                $this->handleRestrictCascade($model, $association);
            } else {
                $childRecordCount = $model->source_model::where($association->foreign_key, $model->{$otherKey})->count();
                if ($childRecordCount > 0) {
                    // handling clear cascade type
                    if ($association->cascade === CascadeRecord::CLEAR) {
                        $model->source_model::where($association->foreign_key, $model->{$otherKey})->update([$association->foreign_key => null]);
                    } else if ($association->cascade === CascadeRecord::DELETE) {
                        // $model->source_model::where($association->foreign_key, $model->{$otherKey})->delete(); // this should trigger delete event handlers
                        $childRecords = $model->source_model::where($association->foreign_key, $model->{$otherKey})->get();
                        foreach ($childRecords as $childRecord) {
                            $childRecord->delete();
                        }
                    };
                }
            }
        }
    }

    public function printPathFromChildToRoot($childNode)
    {
        if ($childNode->parent) {
            /* Fetching association of given $childNode in given data structure
            parent = [{association:assoc,child:[child1,child2]}]
            */
            $children = array_filter($childNode->parent->children, function ($child) use ($childNode) {
                return count(array_filter($child->data, function ($d) use ($childNode) {
                        return $d->recordId === $childNode->recordId;
                    })) > 0;
            });
            if (count($children) > 0) {
                $association = $children[0]->association;
                return $association->source_model_ref->name . '[' . $association->foreign_key . ']'
                    . ' -- (' . $association->cascade . ') -->'
                    . $this->printPathFromChildToRoot($childNode->parent);
            }
        }
        return $childNode->tableName;
    }

    /**
     * @throw ApplicationException
     */
    public function handleRestrictCascade($currentModel, $association)
    {
        $sourceModel = $association->source_model;
        $otherKey = $association->otherKey;
        if (empty($otherKey)) {
            $otherKey = 'id';
        }
        $childCount = $sourceModel::where($association->foreign_key, $currentModel->{$otherKey})->count();
        if ($childCount > 0) {
            throw new ApplicationException('Unable to delete the record. There exists some child reference of type ' . $association->source_model);
        }
    }
}
