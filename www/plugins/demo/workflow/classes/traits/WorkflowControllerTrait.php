<?php


namespace Demo\Workflow\Classes\Traits;


use Demo\Workflow\Controllers\WorkflowItemController;
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
    public function onSubmitWorkflowItem($model)
    {
        if (is_numeric($model)) {
            $model = $this->formFindModelObject($model);
        }
        /**@var $workflowItems Collection<WorkflowItem> */
        $workflowItem = WorkflowItem::where('model', '=', get_class($model))->where('record_id', '=', $model->id)->first();
        // throw new ApplicationException(json_encode($workflowEntities, true));
        if (empty($workflowItem)) {
            throw new ApplicationException('Unable to submit. No active workflow found');
        } else {
            /**@var $workflowItem WorkflowItem */
            $workflowItem->makeTransition($model);
        }
        Flash::success('Pushed Successfully!');
        return $this->makeRedirect('-close');
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
        $currentUser = BackendAuth::getUser();
        $queues = Queue::getQueuesForUser($currentUser);
        return $queues;
    }
}