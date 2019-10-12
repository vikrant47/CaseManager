<?php namespace Demo\Casemanager\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use BackendAuth;
use Demo\Casemanager\Models\WorkflowModel;
use October\Rain\Exception\ApplicationException;

class WorkflowEntities extends Controller
{
    public $implement = ['Backend\Behaviors\ListController', 'Backend\Behaviors\FormController', 'Backend\Behaviors\ReorderController'];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Demo.Casemanager', 'main-menu-item', 'side-menu-item4');
    }

    public $belongsTo = [
        'created_by' => [User::class, 'key' => 'created_by_id'],
        'updated_by' => [User::class, 'key' => 'updated_by_id'],
        'assigned_to' => [User::class, 'key' => 'assigned_to_id'],
        'workflow' => [WorkflowModel::class, 'key' => 'workflow_id'],
    ];

    /**
     * Make a transition from current state to new state
     */
    public function makeTransition($model)
    {
        if ($this->workflow->active === 0) {
            throw new ApplicationException('Unable to execute an inactive workflow.');
        }
        $user = BackendAuth::getUser();
        if ($this->assigned_to_id !== $user->id) {
            throw new ApplicationException('Unable to execute workflow. You are not assigned');
        }
        $next_state = $this->workflow->getNextState($this->current_state);
        if ($next_state === null) {
            throw new ApplicationException('Invalid workflow definition ' . $this->workflow->name . '. Next state not found for ' . $this->current_state);
        }
        $transition = new WorkflowTransitions();
        $transition->workflow_entity = $this;
        $transition->from_state = $this->current_state;
        $transition->to_state = $next_state;
        $transition->save();
        $this->current_state = $next_state;
        $this->save();
    }
}
