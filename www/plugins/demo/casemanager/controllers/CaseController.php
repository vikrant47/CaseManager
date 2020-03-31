<?php namespace Demo\Casemanager\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Demo\Core\Classes\Beans\AbstractSecurityController;
use Demo\Workflow\Classes\Traits\WorkflowControllerTrait;
use Demo\Casemanager\Models\CaseModel;
use Demo\Workflow\Models\WorkflowItem;
use Model;
use October\Rain\Exception\ApplicationException;
use October\Rain\Support\Facades\Flash;

class CaseController extends AbstractSecurityController
{
    use WorkflowControllerTrait;
    public $implement = ['Backend\Behaviors\ListController', 'Backend\Behaviors\FormController', 'Backend\Behaviors\ReorderController'];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';
    public $requiredPermissions = ['case.table.read'];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Demo.Casemanager', 'main-menu-item', 'side-menu-item');
    }

    public function listExtendQuery($query)
    {
        parent::listExtendQuery($query);
        /*if (!$this->user->hasAccess('case.table.view.all')) {
            $workflowEntities = WorkflowItem::where(['item_type' => CaseModel::class, 'assigned_to_id' => $this->user->id])->select('item_id')->get();
            $query->whereIn('id', $workflowEntities->map(function ($entity) {
                return $entity->item_id;
            }));
        }*/
    }

    public function onPushCase($id)
    {
        $model = $this->formFindModelObject($id);
        if ($model->assigned_to_id === $this->user->id) {
            $this->onSubmitWorkflowItem($model);
        }
        Flash::error('Unable to push case as it\'s not assigned to you !');
    }
}
