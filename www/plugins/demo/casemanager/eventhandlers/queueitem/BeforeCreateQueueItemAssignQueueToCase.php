<?php

namespace Demo\Casemanager\EventHandlers\QueueItem;


use Demo\Casemanager\Models\CaseModel;
use Demo\Core\Classes\Beans\ScriptContext;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Classes\Utils\ModelUtil;
use Demo\Workflow\Models\QueueItem;
use Demo\Workflow\Models\Workflow;
use Demo\Workflow\Models\WorkflowItem;
use Demo\Workflow\Models\WorkflowTransition;
use Log;
use October\Rain\Exception\ApplicationException;
use System\Models\EventLog;

class BeforeCreateQueueItemAssignQueueToCase
{
    public $model = QueueItem::class;
    public $events = ['creating'];
    public $sort_order = 999;

    /**
     * Assign the current queue inside casemanager case table
     */
    public function handler($event, $model)
    {
        $logger = PluginConnection::getCurrentLogger();
        if ($model->model === WorkflowItem::class) {
            $workflowItem = WorkflowItem::where(['id' => $model->record_id, 'model' => CaseModel::class])->first();
            if (!empty($workflowItem)) {
                $entity = CaseModel::find($workflowItem->record_id);
                $entity->queue_id = $model->queue_id;
                if ($entity->exists) {
                    $entity->save();
                }
                $logger->debug('Case with id ' . $entity->id . ' has been assigned to user ' . $model->assigned_to_id);
            }
        }
    }
}
