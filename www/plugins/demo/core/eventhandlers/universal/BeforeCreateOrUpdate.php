<?php

namespace Demo\Core\EventHandlers\Universal;

use BackendAuth;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Models\ModelModel;

class BeforeCreateOrUpdate
{
    public $model = 'universal';
    public $events = ['creating', 'updating'];
    public $sort_order = -1000;

    public function handler($event, $model)
    {
        $attachAuditedBy = $model->attachAuditedBy;
        if (empty($attachAuditedBy)) {
            $modelModel = ModelModel::where('model_type', get_class($model))->first();
            if (!empty($modelModel)) {
                $attachAuditedBy = $modelModel->attach_audited_by;
            }
        }
        if ($attachAuditedBy) {
            PluginConnection::getCurrentLogger();
            $user = BackendAuth::getUser();
            if ($event === 'creating') {
                $model->created_by_id = $user->id;
            }
            $model->updated_by_id = $user->id;
        }
    }
}
