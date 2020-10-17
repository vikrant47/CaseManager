<?php


namespace Demo\Workspace\Classes\Traits;

use Backend\Models\User;
use BackendAuth;
use Demo\Workspace\Models\Work;

trait WorkTrait
{
    public function isAssignedToCurrentUser(): boolean
    {
        return work::where([
                'model' => get_class($this),
                'record_id' => $this->id,
                'assigned_to_id' => BackendAuth::getUser()->id,
            ])->cont() > 0;
    }
}
