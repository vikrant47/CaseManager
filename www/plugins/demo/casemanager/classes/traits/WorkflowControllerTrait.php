<?php


namespace Demo\Casemanager\Classes\Traits;


use Demo\Casemanager\Controllers\WorkflowEntities;
use Demo\Casemanager\Models\WorkflowEntitiesModel;
use Illuminate\Support\Collection;
use October\Rain\Exception\ApplicationException;
use BackendAuth;
use October\Rain\Support\Facades\Flash;

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
}