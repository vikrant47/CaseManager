<?php namespace Demo\Workflow\Models;

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
    use \Demo\Core\Classes\Traits\ModelHelper;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_workflow_workflows';

    protected $jsonable = ['definition'];

    public $belongsTo = [
        'created_by' => [User::class, 'key' => 'created_by_id'],
        'updated_by' => [User::class, 'key' => 'updated_by_id'],
        'plugin' => [\Demo\Core\Models\PluginVersions::class, 'key' => 'plugin_id']
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

    public function getNextStateId(WorkflowState $current_state)
    {
        $current_stateId = $current_state;
        if($current_state instanceof WorkflowState){
            $current_stateId = $current_state->id;
        }
        foreach ($this->definition as $entry) {
            if ($entry['from_state'] == $current_stateId) {
                return $entry['to_state'];
            }
        }
        return null;
    }

    public function getCurrentQueueId($current_state)
    {
        $current_stateId = $current_state;
        if($current_state instanceof WorkflowState){
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

    public function getCurrentQueue(WorkflowState $current_state)
    {
        return Queue::find($this->getCurrentQueueId($current_state));
    }

    public function getNextQueue(WorkflowState $current_state)
    {
        return Queue::find($this->getNextQueueId($current_state));
    }
}
