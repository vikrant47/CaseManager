<?php


namespace Demo\Workflow\Classes\Traits;

use Backend\Models\User;
use BackendAuth;
use Demo\Workflow\Models\WorkflowEntity;

trait WorkflowEntityTrait
{
    public function isAssignedToCurrentUser(): boolean
    {
        return WorkflowEntity::where([
                'entity_type' => get_class($this),
                'entity_id' => $this->id,
                'assigned_to_id' => BackendAuth::getUser()->id,
            ])->cont() > 0;
    }
}