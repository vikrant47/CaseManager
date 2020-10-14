<?php


namespace Demo\Workflow\Services;


use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Classes\Utils\ModelUtil;
use Demo\Core\Services\InMemoryQueryFilter;
use Demo\Core\Services\SecuredEntityService;
use Demo\Workflow\Classes\Enums\WorkStatus;
use Demo\Workflow\Models\ServiceChannel;
use Demo\Workflow\Models\Work;
use Demo\Workflow\Models\Workflow;
use Demo\Workflow\Models\WorkflowState;
use Demo\Workflow\Models\WorkflowTransition;
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
        $work->workflow = $workFlow;
        SecuredEntityService::save($work);
    }

    /**
     * A state is connected to multiple difference states in the definition
     * e.g.
     * State A --> State B
     * State B --> State C
     * State B --> State D
     *  In above example State B is connected to State A(Backward), State C , State D
     * @param Workflow $workflow
     * @param string $stateId
     * @return array A connection array that consists mapping of all connection
     */
    public function getConnectedStates($workflow, $stateId)
    {
        $connections = [];
        $definition = $workflow->definition;
        foreach ($definition as $stateConfig) {
            if ($stateConfig['from_state'] === $stateId) {
                $connections[$stateConfig['to_state']] = ['backwardDirection' => false];
            } elseif ($stateConfig['to_state'] === $stateId) {
                $connections[$stateConfig['to_state']] = ['backwardDirection' => true];
            }
        }
        return $connections;
    }

    /**
     * @Depricated - User model api's instead of this
     * This will make a transition from given given state to next state
     * Make a transition from workflow state to new state
     * Steps -
     * Step 1. Check if workflow is active if not then throw exception
     * Step 2. Check if assigned to a user if not then throw exception - Should be check using permission
     * Step 3. Check if assigned to current user if not then throw exception
     * Step 4. Get next state , If not found throw exception
     * Step 5. Get next Queue , If not found throw exception
     * Step 6. Push item to queue
     * Step 7. Create/Persist transition object
     * Step 8. Set assigned user to null in current QueueEntity record because it must be assigned using queue
     * Step 9. Update workflow state in current QueueEntity record
     * Step 10. Update current QueueEntity record
     * @param Work $work
     * @param WorkflowState $toState
     * @param bool $backward_direction
     * @return WorkflowTransition started workflow instance
     */
    public function makeTransition($work, $toState, $backward_direction = false)
    {
        $transition = new WorkflowTransition();
        $transition->work = $this;
        $transition->from_state = $work->current_state;
        $transition->to_state = $backward_direction;
        $transition->backward_direction = $toState;
        SecuredEntityService::save($transition);// saving by applying permissions
        return $transition;
    }
}

