<?php namespace Demo\Workflow\Models;

use Backend\Models\UserGroup;
use Demo\Core\Classes\Beans\ScriptContext;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Classes\Utils\ModelUtil;
use Demo\Core\Services\EventHandlerServiceProvider;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Model;
use Event;
use Backend\Models\User;
use October\Rain\Auth\Models\Group;
use October\Rain\Exception\ApplicationException;


/**
 * Model
 */
class Queue extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \Demo\Core\Classes\Traits\ModelHelper;
    public static $ADD_NEW_POLICY = 'addNew';
    public static $OVERRIDE_POLICY = 'override';

    /**@var $logger \Monolog\Logger */
    private $logger;
    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_workflow_queues';

    public $belongsTo = [
        'plugin' => [\Demo\Core\Models\PluginVersions::class, 'key' => 'plugin_id'],
        'pop_criteria' => [\Demo\Workflow\Models\QueuePopCriterias::class, 'key' => 'pop_criteria_id'],
        'assignment_rule' => [\Demo\Workflow\Models\QueueAssignmentRule::class, 'key' => 'assignment_rule_id'],
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
    ];

    /**
     * Queue constructor.
     */
    public function __construct()
    {
        $this->logger = PluginConnection::getLogger('demo.workflow');
    }

    public function getItemTypeOptions()
    {
        return PluginConnection::getAllModelAlias(true);
    }

    public function getEventOptions()
    {
        return EventHandlerServiceProvider::$MODEL_EVENTS_OPTIONS;
    }

    /***Scope query definition start*/

    public static function getQueuesForUser(User $user)
    {
        return DB::select('SELECT queue.* from demo_workflow_queues queue'
            . ' join demo_workflow_queue_assignment_groups ag '
            . ' on ag.queue_id = queue.id '
            . ' join backend_user_groups grp on grp.id = ag.group_id'
            . ' join backend_users_groups usergroup on usergroup.user_group_id = grp.id '
            . ' join backend_users usr on usr.id = usergroup.user_id '
            . ' where queue.active = 1 and usr.id = ? '
            . ' order by queue.name ', [$user->id]);
    }

    /**
     * Push an item to queue
     * If queue is virtual then process item othewise push item to database
     */
    public function pushItem($item)
    {
        $this->logger->info('Pushing item to queue [' . $this->name . ']' . ModelUtil::toString($item));
        if ($this->virtual == 1) {
            $this->logger->info('Queue is virtual do assigning item');
            $this->assignItem(null, $item); // if its a virtual queue than immediately call assign item
            return;
        }
        if ($this->item_type === 'universal' || $this->item_type === get_class($item)) {
            $queueItem = QueueItem::where(['item_id' => $item->id, 'item_type' => get_class($item), 'assigned_to_id' => null])->first();
            $insert = true;
            if (!empty($queueItem)) {
                $this->logger->info('Item already exists applying redendancy policy');
                if ($this->redundancy_policy === Queue::$OVERRIDE_POLICY) {
                    $queueItem->updated_at = new \DateTime();
                    $insert = false;
                } elseif ($this->redundancy_policy === Queue::$ADD_NEW_POLICY) {
                    $insert = true;
                }
            }
            if ($insert === true) {
                $queueItem = new QueueItem();
                $queueItem->queue = $this;
                $queueItem->item_id = $item->id;
                $queueItem->item_type = get_class($item);
                $queueItem->save();
            }
        } else {
            throw new ApplicationException('Unsupported element type .Unable to push element in queue');
        }
    }

    /**
     * Processing poped item by assignment rule
     * Item can be any model in queue
     */
    public function assignItem($queueItem, $item)
    {
        $this->logger->info('Assigning the item ' . ModelUtil::toString($item) . ' using assignment rule ' . ModelUtil::toString($this->assignment_rule, 'name'));
        // creating context
        $context = new ScriptContext();
        $user = $context->execute($this->assignment_rule->script, ['queue' => $this, 'item' => $item, 'queueItem' => $queueItem]);
        $this->logger->info('Assigning to user ' . $user->username);
        if (empty($user)) {
            throw new ApplicationException('Assignment rule "' . $this->assignment_rule->name . '" din\'t return any user');
        }
        if ($this->isUserInAssignmentGroups($user) === false) {
            throw new ApplicationException('Unable to assign to given user as its not in assignment groups');
        }
        if (!empty($queueItem)) {
            $queueItem->assigned_to_id = $user->id;
            $queueItem->save();
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
     */
    public function popItem()
    {
        $this->logger->debug('Poping an item for assignment using ' . ModelUtil::toString($this->pop_criteria, 'name'));

        if ($this->virtual) {
            return null;
        }
        $context = new ScriptContext();
        $elem = $context->execute($this->pop_criteria->script, ['queue' => $this]);
        if ($elem instanceof Collection) {
            $elem = $elem->first();
        } elseif ($elem instanceof \October\Rain\Database\QueryBuilder) {
            $elem = $elem->where('queue_id', $this->id)->get()->first();
        }
        if (
            empty($elem)
            || empty($elem->id)
            || $elem->queue_id !== $this->id
        ) {
            $this->logger->debug('No item found for assignement');
            return null;
        } else {
            $queueItem = DB::table('demo_workflow_queue_items')->where('id', '=', $elem->id)->lockForUpdate()->first();
            if (!empty($queueItem) && !empty($queueItem->item_type) && !empty($queueItem->item_id)) {
                DB::table('demo_workflow_queue_items')->where('id', '=', $elem->id)->update(['poped_at' => new \DateTime()]);
                return $elem->item_type::find($elem->item_id);
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
        $item = $this->popItem();
        $context = new ScriptContext();
        return $context->execute($this->assignment_rule->script, ['queue' => $this, 'item' => $item]);

    }

    /**
     * Check if user present in assignment groups
     */
    public function isUserInAssignmentGroups(User $user)
    {
        return \Backend\Models\UserGroup::with(['users' => function ($query) use ($user) {
                $query->where('id', $user->id);
            }])->whereIn('id', $this->assignment_groups->map(function ($group) {
                return $group->id;
            })->toArray())->count() > 0;
    }
    /*public static function listenEntityEvents($eventName, $model)
    {
        $ignoreModels = [QueueItem::class];
        $includedPackage = ['Workflow'];
        if (!in_array(get_class($model), $ignoreModels) && in_array(explode('\\', get_class($model))[1], $includedPackage)) {
            // @var $queues Collection<Queue>
            $queues = Queue::where('active', 1)->where(function ($query) use ($model) {
                $query->where('item_type', '=', 'any')
                    ->orWhere('item_type', '=', get_class($model));
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
