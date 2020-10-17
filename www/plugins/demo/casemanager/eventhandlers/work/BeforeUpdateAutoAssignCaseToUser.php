<?php

namespace Demo\Casemanager\EventHandlers\Work;


use Demo\Casemanager\Models\CaseModel;
use Demo\Core\Classes\Beans\TemplateEngine;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Classes\Utils\ModelUtil;
use Demo\Workspace\Models\Workflow;
use Demo\Workspace\Models\Work;
use Demo\Workspace\Models\WorkflowTransition;
use Log;
use October\Rain\Exception\ApplicationException;
use System\Models\EventLog;

class BeforeUpdateAutoAssignCaseToUser
{
    public $model = Work::class;
    public $events = ['updating', 'creating'];
    public $sort_order = 999;

    /**
     * Check if the workflow item is being assigned to a user
     * Assign the corresponding case to the same user
     */
    public function handler($event, $model)
    {
        $logger = PluginConnection::getCurrentLogger();
        if ($model->model === CaseModel::class) {
            if ($model->isDirty('assigned_to_id') || $model->isDirty('workflow_state_id')) {
                $entity = CaseModel::find($model->record_id);
                if (!empty($entity)) {
                    $entity->assigned_to_id = $model->assigned_to_id;
                    $entity->workflow_state_id = $model->workflow_state_id; // TODO: fetch workflow_state_id field from workflow model_state_field
                    $entity->save();
                    $logger->debug('Case with id ' . $entity->id . ' has been assigned to user ' . $model->assigned_to_id);
                }
            }
        }
    }
}
