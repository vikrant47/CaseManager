<?php namespace Demo\Workflow\Models;

use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Models\ModelModel;
use Demo\Core\Models\EngineApplication;
use Demo\Core\Services\EventHandlerServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Leafo\ScssPhp\Node\Number;
use Model;
use October\Rain\Exception\ApplicationException;
use Backend\Models\User;
use Schema;

/**
 * Model
 */
class Workflow extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \Demo\Core\Classes\Traits\ModelTrait;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_workflow_workflows';
    public $incrementing = false;

    protected $jsonable = ['definition'];

    public $belongsTo = [
        'created_by' => [User::class, 'key' => 'created_by_id'],
        'updated_by' => [User::class, 'key' => 'updated_by_id'],
        'application' => [EngineApplication::class, 'nameFrom' => 'name', 'key' => 'engine_application_id'],
        'model_ref' => [ModelModel::class, 'key' => 'model', 'otherKey' => 'model'],
    ];

    public $hasOne = [
        'queue' => Queue::class,
        'from_state' => WorkflowState::class,
        'to_state' => WorkflowState::class,
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => 'required',
        'model' => 'required',
        'application' => 'required',
        'priority' => 'numeric|min:1',
        'definition' => 'required|array|min:2',
        'sort_order' => 'required',
    ];
    public $attachAuditedBy = true;

    public function getEventOptions()
    {
        return EventHandlerServiceProvider::$MODEL_EVENTS_OPTIONS;
    }

    public function getItemTypeOptions()
    {
        return PluginConnection::getAllModelAlias();
    }

    public function getModelStateFieldOptions()
    {
        $options = [];
        if (!empty($this->model)) {
            $modelRef = new $this->model();
            $columns = Schema::getColumnListing($modelRef->table);
            foreach ($columns as $column) {
                $options[$column] = $column;
            }
        }
        return $options;
    }

    public function validateDefinition()
    {
        $validator = Validator::make([
            'definition' => $this->definition,
        ], [
            'definition.*.from_state' => 'required',
            'definition.*.to_state' => 'required',
            'definition.*.timeout' => 'numeric|min:-1|not_in:0',
            'definition' => [
                function ($attribute, $value, $fail) {
                    if ($value[0]['from_state'] !== '09dfd34e-0db5-49f3-96b2-23831d811a0b') {
                        return $fail('Invalid Definition! Workflow definition must start with Start State');
                    }
                    if ($value[count($value) - 1]['to_state'] !== '8c7e9158-b65c-437a-a5d9-4b975f7b6f51') {
                        return $fail('Invalid Definition! Workflow definition must end with End State');
                    }
                    foreach ($value as $entry) {
                        if ($entry['to_state'] !== '8c7e9158-b65c-437a-a5d9-4b975f7b6f51' && !array_key_exists('queue', $entry)) {
                            return $fail('Invalid Definition! Queue is require except the last state');
                        }
                    }
                },
            ],
        ], [
            'definition.*.from_state' => 'Invalid Definition! From state field is required',
            'definition.*.to_state' => 'Invalid Definition! To state field is required',
            'definition.*.queue' => 'Invalid Definition! Queue field is required',
            'definition.*.timeout.min' => 'Invalid Definition! Timeout value can not be less than -1',
            'definition.*.timeout.not_in' => 'Invalid Definition! Timeout value can not be 0 (Zero)',
        ]);
        if ($validator->fails()) {
            throw new \October\Rain\Exception\ValidationException($validator);
        }
    }

    public function beforeSave()
    {
        $this->validateDefinition();
    }

    /**
     * This will start workflow for given model
     * Steps -
     * Create entry in Works with given model and starting state of workflow.
     */
    public function start($model)
    {
        $work = new work();
        $work->workflow = $this;
        $work->record_id = $model->id;
        $work->model = get_class($model);
        $from_state = new WorkflowState();
        $from_state->id = $this->definition[0]['from_state'];
        $work->current_state = $from_state;
        $work->engine_application_id = EngineApplication::getCurrentApplication()->id;
        $work->save();
    }

    public function getPreviousStateId(WorkflowState $current_state)
    {
        $current_stateId = $current_state->id;
        foreach ($this->definition as $entry) {
            if ($entry['to_state'] == $current_stateId) {
                return $entry['from_state'];
            }
        }
        return null;
    }

    public function getNextStateId(WorkflowState $current_state)
    {
        $current_stateId = $current_state->id;
        foreach ($this->definition as $entry) {
            if ($entry['from_state'] == $current_stateId) {
                return $entry['to_state'];
            }
        }
        return null;
    }

    /**
     * Check if workflow model have the given state
     * @param $state WorkflowState - WorkflowState object
     * @return boolean - true if state exists in workflow otherwise false
     */
    public function containsState(WorkflowState $state)
    {

        $stateId = $state->id;
        foreach ($this->definition as $entry) {
            if ($entry['from_state'] == $stateId || $entry['to_state'] == $stateId) {
                return true;
            }
        }
        return false;
    }

    public function getCurrentQueueId($current_state)
    {
        $current_stateId = $current_state;
        if ($current_state instanceof WorkflowState) {
            $current_stateId = $current_state->id;
        }
        foreach ($this->definition as $entry) {
            if ($entry['from_state'] == $current_stateId) {
                return $entry['queue'];
            }
        }
        return null;
    }

    public function getNextQueueId(WorkflowState $current_state)
    {
        return $this->getCurrentQueueId($this->getNextStateId($current_state));
    }

    public function getNextState(WorkflowState $current_state)
    {
        return WorkflowState::find($this->getNextStateId($current_state));
    }

    public function getPreviousState(WorkflowState $current_state)
    {
        return WorkflowState::find($this->getPreviousStateId($current_state));
    }

    public function getCurrentQueue(WorkflowState $current_state)
    {
        return Queue::find($this->getCurrentQueueId($current_state));
    }

    public function getNextQueue(WorkflowState $current_state)
    {
        return Queue::find($this->getNextQueueId($current_state));
    }
}
