<?php


namespace Demo\Core\Controllers;


use Backend\Behaviors\ListController;
use Backend\Classes\Controller;
use BackendAuth;
use Demo\Core\Models\FormAction;
use Demo\Core\Models\ListAction;
use Demo\Core\Models\Navigation;
use Demo\Core\Models\Permission;
use Demo\Core\Services\SecuredEntityService;
use Demo\Core\Services\SecurityService;
use Demo\Core\Services\UserSecurityService;
use DB;
use October\Rain\Exception\ApplicationException;
use Flash;
use Response;
use View;

abstract class AbstractSecurityController extends AbstractPluginController
{
    const ACCESS_DENIED = 403;
    protected $userSecurityService;
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

    /**Overriding default run method to inject code*/
    public function run($action = null, $params = [])
    {
        return parent::run($action, $params);
    }

    public function forwardToAccessDenied($throwError = false)
    {
        Flash::error('Unauthorized Access');
        $this->setStatusCode(403);
        $this->setResponse(Response::make(View::make('backend::access_denied'), 403));
        if ($throwError) {
            throw new ApplicationException('Unauthorized Access');
        }
        return self::ACCESS_DENIED;
    }

    /**
     * Before read permission can be evaluated here
     */
    public function viewExtendQuery($modelClass, $query)
    {
        if (in_array($modelClass, [Navigation::class, ListAction::class, FormAction::class])) {
            $this->userSecurityService->applyViewableModelPermission($query, $modelClass);
        } else {
            $permission = $this->userSecurityService->getRowLevelPermissions($modelClass, Permission::VIEW);
            if ($permission->count() === 0) {
                return $query->whereRaw('2=3'); // returning empty result
            }
            if (!$this->userSecurityService->hasAstrixPermission($permission)) {
                $query->whereRaw($this->userSecurityService->mergeConditions($permission));
            }
        }
    }

    /**
     * Before read permission can be evaluated here
     */
    public function listExtendQuery($query)
    {
        parent::listExtendQuery($query);
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
        $securedEntityService = new SecuredEntityService(get_class($model));
        if ($securedEntityService->canInsert($model) === false) {
            return $this->forwardToAccessDenied(true);
        }
    }

    /**
     * Before updating the model
     */
    public function formBeforeUpdate($model)
    {
        $securedEntityService = new SecuredEntityService(get_class($model));
        if($securedEntityService->canUpdate($model)===false){
            return $this->forwardToAccessDenied(true);
        }
    }

    /**
     * Before deleting the model
     */
    public function formBeforeDelete($model)
    {
        $securedEntityService = new SecuredEntityService(get_class($model));
        if($securedEntityService->canDelete($model)===false){
            return $this->forwardToAccessDenied(true);
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

    /**Events to handle security on ajax controller*/
    public function onReadRecordExtendQuery($query)
    {
        $this->listExtendQuery($query);
    }

    public function onRecordBeforeCreate($models)
    {
        $this->formBeforeCreate($models);
    }

    public function onRecordBeforeUpdate($model)
    {
        $this->formBeforeUpdate($model);
    }

    public function onRecordBeforeDelete($model)
    {
        $this->formBeforeDelete($model);
    }

}
