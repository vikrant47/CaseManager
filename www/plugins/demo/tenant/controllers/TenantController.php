<?php namespace Demo\Tenant\Controllers;

use Backend\Behaviors\FormController;
use Backend\Classes\Controller;
use BackendMenu;
use Demo\Core\Classes\Utils\ReflectionUtil;
use Demo\Core\Controllers\AbstractSecurityController;
use Demo\Tenant\Services\TenantService;

class TenantController extends AbstractSecurityController
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Demo.Tenant', 'main-menu-item', 'side-menu-item');
    }

    public function formBeforeCreate($model)
    {
        $formWidget = ReflectionUtil::getPropertyValue(FormController::class,'formWidget',$this->asExtension('FormController')) ;
        $saveData = (object)$formWidget->getSaveData();
        $tenantService = new TenantService(null);
        $tenantService->createTenantDatabase($saveData);
        $tenantService->runMigration($saveData);
        $tenantService->runSeeds($saveData);
        return parent::formBeforeCreate($model); // TODO: Change the autogenerated stub
    }
}
