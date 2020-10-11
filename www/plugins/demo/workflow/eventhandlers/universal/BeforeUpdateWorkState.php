<?php


namespace Demo\Workflow\EventHandlers\Universal;


use Demo\Core\Classes\Beans\TemplateEngine;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Workflow\Models\Queue;
use Demo\Workflow\Models\Task;
use Demo\Workflow\Models\Work;
use Demo\Workflow\Models\WorkflowTransition;

class BeforeUpdateWorkState
{
    public $model = Work::class;
    public $events = ['updated'];
    public $sort_order = -1000;

    /**
     * Find all queues based on Model and evaluate them one by one
     * If a queue qualifies than break the loop.
     * Only one queue is allowed to push an item
     */
    public function handler($event, $model)
    {
        $original = $model->getOriginal();
        if (!empty($original['workflow_state_id']) && $original['workflow_state_id'] != $model->workflow_state_id) {
            $transition = new WorkflowTransition();
            $transition->from_state_id = $original['workflow_state_id'];
            $transition->to_state_id = $model->workflow_state_id;
            $transition->work_id = $model->id;
            $data = request()->attributes->get('WORKFLOW_ITEM_DATA_' . $model->id);
            $backward_direction = request()->attributes->get('backwardDirection');
            $transition->data = $data;
            $transition->backward_direction = $backward_direction === true;
            $transition->engine_application_id = $model->engine_application_id;
            $transition->save();
        }
    }
}
