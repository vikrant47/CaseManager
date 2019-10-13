<?php


namespace Demo\Casemanager\Classes\Traits;


use Demo\Casemanager\Controllers\WorkflowEntities;
use Demo\Casemanager\Models\QueueModel;
use Demo\Casemanager\Models\WorkflowEntitiesModel;
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
        $model = $this->formFindModelObject($modelId);
        /**@var $workflowEntities Collection<WorkflowEntitiesModel> */
        $workflowEntities = WorkflowEntitiesModel::where('entity_type', '=', get_class($model))->where('entity_id', '=', $model->id)->get();
        // throw new ApplicationException(json_encode($workflowEntities, true));
        if ($workflowEntities->count() === 0) {
            throw new ApplicationException('Unable to submit. No active workflow found');
        } else {
            /**@var $workflowEntity WorkflowEntitiesModel */
            foreach ($workflowEntities as $workflowEntity) {
                $workflowEntity->makeTransition($model);
            }
        }
        Flash::success('Pushed Successfully!');
    }

    public function onPickItemFromQueue()
    {
        $queueId = Request::input('queueId');
        /**@var $queue QueueModel */
        $queue = QueueModel::find($queueId);
        if (empty($queue)) {
            Flash::success('Unable to find queue with given id');
        }
        $currentUser = BackendAuth::getUser();
        $queue->popAndAssignTo($currentUser);
        Flash::success('A item has been assigned');
    }

    public function getQueuesForCurrentUser()
    {
        DB::connection()->enableQueryLog();
        $currentUser = BackendAuth::getUser();
        return QueueModel::getQueuesForUser($currentUser)->get();
    }
}