<?php namespace Demo\Workflow\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Demo\Core\Controllers\Abs;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Services\EventHandlerServiceProvider;
use Demo\Core\Controllers\AbstractSecurityController;

class WorkflowController extends AbstractSecurityController
{
    public $implement = ['Backend\Behaviors\ListController', 'Backend\Behaviors\FormController', 'Backend\Behaviors\ReorderController'];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';
    public $requiredPermissions = ['workflow.table.read'];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Demo.Workflow', 'main-menu-item', 'side-menu-item2');
    }

}
