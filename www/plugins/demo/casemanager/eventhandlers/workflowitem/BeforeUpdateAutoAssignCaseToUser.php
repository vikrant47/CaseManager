<?php

namespace Demo\Casemanager\EventHandlers\WorkflowItem;


use Demo\Casemanager\Models\CaseModel;
use Demo\Core\Classes\Beans\ScriptContext;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Classes\Utils\ModelUtil;
use Demo\Workflow\Models\Workflow;
use Demo\Workflow\Models\WorkflowItem;
use Demo\Workflow\Models\WorkflowTransition;
use Log;
use October\Rain\Exception\ApplicationException;
use System\Models\EventLog;

class BeforeUpdateAutoAssignCaseToUser
{
    public $model = WorkflowItem::class;
    public $events = ['updating'];
    public $sort_order = 999;

    /**
     * Check if the workflow item is being assigned to a user
     * Assign the corresponding case to the same user
     */
    public function handler($event, $model)
    {
        $logger = PluginConnection::getCurrentLogger();
        if ($model->isDirty('assigned_to_id') && $model->item_type === CaseModel::class) {
            $entity = CaseModel::find($model->item_id);
            $entity->assigned_to_id = $model->assigned_to_id;
            $entity->save();
            $logger->debug('Case with id ' . $entity->id . ' has been assigned to user ' . $model->assigned_to_id);
        }
    }
}
