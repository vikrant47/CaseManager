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
        $modelClass = $channel->model;
        /**@var $workflows Collection<ServiceChannel> */
        $workflows = Workflow::where('active', 1)->where('service_channel_id', '=', $channel->id)
            ->orderBy('sort_order', 'ASC')->get();
        $this->logger->info('Evaluating workflow to accept channel' . ModelUtil::toString($channel) . '. total = ' . $workflows->count());
        return InMemoryQueryFilter::findMatchingEntity(collect([$channel->model_ref]), $workflows);
    }

    /**
     * This will start a workflow for given work
     * @param Workflow $workFlow
     * @param Work $work
     * @return void strtaed workflow instance
     */
    public function startWorkflow($workFlow, $work)
    {
        $work->workflow_state_id = WorkflowState::START;
        $work->workflow = $workFlow;
        $work->save();
        if ($workFlow->auto_publish) {
            $this->makeTransition($work, $this->getNextStateConfig($workFlow, WorkflowState::START));
        }
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
     * @return Collection A connection array that consists mapping of all connection with queues
     */
    public function getConnectedStateConfig($workflow, string $stateId)
    {
        $connections = collect([]);
        $definition = $workflow->definition;
        foreach ($definition as $stateConfig) {
            if ($stateConfig['from_state'] === $stateId) {
                $connections->push([
                    'backwardDirection' => false,
                    'stateId' => $stateConfig['to_state'],
                    'queueId' => $stateConfig['queue']
                ]);
            } elseif ($stateConfig['to_state'] === $stateId) {
                $connections->push([
                    'backwardDirection' => true,
                    'stateId' => $stateConfig['from_state'],
                    'queueId' => $stateConfig['queue']
                ]);
            }
        }
        return $connections;
    }

    /**
     * This will return the next state with forward direction
     * @return null|array
     */
    public function getNextStateConfig($workflow, string $stateId)
    {
        $connections = $this->getConnectedStateConfig($workflow, $stateId);
        return $connections->first(function ($connection) {
            return $connection['backwardDirection'] === false;
        });
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
     * @param string $toStateId
     * @param bool $backward_direction
     * @return WorkflowTransition started workflow instance
     */
    public function makeTransition($work, $toStateId, $backward_direction = false)
    {
        $transition = new WorkflowTransition();
        $transition->work = $this;
        $transition->from_state = $work->workflow_state;
        $transition->to_state = $toStateId;
        $transition->backward_direction = $backward_direction;
        SecuredEntityService::save($transition);// saving by applying permissions
        return $transition;
    }
}

