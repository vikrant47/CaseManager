<?php namespace Demo\Casemanager\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Demo\Core\Classes\Beans\AbstractSecurityController;

class CasePriority extends AbstractSecurityController
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Demo.Casemanager', 'main-menu-item', 'side-menu-item6');
    }
}
