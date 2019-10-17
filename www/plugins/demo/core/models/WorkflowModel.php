<?php namespace Demo\Core\Models;

use Leafo\ScssPhp\Node\Number;
use Model;
use October\Rain\Exception\ApplicationException;
use Backend\Models\User;
/**
 * Model
 */
class WorkflowModel extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \Demo\Core\Classes\Traits\ModelHelper;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_core_workflows';

    protected $jsonable = ['definition'];

    public $belongsTo = [
        'created_by' => [User::class, 'key' => 'created_by_id'],
        'updated_by' => [User::class, 'key' => 'updated_by_id'],
    ];

    public $hasOne = [
        'queue' => QueueModel::class,
        'from_state' => WorkflowStateModel::class,
        'to_state' => WorkflowStateModel::class,
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    public $attachAuditedBy = true;

    public function getNextStateId(WorkflowStateModel $current_state)
    {
        $current_stateId = $current_state;
        if($current_state instanceof WorkflowStateModel){
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
        if($current_state instanceof WorkflowStateModel){
            $current_stateId = $current_state->id;
        }
        foreach ($this->definition as $entry) {
            if ($entry['from_state'] == $current_stateId) {
                return $entry['queue'];
            }
        }
        return null;
    }

    public function getNextQueueId(WorkflowStateModel $current_state)
    {
        return $this->getCurrentQueueId($this->getNextStateId($current_state));
    }

    public function getNextState(WorkflowStateModel $current_state)
    {
        return WorkflowStateModel::find($this->getNextStateId($current_state));
    }

    public function getCurrentQueue(WorkflowStateModel $current_state)
    {
        return QueueModel::find($this->getCurrentQueueId($current_state));
    }

    public function getNextQueue(WorkflowStateModel $current_state)
    {
        return QueueModel::find($this->getNextQueueId($current_state));
    }
}
