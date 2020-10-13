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
use Demo\Workflow\Models\WorkflowTransition;
use Illuminate\Validation\UnauthorizedException;
use October\Rain\Exception\ApplicationException;
use October\Rain\Exception\ValidationException;
use October\Rain\Support\Facades\Flash;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;
use System\Models\EventLog;
use Webpatser\Uuid\Uuid;

class AfterAllRestrict
{
    public $model = 'universal';
    public $events = ['creating', 'updating', 'deleting'];
    public $sort_order = 1000000;

    public $ignoreModels = [AuditLog::class, EventLog::class];

    public function handler($event, $model)
    {
        $this->restrictSecured($event, $model);
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
}
