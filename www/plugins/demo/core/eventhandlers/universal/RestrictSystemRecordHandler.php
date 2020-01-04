<?php

namespace Demo\Core\EventHandlers\Universal;

use BackendAuth;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Models\ModelModel;
use Demo\Core\Models\Permission;
use Demo\Core\Models\Role;
use October\Rain\Exception\ApplicationException;

/**This will attach audited by as well as prevent system roles modification*/
class RestrictSystemRecordHandler
{
    public $model = 'universal';
    public $events = ['creating', 'updating', 'deleting'];
    public $sort_order = -1000;

    public function handler($event, $model)
    {
        $this->restrictSystemRoleChanges($event, $model);
        $this->restrictSystemPermissionChanges($event, $model);
    }

    public function restrictSystemRoleChanges($event, $model)
    {
        if ($model instanceof Role) {
            if (in_array($model->code, Role::SYSTEM_ROLES)) {
                throw new ApplicationException('Unable to update / delete the system roles');
            }
        }

    }

    public function restrictSystemPermissionChanges($event, $model)
    {
        if ($model instanceof Permission) {
            if ($event === 'updating' || $event === 'deleting') {
                if ($model->system) {
                    throw new ApplicationException('Unable to update / delete the system permissions');
                }
            }
        }
    }
}
