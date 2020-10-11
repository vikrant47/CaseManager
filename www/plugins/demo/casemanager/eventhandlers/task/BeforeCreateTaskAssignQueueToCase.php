<?php

namespace Demo\Casemanager\EventHandlers\Task;


use Demo\Casemanager\Models\CaseModel;
use Demo\Core\Classes\Beans\TemplateEngine;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Classes\Utils\ModelUtil;
use Demo\Workflow\Models\Task;
use Demo\Workflow\Models\Workflow;
use Demo\Workflow\Models\Work;
use Demo\Workflow\Models\WorkflowTransition;
use Log;
use October\Rain\Exception\ApplicationException;
use System\Models\EventLog;

class BeforeCreateTaskAssignQueueToCase
{
    public $model = Task::class;
    public $events = ['creating'];
    public $sort_order = 999;

    /**
     * Assign the current queue inside casemanager case table
     */
    public function handler($event, $model)
    {
        $logger = PluginConnection::getCurrentLogger();
        if ($model->model === Work::class) {
            $work = Work::where(['id' => $model->record_id, 'model' => CaseModel::class])->first();
            if (!empty($work)) {
                $entity = CaseModel::find($work->record_id);
                $entity->queue_id = $model->queue_id;
                if ($entity->exists) {
                    $entity->save();
                }
                $logger->debug('Case with id ' . $entity->id . ' has been assigned to user ' . $model->assigned_to_id);
            }
        }
    }
}
