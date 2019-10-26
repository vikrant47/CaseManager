<?php

namespace Demo\Core\EventHandlers\Any;

use BackendAuth;

class BeforeCreateOrUpdate
{
    public $model = 'any';
    public $events = ['beforeCreate', 'beforeUpdate'];
    public $sort_order = -1000;

    public function handler($event, $model)
    {
        if ($model->attachAuditedBy === true) {
            $user = BackendAuth::getUser();
            if ($event === 'beforeCreate') {
                $model->created_by_id = $user->id;
            }
            $model->updated_by_id = $user->id;
        }
    }
}
