<?php namespace Briddle\Workflow\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Triggers extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'workflow' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Briddle.Workflow', 'workflow', 'triggers');/* added manually */
        
        $this->bodyClass = 'compact-container';/* added manually */
    }
}
