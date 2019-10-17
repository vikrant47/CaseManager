<?php namespace Demo\Core\Classes\Traits;

use Backend\Models\User;
use BackendAuth;

/**Provide support for created by and updated by*/
trait ModelHelper
{
    public function getCurrentUser(): User
    {
        return BackendAuth::getUser();
    }
}