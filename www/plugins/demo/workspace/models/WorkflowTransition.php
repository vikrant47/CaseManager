<?php namespace Demo\Workspace\Models;

use Backend\Facades\BackendAuth;
use Demo\Core\Services\UserSecurityService;
use Demo\Workspace\Services\WorkflowService;
use Model;
use Backend\Models\User;
use October\Rain\Exception\ValidationException;

/**
 * Model
 */
class WorkflowTransition extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \Demo\Core\Classes\Traits\ModelTrait;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_workspace_workflow_transitions';
    public $incrementing = false;

    /**
     * @var array Validation rules
     */
    public $rules = [
        'from_state_id' => 'required',
        'to_state_id' => 'required',
        'work_id' => 'required',
        /*'created_by_id' => 'required',
        'updated_by_id' => 'required',*/
        'data' => 'array|nullable',
    ];
    public $attachAuditedBy = true;

    public $belongsTo = [
        'created_by' => [User::class, 'key' => 'created_by_id'],
        'updated_by' => [User::class, 'key' => 'updated_by_id'],
        'work' => [Work::class, 'key' => 'work_id'],
        'workflow' => [Workflow::class, 'key' => 'workflow_id'],
        'from_state' => [WorkflowState::class, 'key' => 'from_state_id'],
        'to_state' => [WorkflowState::class, 'key' => 'to_state_id'],
        'configured_queue' => [Queue::class, 'key' => 'configured_queue_id'],
    ];

    public $jsonable = ['data'];

    public $immutables = ['from_state_id', 'to_state_id', 'work_id', 'backward_direction'];
    public $attributes = [];

    /**
     * Check if the to state is a valid transition
     * When a transition is made it should have a valid from and to state values
     */
    public function validateStates()
    {
        $validation = ['valid' => true];
        $work = $this->work;
        $workflow = $work->workflow;
        if ($workflow->active === false) {
            throw new ValidationException([
                'workflow' => 'Unable to make transition for an inactive workflow.'
            ]);
        }
        $currentUser = BackendAuth::getUser();
        if ($work->assigned_to_id !== $currentUser->id) {
            throw new ValidationException([
                'assigned_to_id' => 'Unable to perform the action as you are not assigned.'
            ]);
        }
        if (empty($this->from_state_id)) {
            $this->from_state_id = $this->work->workflow_state_id;
        }
        if ($this->work->workflow_state_id !== $this->from_state_id) {
            throw new ValidationException(['to_state' => 'From State not matched with associated work']);
        }
        $workflowService = new WorkflowService();
        $connections = $workflowService->getConnectedStateConfig($workflow, $this->from_state_id);
        $toStateId = $this->to_state_id;
        $matched = $connections->filter(function ($connection) use ($toStateId) {
            return $connection['state_id'] === $toStateId;
        });
        if ($matched->count() === 0) {
            $validation['valid'] = false;
            $validation['reason'] = 'to_state_not_matched';
            throw new ValidationException(['to_state' => 'To state not matched with workflow definition.']);
        }
        $matched = $matched->get(0);
        if (empty($this->backward_direction)) {
            $this->backward_direction = $matched['backward_direction']; // setting direction value
        }
        if ($matched['backward_direction'] !== $this->backward_direction) {
            $validation['valid'] = false;
            $validation['reason'] = 'direction_not_matched';
            throw new ValidationException(['backward_direction' => 'Invalid direction field']);
        }
        $this->configured_queue_id = $matched['queue_id'];
        return $validation;
    }

    public function beforeValidate()
    {
        if (!$this->exists) {
            $this->validateStates();
        }
    }

    public function beforeCreate()
    {
        $this->workflow_id = $this->work->workflow_id;
    }

    /**
     * After creation set current state in work
     */
    public function afterCreate()
    {
        $this->work->workflow_state_id = $this->to_state_id;
        $this->work->assigned_to_id = null;
        $this->work->save();
    }
}
