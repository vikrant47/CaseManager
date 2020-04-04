<?php


namespace Demo\Workflow\Classes\Traits;

use Backend\Models\User;
use BackendAuth;
use Demo\Workflow\Models\WorkflowItem;

trait WorkflowItemTrait
{
    public function isAssignedToCurrentUser(): boolean
    {
        return WorkflowItem::where([
                'model' => get_class($this),
                'record_id' => $this->id,
                'assigned_to_id' => BackendAuth::getUser()->id,
            ])->cont() > 0;
    }
}