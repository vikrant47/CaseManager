<?php namespace Demo\Workflow\Models;

use Backend\Models\UserGroup;
use Demo\Core\Classes\Beans\ScriptContext;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Classes\Utils\ModelUtil;
use Demo\Core\Models\EngineApplication;
use Demo\Core\Services\EventHandlerServiceProvider;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Model;
use Event;
use Backend\Models\User;
use October\Rain\Auth\Models\Group;
use October\Rain\Exception\ApplicationException;
use Backend\Facades\BackendAuth;

/**
 * Model
 */
class Queue extends Model
{
    use \October\Rain\Database\Traits\Validation;

    const ADD_NEW_POLICY = 'addNew';
    const OVERRIDE_POLICY = 'override';
    const REJECT_POLICY = 'reject';

    /**@var $logger \Monolog\Logger */
    private $logger;
    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_workflow_queues';
    public $incrementing = false;

    public $belongsTo = [
        'application' => [\Demo\Core\Models\EngineApplication::class, 'key' => 'engine_application_id'],
        'service_channel' => [\Demo\Workflow\Models\ServiceChannel::class, 'key' => 'service_channel_id'],
        'pop_criteria' => [\Demo\Workflow\Models\QueuePopCriteria::class, 'key' => 'pop_criteria_id'],
        'routing_rule' => [\Demo\Workflow\Models\QueueRoutingRule::class, 'key' => 'routing_rule_id'],
    ];

    public $belongsToMany = [
        'assignment_groups' => [
            UserGroup::class,
            'table' => 'demo_workflow_queue_assignment_groups',
            'key' => 'queue_id',
            'otherKey' => 'group_id'
        ]
    ];

    public $jsonable = ['event'];

