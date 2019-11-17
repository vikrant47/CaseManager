<?php namespace Demo\Workflow\Models;

use Backend\Models\UserGroup;
use Demo\Core\Classes\Beans\ScriptContext;
use Demo\Core\Classes\Helpers\PluginConnection;
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
    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_workflow_queues';

    public $belongsTo = [
        'created_by' => [User::class, 'key' => 'created_by_id'],
        'updated_by' => [User::class, 'key' => 'updated_by_id'],
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

    public $jsonable = ['trigger'];

    public $attachAuditedBy = true;
    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public function getSupportedItemTypeOptions()
    {
        return PluginConnection::getAllModelAlias(true);
    }

    public function getTriggerOptions()
    {
        return ['creating' => 'Creating', 'updating' => 'Updating', 'deleting' => 'Deleting',
            'created' => 'Created', 'updated' => 'Updated', 'deleted' => 'Delete'];
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
        if ($this->supported_item_type === 'universal' || $this->supported_item_type === get_class($item)) {
            if ($this->virtual === 0) {
                $existingItems = QueueItem::where(['item_id' => $item->id, 'item_type' => get_class($item)])->get();
                $insert = true;
                if (!empty($existingItem)) {
                    if ($this->redundancy_policy === Queue::$OVERRIDE_POLICY) {
                        $existingItem->updated_at = new \DateTime();
                        $existingItem->save();
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
                $this->assignItem($item);
            }
        } else {
            throw new ApplicationException('Unsupported element type .Unable to push element in queue');
        }
    }

    /**
     * Processing poped item by assignment rule
     */
    public function assignItem($item)
    {
        // creating context
        $context = new ScriptContext();
        $context->execute($this->assignment_rule->script, ['queue' => $this, 'item' => $item]);
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
            return null;
        } else {
            $queueItem = DB::table('demo_workflow_queue_items')->where('id', '=', $elem->id)->lockForUpdate()->get()->first();
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

    /*public static function listenEntityEvents($eventName, $model)
    {
        $ignoreModels = [QueueItem::class];
        $includedPackage = ['Workflow'];
        if (!in_array(get_class($model), $ignoreModels) && in_array(explode('\\', get_class($model))[1], $includedPackage)) {
            // @var $queues Collection<Queue>
            $queues = Queue::where('active', 1)->where(function ($query) use ($model) {
                $query->where('supported_item_type', '=', 'any')
                    ->orWhere('supported_item_type', '=', get_class($model));
            })->orderBy('sort_order', 'ASC')->get();
            // @var  $queue Queue
            foreach ($queues as $queue) {

                // if trigger are empty than it returns integer so should check if its array
                if (is_array($queue->trigger)) {
                    if (in_array($eventName, $queue->trigger)) {
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
