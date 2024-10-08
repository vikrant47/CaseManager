<?php namespace Demo\Tenant\Controllers;

use Backend\Behaviors\FormController;
use Backend\Classes\Controller;
use BackendMenu;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Classes\Utils\ReflectionUtil;
use Demo\Core\Controllers\AbstractSecurityController;
use Demo\Core\Models\EngineApplication;
use Demo\Tenant\Services\TenantService;

class TenantController extends AbstractSecurityController
{
    public $implement = ['Backend\Behaviors\ListController', 'Backend\Behaviors\FormController'];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Demo.Tenant', 'main-menu-item', 'side-menu-item');
    }

    public function formBeforeUpdate($model)
    {
        $formWidget = ReflectionUtil::getPropertyValue(FormController::class, 'formWidget', $this->asExtension('FormController'));
        $formData = (object)$formWidget->getSaveData();
        $database = $formData->code;
        $brandSettings = [];
        foreach ($formData as $param => $value) {
            if (strpos($param, 'brand_setting_') !== false) {
                $brandSettings[str_replace('brand_setting_', '', $param)] = $value;
            }
        }
        $tenantService = new TenantService(null);
        $tenantService->connect($database);
        $tenantService->setTheme($formData->default_theme);
        $tenantService->setBrandSettings($brandSettings);
        $tenantService->close();
    }

    public function formBeforeCreate($model)
    {
        $formWidget = ReflectionUtil::getPropertyValue(FormController::class, 'formWidget', $this->asExtension('FormController'));
        $formData = (object)$formWidget->getSaveData();
        $brandSettings = [];
        foreach ($formData as $param => $value) {
            if (strpos($param, '_brand_setting_') !== false) {
                $brandSettings[str_replace('brand_setting_', '', $param)] = $value;
            }
        }
        $tenantService = new TenantService(null);
        try {
            $database = $formData->code;
            $applications = EngineApplication::where('active', true)->where('code', '!=', 'tenant')->get();
            $tenantService->createDatabase($database);
            $tenantService->connect($database);
            $tenantService->runMigration();
            $tenantService->runSeeds($applications);
            $tenantService->setTheme($formData->default_theme);
            $tenantService->setBrandSettings($brandSettings);
            $tenantService->close();
        } catch (\Exception $exception) {
            $tenantService->close();
            if ($exception->getCode() !== '42P04') {
                $tenantService->dropDatabase($formData->code);
            }
            PluginConnection::getLogger('demo.core')->debug('Tenant creation failed , dropping the db ' . json_encode($formData));
            throw $exception;
        }
        return parent::formBeforeCreate($model); // TODO: Change the autogenerated stub
    }
}
