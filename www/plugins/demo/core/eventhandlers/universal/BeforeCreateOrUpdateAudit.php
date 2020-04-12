<?php

namespace Demo\Core\EventHandlers\Universal;

use BackendAuth;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Models\AuditLog;
use Demo\Core\Models\ModelModel;
use Demo\Workflow\Models\WorkflowItem;
use Demo\Workflow\Models\WorkflowTransition;
use System\Models\EventLog;

class BeforeCreateOrUpdateAudit
{
    public $model = 'universal';
    public $events = ['creating', 'updating', 'deleting'];
    public $sort_order = -1000;

    public $ignoreModels = [AuditLog::class, EventLog::class];

    public function handler($event, $model)
    {
        $modelClass = get_class($model);
        if (!in_array($modelClass, $this->ignoreModels)) {
            $attachAuditedBy = $model->attachAuditedBy;
            if (empty($attachAuditedBy)) {
                $modelModel = ModelModel::where('model', get_class($model))->first();
                if (!empty($modelModel)) {
                    $attachAuditedBy = $modelModel->attach_audited_by;
                    if ($modelModel->audit) {
                        $this->addAuditLog($modelModel, $model, $event);
                    }
                }
            }
            if ($attachAuditedBy) {
                $user = BackendAuth::getUser();
                if ($event === 'creating') {
                    $model->created_by_id = $user->id;
                }
                $model->updated_by_id = $user->id;
            }
        }
    }

    public function addAuditLog($modelRecord, $modeInstance, $event)
    {
        if ($event !== 'creating') {
            $previous = [];
            $original = $modeInstance->getOriginal();
            $auditColumns = $modelRecord->audit_columns;
            if (!in_array('*', $auditColumns)) {
                foreach ($auditColumns as $auditColumn) {
                    $previous[$auditColumn] = $original[$auditColumn];
                }
            } else {
                $previous = $original;
            }
            AuditLog::create([
                'model' => $modelRecord->model,
                'record_id' => $modeInstance->id,
                'operation' => $event,
                'version' => $modelRecord->version,
                'previous' => $previous,
            ]);
            $modeInstance->version = $modeInstance->version + 1;
        } else {
            $modeInstance->version = 0;
        }
    }
}
