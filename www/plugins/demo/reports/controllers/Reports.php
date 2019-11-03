<?php namespace Demo\Reports\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Reports extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Demo.Reports', 'main-menu-item');
    }
}
