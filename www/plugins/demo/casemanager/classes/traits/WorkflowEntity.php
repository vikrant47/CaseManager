<?php


namespace Demo\Casemanager\Classes\Traits;

use Backend\Models\User;
use BackendAuth;
use Demo\Casemanager\Models\WorkflowEntitiesModel;

trait WorkflowEntity
{
    public function isAssignedToCurrentUser(): boolean
    {
        return WorkflowEntitiesModel::where([
                'entity_type' => get_class($this),
                'entity_id' => $this->id,
                'assigned_to_id' => BackendAuth::getUser()->id,
            ])->cont() > 0;
    }
}