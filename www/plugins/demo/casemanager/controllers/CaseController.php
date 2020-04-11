<?php namespace Demo\Casemanager\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Demo\Core\Controllers\AbstractSecurityController;
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

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Demo.Casemanager', 'main-menu-item', 'side-menu-item');
    }

    public function onPushCase($id)
    {
        $model = $this->formFindModelObject($id);
        if ($model->assigned_to_id === $this->user->id) {
            $workflowItem = WorkflowItem::where(['model' => get_class($model), 'record_id' => $id])->first();
            if (empty($workflowItem)) {
                throw new ApplicationException('No active workflow item found for case ', $id);
            }
            $workflowItem->makeTransition();
            Flash::success('Case pushed successfully');
        } else {
            Flash::error('Unable to push case as it\'s not assigned to you !');
        }
    }

}
