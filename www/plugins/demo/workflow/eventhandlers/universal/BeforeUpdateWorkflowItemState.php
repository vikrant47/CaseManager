<?php


namespace Demo\Workflow\EventHandlers\Universal;


use Demo\Core\Classes\Beans\ScriptContext;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Workflow\Models\Queue;
use Demo\Workflow\Models\QueueItem;
use Demo\Workflow\Models\WorkflowItem;
use Demo\Workflow\Models\WorkflowTransition;

class BeforeUpdateWorkflowItemState
{
    public $model = WorkflowItem::class;
    public $events = ['updated'];
    public $sort_order = -1000;

    /**
     * Find all queues based on Model and evaluate them one by one
     * If a queue qualifies than break the loop.
     * Only one queue is alloed to push an item
     */
    public function handler($event, $model)
    {
        $original = $model->getOriginal();
        if (!empty($original['current_state_id']) && $original['current_state_id'] != $model->current_state_id) {
            $transition = new WorkflowTransition();
            $transition->from_state_id = $original['current_state_id'];
            $transition->to_state_id = $model->current_state_id;
            $transition->workflow_item_id = $model->id;
            PluginConnection::getCurrentLogger();
            $transition->save();
        }
    }
}