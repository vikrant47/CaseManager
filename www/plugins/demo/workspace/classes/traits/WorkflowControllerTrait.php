<?php


namespace Demo\Workspace\Classes\Traits;


use Demo\Workspace\Controllers\WorkController;
use Demo\Workspace\Models\Queue;
use Demo\Workspace\Models\Work;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use October\Rain\Exception\ApplicationException;
use BackendAuth;
use October\Rain\Support\Facades\Flash;
use Backend\Models\User;

trait WorkflowControllerTrait
{
    public function onSubmitwork($model)
    {
        if (is_numeric($model)) {
            $model = $this->formFindModelObject($model);
        }
        /**@var $works Collection<work> */
        $work = work::where('model', '=', get_class($model))->where('record_id', '=', $model->id)->first();
        // throw new ApplicationException(json_encode($workflowEntities, true));
        if (empty($work)) {
            throw new ApplicationException('Unable to submit. No active workflow found');
        } else {
            /**@var $work work */
            $work->makeTransition();
        }
        Flash::success('Pushed Successfully!');
        return $this->makeRedirect('-close');
    }

    public function onPickItemFromQueue()
    {
        $queueId = Request::input('queueId');
        if (empty($queueId)) {
            $this->setStatusCode(400);
            Flash::error('Please select a queue to pick a case');
            return;
        }
        /**@var $queue Queue */
        $queue = Queue::find($queueId);
        if (empty($queue)) {
            $this->setStatusCode(400);
            Flash::success('Unable to find queue with given id');
            return ;
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
