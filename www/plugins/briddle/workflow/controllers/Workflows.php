<?php namespace Briddle\Workflow\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Workflows extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'workflow' 
    ];
    
    protected $jsonable = ['rules'];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Briddle.Workflow', 'workflow', 'workflows');
        
        $this->bodyClass = 'compact-container';/* added manually */
    }
}
