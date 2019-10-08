<?php namespace Demo\Casemanager\Classes\Traits;

use Backend\Models\User;
use BackendAuth;

/**Provide support for created by and updated by*/
trait UserAuditSupport
{

    public function beforeCreate()
    {
        $user = BackendAuth::getUser();
        $this->created_by = $user->id;
        $this->updated_by = $user->id;
    }

    public function beforeUpdate()
    {
        $user = BackendAuth::getUser();
        $this->updated_by = $user->id;
    }
}