<?php namespace Demo\Casemanager\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Demo\Casemanager\Classes\Traits\WorkflowControllerTrait;
use Model;
use October\Rain\Exception\ApplicationException;

class CaseController extends Controller
{
    use WorkflowControllerTrait;
    public $implement = ['Backend\Behaviors\ListController', 'Backend\Behaviors\FormController', 'Backend\Behaviors\ReorderController'];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';
    public $requiredPermissions = ['case.table.read'];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Demo.Casemanager', 'main-menu-item2');
    }

    public function formBeforeCreate(Model $model)
    {
        if (!$this->user->hasAccess('case.table.create')) {
            throw new ApplicationException('Access denied.');
        }
    }

    public function formBeforeUpdate(Model $model)
    {
        if (!$this->user->hasAccess('case.table.update')) {
            throw new ApplicationException('Access denied.');
        }
    }

    public function formBeforeDelete(Model $model)
    {
        if (!$this->user->hasAccess('case.table.delete')) {
            throw new ApplicationException('Access denied.');
        }
    }
}
