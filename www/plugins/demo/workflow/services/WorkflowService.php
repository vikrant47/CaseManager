<?php


namespace Demo\Workflow\Services;


use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Classes\Utils\ModelUtil;
use Demo\Core\Services\InMemoryQueryFilter;
use Demo\Workflow\Classes\Enums\WorkStatus;
use Demo\Workflow\Models\ServiceChannel;
use Demo\Workflow\Models\Work;
use Demo\Workflow\Models\Workflow;
use Demo\Workflow\Models\WorkflowState;
use Illuminate\Support\Collection;
use Monolog\Logger;
use October\Rain\Exception\ValidationException;

class WorkflowService
{
    /**@var $logger Logger */
    protected $logegr;

    public function __construct()
    {
        $this->logger = PluginConnection::getCurrentLogger();
    }

    /**
     * This will search for a workflow for given model
     * @return Workflow matched channel
     */
    public function searchWorkflow($channel)
    {
        $matchedWorkflow = null;
        $model = $channel->model;
        $modelClass = get_class($model);
        /**@var $workflows Collection<ServiceChannel> */
        $workflows = Workflow::where('active', 1)->where('service_channel_id', '=', $channel->id)
            ->orderBy('sort_order', 'ASC')->get();
        $this->logger->info('Evaluating workflow to accept channel' . ModelUtil::toString($channel) . '. total = ' . $workflows->count());
        return InMemoryQueryFilter::findMatchingEntity(collect([$model]), $workflows);
    }

    /**
     * This will start a workflow for given work
     * @param Workflow $workFlow
     * @param Work $work
     * @return void strtaed workflow instance
     */
    public function startWorkflow($workFlow, $work)
    {
        $work->current_state_id = WorkflowState::START;
        $work->workflow_id = $workFlow;
        $work->status = WorkStatus::START;
        $work->save();
    }

    /**
     * This will make a transition from given given state to next state
     * Make a transition from workflow state to new state
     * Steps -
     * Step 1. Check if workflow is active if not then throw exception
     * Step 2. Check if assigned to a user if not then throw exception
     * Step 3. Check if assigned to current user if not then throw exception
     * Step 4. Get next state , If not found throw exception
     * Step 5. Get next Queue , If not found throw exception
     * Step 6. Push item to queue
     * Step 7. Create/Persist transition object
     * Step 8. Set assigned user to null in current QueueEntity record because it must be assigned using queue
     * Step 9. Update workflow state in current QueueEntity record
     * Step 10. Update current QueueEntity record
     * @param null $next_state
     * @param Work $work
     * @param null|WorkflowState $fromState
     * @param null|WorkflowState $toState
     * @return void strtaed workflow instance
     * @throws ValidationException
     */
    public function makeTransition($work, $fromState = null, $toState = null)
    {
        $workflow = $work->workflow;
        if ($workflow->active === false) {
            throw new ValidationException([
                'workflow' => 'Unable to execute an inactive workflow.'
            ]);
        }
        $currentUser = BackendAuth::getUser();
        if (empty($work->assigned_to)) {
            throw new ValidationException([
                'workflow' => 'Unable to process as this item has not been assigned to anybody'
            ]);
        }
        /*if ($work->assigned_to->id !== $currentUser->id) {
            throw new ValidationException([
                'workflow' => 'Unable to execute workflow. You are not assigned'
            ]);
        }*/
        if (empty($next_state)) {
            throw new ValidationException([
                'workflow' => 'Invalid workflow definition ' . $work->workflow->name . '. Next state not found for ' . $work->current_state
            ]);
        }
        if ($workflow->containsState($next_state) === false) {
            throw new ValidationException([
                'workflow' => 'TransitionError : Given state ' . $next_state->name . ' doesn\'t belong to ' . $work->workflow->name . ' workflow'
            ]);
        }
        /*$next_queue = $work->workflow->getCurrentQueue($work->current_state);
        if ($next_queue === null) {
            throw new ApplicationException('Invalid workflow definition ' . $work->workflow->name . '. Next queue not found for ' . $work->current_state);
        }
        $next_queue->pushItem($model);
        $transition = new WorkflowTransition();
        $transition->work = $this;
        $transition->from_state = $work->current_state;
        $transition->to_state = $next_state;
        $transition->save();
        */
        $work->current_state = $next_state;
        $work->assigned_to = null;

    }
}
