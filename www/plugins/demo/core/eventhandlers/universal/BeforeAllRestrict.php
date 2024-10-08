<?php

namespace Demo\Core\EventHandlers\Universal;

use BackendAuth;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Models\AuditLog;
use Demo\Core\Models\ModelModel;
use Demo\Core\Models\Permission;
use Demo\Core\Models\Role;
use Demo\Core\Services\SecuredEntityService;
use Demo\Core\Services\SwooleServiceProvider;
use Demo\Workspace\Models\WorkflowTransition;
use Illuminate\Validation\UnauthorizedException;
use October\Rain\Exception\ApplicationException;
use October\Rain\Exception\ValidationException;
use October\Rain\Support\Facades\Flash;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;
use System\Models\EventLog;
use Webpatser\Uuid\Uuid;

class BeforeAllRestrict
{
    public $model = 'universal';
    public $events = ['creating', 'updating', 'deleting'];
    public $sort_order = -1000;

    public $ignoreModels = [AuditLog::class, EventLog::class];

    public function handler($event, $model)
    {
        if ($event === 'updating') {
            $this->restrictImmutable($model);
        }
        $this->restrictSecured($event, $model);
        $this->restrictSystemRoleChanges($event, $model);
        $this->restrictSystemPermissionChanges($event, $model);
    }

    /**This should be moved to after all restrict*/
    public function restrictSecured($event, $model)
    {
        if ($model->SECURED === true) {
            $esc = new SecuredEntityService(get_class($model));
            if ($esc->canCRUD($model, Permission::getOperationByEloquentEvent($event)) === false) {
                $message = 'You are not allowed to perform this operation';
                throw new UnauthorizedException($message);
            }
        }
    }

    public function restrictImmutable($model)
    {
        if (property_exists($model, 'immutables') && is_array($model->immutables)) {
            $immutables = $model->immutables;
            foreach ($immutables as $immutable) {
                if ($model->isDirty($immutable)) {
                    $message = 'Can not update field ' . ucwords(str_replace('_', ' ', $immutable));
                    throw new ValidationException([$immutable => $message]);
                }
            }
        }
    }

    public function restrictSystemRoleChanges($event, $model)
    {
        if ($model instanceof Role) {
            if (in_array($model->code, Role::SYSTEM_ROLES)) {
                $message = 'Unable to update / delete the system roles';
                Flash::error($message);
                throw new ValidationException(['roles' => $message]);
            }
        }

    }

    public function restrictSystemPermissionChanges($event, $model)
    {
        if ($model instanceof Permission) {
            if ($event === 'updating' || $event === 'deleting') {
                if ($model->system === true) {
                    $message = 'Unable to update / delete the system instance';
                    throw new ValidationException(['permissions' => $message]);
                }
            }
        }
    }
}
