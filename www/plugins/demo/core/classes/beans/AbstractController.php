<?php


namespace Demo\Core\Classes\Beans;


use Backend\Behaviors\ListController;
use Backend\Classes\Controller;
use Demo\Core\Services\SecurityService;
use October\Rain\Exception\ApplicationException;
use Flash;
use Response;
use View;

abstract class AbstractController extends Controller
{
    private $securiyService;
    private $modelClass;
    public $requiredPermissions = [];

    /**
     * AbstractController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->securiyService = new SecurityService();
        $listController = new ListController($this);
        $this->modelClass = $listController->getConfig('modelClass');
        $this->requiredPermissions[] = $this->securiyService->getReadPermission($this->modelClass);
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
    /*public function listExtendQuery(\October\Rain\Database\Builder $query)
    {
        $permission = $this->securiyService->getReadPermission($this->modelClass);
        if (!$this->user->hasAccess($permission)) {
            return $this->forwardToAccessDenied();
        }
    }*/

    /**
     * Before creating the model
     */
    public function formBeforeCreate($model)
    {
        $permission = $this->securiyService->getReadPermission($this->modelClass);
        if (!$this->user->hasAccess($permission)) {
            $this->forwardToAccessDenied(true);
        }
    }

    /**
     * Before updating the model
     */
    public function formBeforeUpdate($model)
    {
        $permission = $this->securiyService->getReadPermission($this->modelClass);
        if (!$this->user->hasAccess($permission)) {
            $this->forwardToAccessDenied(true);
        }
    }

    /**
     * Before deleting the model
     */
    public function formBeforeDelete($model)
    {
        $permission = $this->securiyService->getReadPermission($model);
        if (!$this->user->hasAccess($permission)) {
            $this->forwardToAccessDenied(true);
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
}