    public $attachAuditedBy = true;
    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => 'required',
    ];

    /**
     * Queue constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->logger = PluginConnection::getCurrentLogger();
    }

    public function getItemTypeOptions()
    {
        return PluginConnection::getAllModelAlias(true);
    }

    public function getEventOptions()
    {
        return EventHandlerServiceProvider::$MODEL_EVENTS_OPTIONS;
    }

    public function beforeSave()
    {
        ModelUtil::fillDefaultColumnsInBelongsToMany(
            $this->assignment_groups(),
            $this->assignment_groups,
            $this->engine_application_id,
            ['sort_order' => 100]
        );
    }

    /***Scope query definition start
     * @param $user
     * @return Collection<Queue>
     */

    public static function getQueuesForUser($user)
    {
        $queues = DB::table('demo_workflow_queues')->select(['demo_workflow_queues.id', 'demo_workflow_queues.name'])
            ->join('demo_workflow_queue_assignment_groups', 'demo_workflow_queue_assignment_groups.queue_id', '=', 'demo_workflow_queues.id')
            ->join('backend_user_groups', 'backend_user_groups.id', '=', 'demo_workflow_queue_assignment_groups.group_id')
            ->join('backend_users_groups', 'backend_users_groups.user_group_id', '=', 'backend_user_groups.id')
            ->join('backend_users', 'backend_users.id', '=', 'backend_users_groups.user_id')
            ->where('backend_users_groups.user_id', '=', $user->id)
            ->where('demo_workflow_queues.active', '=', true)
            ->orderBy('demo_workflow_queues.name', 'ASC')->get();
        $items = DB::table('demo_workflow_tasks')->select('queue_id', DB::raw('count(*) as total'))
            ->whereIn('queue_id', $queues->map(function ($queue) {
                return $queue->id;
            }))
            ->groupBy('queue_id')
            ->get();
        foreach ($queues as $queue) {
            $queue->total = 0;
            foreach ($items as $item) {
                if ($queue->id === $item->queue_id) {
                    $queue->total = $item->total;
                    break;
                }
            }
        }
        return $queues;
    }

    /**
     * Return list of queues valid for current user
     * @return Collection<Queue>
     */
    public static function getQueuesForCurrentUser()
    {
        $currentUser = BackendAuth::getUser();
        $queues = Queue::getQueuesForUser($currentUser);
        return $queues;
    }

    /**
     * Push an item to queue
     * If queue is virtual then process item othewise push item to database
     */
    public function pushItem($model)
    {
        $modelClass = get_class($model);
        $this->logger->info('Pushing item to queue [' . $this->name . ']' . ModelUtil::toString($model));
        if ($this->service_channel->model === $modelClass) {
            $task = Task::where(['record_id' => $model->id, 'model' => $modelClass, 'poped_at' => null])->first();
            $insert = true;
            if (!empty($task)) {
                $this->logger->info('Item already exists applying redendancy policy');
                if ($this->redundancy_policy === Queue::OVERRIDE_POLICY) {
                    $task->updated_at = new \DateTime();
                    $insert = false;
                } elseif ($this->redundancy_policy === Queue::ADD_NEW_POLICY) {
                    $insert = true;
                } elseif ($this->redundancy_policy === Queue::REJECT_POLICY) {
                    $this->logger->info('Rejecting item as redendancy policy is reject');
                    throw new ApplicationException('Same item already exits in queue');
                }
            }
            if ($insert === true) {
                $task = new Task();
                $task->queue = $this;
                $task->record_id = $model->id;
                $task->model = $modelClass;
                $task->engine_application_id = $model->engine_application_id;
                $task->save();
            }
            if ($this->virtual == 1) {
                $this->logger->info('Queue is virtual do assigning item');
                $this->popItem($task);
                $this->assignItem($task, $model); // if its a virtual queue than immediately call assign item
            }
        } else {
            throw new ApplicationException('Unsupported element type .Unable to push element in queue');
        }
    }

    /**
     * Processing poped item by assignment rule
     * Item can be any model in queue
     */
    public function assignItem($task, $model)
    {
        $this->logger->info('Assigning the item ' . ModelUtil::toString($model) . ' using assignment rule ' . ModelUtil::toString($this->routing_rule, 'name'));
        // creating context
        $context = new ScriptContext();
        $user = $context->execute($this->routing_rule->script, ['queue' => $this, 'model' => $model, 'task' => $task]);
        if (empty($user)) {
            throw new ApplicationException('Routing Rule "' . $this->routing_rule->name . '" din\'t return any user');
        }
        $this->logger->info('Assigning to user ' . $user->username);
        if ($this->isUserInAssignmentGroups($user) === false) {
            throw new ApplicationException('Unable to assign to given user as its not in assignment groups');
        }
        if (!empty($task)) {
            $task->assigned_to_id = $user->id;
            $task->save();
        }
        $model->assigned_to_id = $user->id;
        if ($model->exists) {
            $model->update();
        }
    }

    /**
     * Removes an element from queue and return it
     * Steps -
     * Step 1. If queue is virtual than return
     * Step 2. Find the element based on given criteria
     * Step 3. Acquire lock on element for delete
     * Step 4. Check if element exists or already deleted by another pop action
     * Step 5. If element not exists than call pop method again and return
     * Step 6. Delete that element from queue
     * Step 7. Return that element
     * @param Task $item if not given then pooped form queue based on criteria otherwise used the given item
     * @return |null
     * @throws ApplicationException
     */
    public function popItem($item = null)
    {
        if (!empty($item) && !empty($item->poped_at)) {
            throw new ApplicationException('Item already popped ,cannot pop again' . $item->id);
        } else {
            $this->logger->debug('Pooping an item for assignment using ' . ModelUtil::toString($this->pop_criteria, 'name'));
            $context = new ScriptContext();
            $query = DB::table('demo_workflow_tasks')->select('demo_workflow_tasks.*');
            $qyery = $context->execute($this->pop_criteria->script, ['queue' => $this, 'query' => $query]);
            if (!($qyery instanceof \October\Rain\Database\QueryBuilder)) {
                throw new ApplicationException('Pop criteria should return a QueryBuilder instance');
            }
            $item = $qyery->where('queue_id', $this->id)->first();
        }
        if (
            empty($item)
            || empty($item->id)
            || $item->queue_id !== $this->id
        ) {
            $this->logger->debug('No item found for assignement');
            return null;
        } else {
            $task = DB::table('demo_workflow_tasks')->where('id', '=', $item->id)->lockForUpdate()->first();
            if (!empty($task) && !empty($task->model) && !empty($task->record_id)) {
                DB::table('demo_workflow_tasks')->where('id', '=', $item->id)->update(['poped_at' => new \DateTime()]);
                return $item->model::find($item->record_id);
            } else {
                return $this->popItem();
            }
        }
        return null;
    }

    /**
     * Assign a queue item automatically
     * Steps -
     * Step 1. Check if user exists in queue's assignment group
     * Step 2. Pop an item from queue
     * Step 3. Search an workflow entity for this item
     * Step 4. Set assignedTo to given user in workflow entity.
     */
    public function popAndAssign()
    {
        $task = $this->popItem();
        if (empty($task)) {
            throw new ApplicationException('No item left to assign');
        }
        return $this->assignItem($task, $task->getModel());
    }

    /**
     * Check if user present in assignment groups
     */
    public function isUserInAssignmentGroups(User $user)
    {
        return Db::table('backend_users_groups')
                ->where('user_id', $user->id)
                ->whereIn('user_group_id', $this->assignment_groups->map(function ($group) {
                    return $group->id;
                }))->count() > 0;
    }
    /*public static function listenEntityEvents($eventName, $model)
    {
        $ignoreModels = [Task::class];
        $includedPackage = ['Workflow'];
        if (!in_array(get_class($model), $ignoreModels) && in_array(explode('\\', get_class($model))[1], $includedPackage)) {
            // @var $queues Collection<Queue>
            $queues = Queue::where('active', 1)->where(function ($query) use ($model) {
                $query->where('model', '=', 'any')
                    ->orWhere('model', '=', get_class($model));
            })->orderBy('sort_order', 'ASC')->get();
            // @var  $queue Queue
            foreach ($queues as $queue) {

                // if event are empty than it returns integer so should check if its array
                if (is_array($queue->event)) {
                    if (in_array($eventName, $queue->event)) {
                        $value = eval($queue->input_condition);
                        if ($value === true) {
                            $queue->pushItem($model);
                        }
                    }
                }
            }
        }
    }*/

    /**
     * Bootstrap any application services.
     * @return void
     */
    /*public static function registerQueueListener()
    {
        Event::listen('eloquent.created: *', function ($model) {
            Queue::listenEntityEvents('created', $model);
        });
        Event::listen('eloquent.updated: *', function ($model) {
            Queue::listenEntityEvents('updated', $model);
        });
        Event::listen('eloquent.deleted: *', function ($model) {
            Queue::listenEntityEvents('deleted', $model);
        });
    }*/
}
