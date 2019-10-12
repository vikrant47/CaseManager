<?php


namespace Demo\Casemanager\Classes\Traits;


use Demo\Casemanager\Controllers\WorkflowEntities;
use Demo\Casemanager\Models\WorkflowEntitiesModel;
use October\Rain\Exception\ApplicationException;

trait WorkflowControllerTrait
{
    public function onSubmit($modelId)
    {
        $model = $this->formFindModelObject($modelId);
        /**@var $workflowEntities WorkflowEntities[] */
        $workflowEntities = WorkflowEntitiesModel::where(['entity_type' => get_class($model), 'entity_id' => $model->id])->get();
        if ($workflowEntities->count() === 0) {
            throw new ApplicationException('Unable to submit. No active workflow found');
        } else {
            foreach ($workflowEntities as $workflowEntity) {
                $workflowEntity->makeTransition($model);
            }
        }
    }
}