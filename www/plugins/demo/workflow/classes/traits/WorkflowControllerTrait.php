<?php


namespace Demo\Workflow\Classes\Traits;


use Demo\Workflow\Controllers\WorkflowEntities;
use Demo\Workflow\Models\Queue;
use Demo\Workflow\Models\WorkflowItem;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use October\Rain\Exception\ApplicationException;
use BackendAuth;
use October\Rain\Support\Facades\Flash;
use Backend\Models\User;

trait WorkflowControllerTrait
{
    public function onSubmit($modelId)
    {
        if ($this->user->hasAccess('workflow.item.push')) {
            $model = $this->formFindModelObject($modelId);
            /**@var $workflowEntities Collection<WorkflowItemTrait> */
            $workflowEntities = WorkflowItem::where('item_type', '=', get_class($model))->where('entity_id', '=', $model->id)->get();
            // throw new ApplicationException(json_encode($workflowEntities, true));
            if ($workflowEntities->count() === 0) {
                throw new ApplicationException('Unable to submit. No active workflow found');
            } else {
                /**@var $workflowItem WorkflowItemTrait */
                $workflowItem = $workflowEntities->first();
                $workflowItem->makeTransition($model);
            }
            Flash::success('Pushed Successfully!');
            return $this->makeRedirect('-close');
        } else {
            Flash::error('You are not authorized to perform this action');
        }
    }

    public function onPickItemFromQueue()
    {
        $queueId = Request::input('queueId');
        /**@var $queue Queue */
        $queue = Queue::find($queueId);
        if (empty($queue)) {
            Flash::success('Unable to find queue with given id');
        }
        $queue->popAndAssign();
        Flash::success('A item has been assigned');
        return $this->makeRedirect('-close');
    }

    public function getQueuesForCurrentUser()
    {
        trace_sql();
        $currentUser = BackendAuth::getUser();
        $queues = Queue::getQueuesForUser($currentUser);
        return $queues;
    }
}