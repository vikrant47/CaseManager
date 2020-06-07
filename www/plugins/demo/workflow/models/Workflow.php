<?php namespace Demo\Workflow\Models;

use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Models\ModelModel;
use Demo\Core\Models\PluginVersions;
use Demo\Core\Services\EventHandlerServiceProvider;
use Leafo\ScssPhp\Node\Number;
use Model;
use October\Rain\Exception\ApplicationException;
use Backend\Models\User;

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
        'plugin' => [\Demo\Core\Models\PluginVersions::class, 'key' => 'plugin_id'],
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

    /**
     * This will start workflow for given model
     * Steps -
     * Create entry in Workflow Items with given model and starting state of workflow.
     */
    public function start($model)
    {
        $workflowItem = new WorkflowItem();
        $workflowItem->workflow = $this;
        $workflowItem->record_id = $model->id;
        $workflowItem->model = get_class($model);
        $from_state = new WorkflowState();
        $from_state->id = $this->definition[0]['from_state'];
        $workflowItem->current_state = $from_state;
        $workflowItem->plugin_id = PluginConnection::getCurrentPlugin()->id;
        $workflowItem->save();
    }

    public function getPreviousStateId(WorkflowState $current_state)
    {
        $current_stateId = $current_state->id;
        foreach ($this->definition as $entry) {
            if ($entry['to_state'] == $current_stateId) {
                return $entry['form_state'];
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
