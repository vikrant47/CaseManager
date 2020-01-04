<?php namespace Demo\Workflow\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Demo\Core\Classes\Beans\AbstractSecurityController;
use Demo\Workflow\Models\WorkflowItem;

class WorkflowTransitions extends AbstractSecurityController
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController',        'Backend\Behaviors\ReorderController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Demo.Workflow', 'main-menu-item', 'side-menu-item5');
    }
    public $belongsTo = [
        'created_by' => [User::class, 'key' => 'created_by_id'],
        'updated_by' => [User::class, 'key' => 'updated_by_id'],
        'workflow_item' => [WorkflowItem::class, 'key' => 'workflow_entities_id'],
    ];
}
