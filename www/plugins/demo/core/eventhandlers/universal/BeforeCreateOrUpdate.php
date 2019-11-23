<?php

namespace Demo\Core\EventHandlers\Universal;

use BackendAuth;
use Demo\Core\Classes\Helpers\PluginConnection;

class BeforeCreateOrUpdate
{
    public $model = 'universal';
    public $events = ['creating', 'updating'];
    public $sort_order = -1000;

    public function handler($event, $model)
    {
        if ($model->attachAuditedBy === true) {
            PluginConnection::getLogger('demo.core')->debug('Attaching created_by and updated_by');
            $user = BackendAuth::getUser();
            if ($event === 'creating') {
                $model->created_by_id = $user->id;
            }
            $model->updated_by_id = $user->id;
        }
    }
}
