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
                'item_type' => get_class($this),
                'entity_id' => $this->id,
                'assigned_to_id' => BackendAuth::getUser()->id,
            ])->cont() > 0;
    }
}