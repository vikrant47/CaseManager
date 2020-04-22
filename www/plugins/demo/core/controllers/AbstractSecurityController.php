<?php


namespace Demo\Core\Controllers;


use Backend\Behaviors\ListController;
use Backend\Classes\Controller;
use BackendAuth;
use Demo\Core\Models\Permission;
use Demo\Core\Services\SecurityService;
use Demo\Core\Services\UserSecurityService;
use DB;
use October\Rain\Exception\ApplicationException;
use Flash;
use Response;
use View;

abstract class AbstractSecurityController extends AbstractPluginController
{
    private $userSecurityService;
    public $requiredPermissions = [];

    /**
     * AbstractController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->userSecurityService = UserSecurityService::getInstance();
        // $this->requiredPermissions[] = $this->userSecuriyService->getReadPermission($this->getModelClass());
    }

    public function forwardToAccessDenied($throwError = false)
    {
        Flash::error('Unauthorized Access');
        $this->setStatusCode(403);
        $this->setResponse(Response::make(View::make('backend::access_denied'), 403));
        if ($throwError) {
            throw new ApplicationException('Unauthorized Access');
        }
    }

    /**
     * Before read permission can be evaluated here
     */
    public function listExtendQuery(\October\Rain\Database\Builder $query)
    {
        $permission = $this->userSecurityService->getRowLevelPermissions($this->getModelClass(), Permission::READ);
        if ($permission->count() === 0) {
            return $this->forwardToAccessDenied();
        }
        if (!$this->userSecurityService->hasAstrixPermission($permission)) {
            $query->whereRaw($this->userSecurityService->mergeConditions($permission));
        }
    }

    /**
     * Before creating the model
     */
    public function formBeforeCreate($model)
    {
        $permission = $this->userSecurityService->getRowLevelPermissions($this->getModelClass(), Permission::CREATE);
        if ($permission->count() === 0) {
            return $this->forwardToAccessDenied(true);
        }
        if (!$this->userSecurityService->hasAstrixPermission($permission)) {
            $count = get_class($model)::where('id', '=', $model->id)->where(DB::raw($this->userSecurityService->mergeConditions($permission)))->count();
            if ($count === 0) {
                return $this->forwardToAccessDenied(true);
            }
        }
    }

    /**
     * Before updating the model
     */
    public function formBeforeUpdate($model)
    {
        $permission = $this->userSecurityService->getRowLevelPermissions($this->getModelClass(), Permission::WRITE);
        if ($permission->count() === 0) {
            return $this->forwardToAccessDenied(true);
        }
        if (!$this->userSecurityService->hasAstrixPermission($permission)) {
            $count = get_class($model)::where('id', '=', $model->id)->where(DB::raw($this->userSecurityService->mergeConditions($permission)))->count();
            if ($count === 0) {
                return $this->forwardToAccessDenied(true);
            }
        }
    }

    /**
     * Before deleting the model
     */
    public function formBeforeDelete($model)
    {
        $permission = $this->userSecurityService->getRowLevelPermissions($this->getModelClass(), Permission::DELETE);
        if ($permission->count() === 0) {
            return $this->forwardToAccessDenied(true);
        }
        if (!$this->userSecurityService->hasAstrixPermission($permission)) {
            $count = get_class($model)::where('id', '=', $model->id)->where(DB::raw($this->userSecurityService->mergeConditions($permission)))->count();
            if ($count === 0) {
                return $this->forwardToAccessDenied(true);
            }
        }
    }

    /**
     * AJAX handler "onDelete" called from the update action and
     * used for deleting existing records.
     *
     * This handler will invoke the unique controller override
     * `formAfterDelete`.
     *
     * @param int $recordId Record identifier
     * @return mixed
     */
    public function update_onDelete($recordId = null)
    {
        $model = $this->formFindModelObject($recordId);
        $this->formBeforeDelete($model);
        return parent::update_onDelete($recordId);
    }

    /**
     * This is a controller callback for flushing session cache
     */
    public function onFlushSessionCache()
    {
        $this->userSecurityService->flushCache();
    }
}