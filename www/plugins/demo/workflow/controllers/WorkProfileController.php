<?php namespace Demo\Workflow\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Demo\Core\Controllers\AbstractSecurityController;

class WorkProfileController extends AbstractSecurityController
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Demo.Workflow', 'main-menu-item', 'side-menu-item10');
    }
}
