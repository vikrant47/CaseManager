<?php namespace Demo\Workflow\Models;

use Demo\Workflow\Controllers\WorkflowTransitions;
use Illuminate\Support\Collection;
use Model;
use Backend\Models\User;
use BackendAuth;
use October\Rain\Exception\ApplicationException;

/**
 * Model
 * An entity can only be part of 1 workflow. A unique index has been added on record_id,entity_name combination
 */
class WorkflowItem extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \Demo\Core\Classes\Traits\ModelTrait;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_workflow_workflow_items';

    public $belongsTo = [
        'created_by' => [User::class, 'key' => 'created_by_id'],
        'updated_by' => [User::class, 'key' => 'updated_by_id'],
        'assigned_to' => [User::class, 'key' => 'assigned_to_id'],
        'workflow' => [Workflow::class, 'key' => 'workflow_id'],
        'current_state' => [WorkflowState::class, 'key' => 'current_state_id'],
        'plugin' => [\Demo\Core\Models\PluginVersions::class, 'key' => 'plugin_id']
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    public $attachAuditedBy = true;

    public function makeForwardTransition($data = [])
    {
        $next_state = $this->workflow->getNextState($this->current_state);
        return $this->makeTransition($next_state, $data);
    }

    public function makeBackwardTransition($data = [])
    {
        $previous_state = $this->workflow->getPreviousState($this->current_state);
        if (empty($previous_state)) {
            throw new ApplicationException('No previous state found for revert');
        }
        return $this->makeTransition($previous_state, $data, true);
    }

    /**
     * Make a transition from current state to new state
     * Steps -
     * Step 1. Check if workflow is active if not then throw exception
     * Step 2. Check if assigned to a user if not then throw exception
     * Step 3. Check if assigned to current user if not then throw exception
     * Step 4. Get next state , If not found throw exception
     * Step 5. Get next Queue , If not found throw exception
     * Step 6. Push item to queue
     * Step 7. Create/Persist transition object
     * Step 8. Set assigned user to null in current QueueEntity record because it must be assigned using queue
     * Step 9. Update current state in current QueueEntity record
     * Step 10. Update current QueueEntity record
     * @param null $next_state
     * @param bool $backwardDirection
     * @param array $data
     * @throws ApplicationException
     */
    public function makeTransition($next_state, $data = [], $backwardDirection = false)
    {
        if ($this->workflow->active === 0) {
            throw new ApplicationException('Unable to execute an inactive workflow.');
        }
        $currentUser = BackendAuth::getUser();
        if (!isset($this->assigned_to)) {
            throw new ApplicationException('Unable to process as this item has not been assigned to anybody');
        }
        if ($this->assigned_to->id !== $currentUser->id) {
            throw new ApplicationException('Unable to execute workflow. You are not assigned');
        }
        if (empty($next_state)) {
            throw new ApplicationException('Invalid workflow definition ' . $this->workflow->name . '. Next state not found for ' . $this->current_state);
        }
        if ($this->workflow->containsState($next_state) === false) {
            throw new ApplicationException('TransitionError : Given state ' . $next_state->name . ' doesn\'t belong to ' . $this->workflow->name . ' workflow');
        }
        /*$next_queue = $this->workflow->getCurrentQueue($this->current_state);
        if ($next_queue === null) {
            throw new ApplicationException('Invalid workflow definition ' . $this->workflow->name . '. Next queue not found for ' . $this->current_state);
        }
        $next_queue->pushItem($model);
        $transition = new WorkflowTransition();
        $transition->workflow_item = $this;
        $transition->from_state = $this->current_state;
        $transition->to_state = $next_state;
        $transition->save();
        */
        $this->current_state = $next_state;
        $this->assigned_to = null;
        request()->attributes->add([
            'WORKFLOW_ITEM_DATA_' . $this->id => $data,
            'backwardDirection' => $backwardDirection,
        ]);
        $this->update();
    }

    public function forceUpdate()
    {
        WorkflowItem::where('id', $this->id)->update($this->toArray());
    }

    public function scopeFindByEntity($query, $entityType, $id)
    {
        return $query->where('model', $entityType)->where('id', $id);
    }
}
