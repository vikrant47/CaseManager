<?php namespace Demo\Core\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Models\AuditLog;
use Demo\Core\Models\CustomField;
use Demo\Core\Models\FormAction;
use Demo\Core\Models\ModelModel;
use Demo\Report\Models\Widget;
use October\Rain\Exception\ApplicationException;

class AuditLogController extends AbstractPluginController
{
    public $implement = ['Backend\Behaviors\ListController', 'Backend\Behaviors\FormController', 'Backend\Behaviors\ReorderController'];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Demo.Core', 'main-menu-item', 'side-menu-item13');
    }

    public function auditListView($id)
    {
        $audit = AuditLog::where('id', $id)->first();
        if (empty($audit)) {
            // return 404
        }
        $model = $audit->model;
        $modelRecord = ModelModel::where('model', $model)->first();
        $controller = new $modelRecord->controller();
        return $controller->index();
    }

    public function auditFormView($id)
    {
        $audit = AuditLog::where('id', $id)->first();
        if (empty($audit)) {
            // return 404
        }
        $model = $audit->model;
        $modelInstance = new $audit->model;
        $modelInstance->attributes = $audit->previous;
        $modelRecord = ModelModel::where('model', $model)->first();
        $controller = new $modelRecord->controller();
        $controller->initForm($modelInstance, 'preview');
        return $controller->formRender(['preview' => true]);
    }

    public function listFilterExtendScopes($filter)
    {
        $request = request();
        $recordId = $request->get('record_id');
        if (!empty($recordId)) {
            $filter->setScopeValue($filter->getScope('record_id'), $recordId);
        }
    }
}
