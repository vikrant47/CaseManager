<?php namespace Demo\Casemanager\Models;

use Backend\Models\UserGroup;
use Illuminate\Support\Collection;
use Model;
use Event;
use Backend\Models\User;
use October\Rain\Auth\Models\Group;
use October\Rain\Exception\ApplicationException;


/**
 * Model
 */
class QueueModel extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \Demo\CaseManager\Classes\Traits\ModelHelper;
    public static $ADD_NEW_POLICY = 'addNew';
    public static $OVERRIDE_POLICY = 'override';
    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_casemanager_queues';

    public $belongsTo = [
        'created_by' => [User::class, 'key' => 'created_by_id'],
        'updated_by' => [User::class, 'key' => 'updated_by_id'],
    ];

    public $belongsToMany = [
        'assignment_groups' => [
            UserGroup::class,
            'table' => 'demo_casemanager_queue_assignment_groups',
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
        return ['any' => 'Any', CaseModel::class => 'Case', QueueModel::class => 'Queue',
            WorkflowEntitiesModel::class => 'Workflow Entity',
        ];
    }

    public function getTriggerOptions()
    {
        return ['created' => 'Create', 'updated' => 'Update', 'deleted' => 'Delete'];
    }

    /**
     * Push an item to queue
     * If queue is virtual then process item othewise push item to database
     */
    public function pushItem($item)
    {
        if ($this->supported_item_type === 'any' || $this->supported_item_type === get_class($item)) {
            $existingItems = QueueItemModel::where(['item_id' => $item->id, 'item_type' => get_class($item)])->get();
            if ($this->virtual === 0) {
                $insert = true;
                if (!empty($existingItem)) {
                    if ($this->redundancy_policy === QueueModel::$OVERRIDE_POLICY) {
                        $existingItem->updated_at = new \DateTime();
                        $existingItem->save();
                        $insert = false;
                    } elseif ($this->redundancy_policy === QueueModel::$ADD_NEW_POLICY) {
                        $insert = true;
                    }
                }
                if ($insert === true) {
                    $queueItem = new QueueItemModel();
                    $queueItem->queue = $this;
                    $queueItem->item_id = $item->id;
                    $queueItem->item_type = get_class($item);
                    $queueItem->save();
                }
            } else {
                $this->processItem($item);
            }
        } else {
            throw new ApplicationException('Unsupported element type .Unable to push element in queue');
        }
    }

    public function processItem($item)
    {
        eval($this->script);
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
        $elem = eval($this->pop_criteria);
        if ($elem instanceof Collection) {
            $elem = $elem->first();
        }
        if (!empty($elem) && !empty($elem->id) && (!array_key_exists('item_type', $elem) || !array_key_exists('item_id', $elem))) {
            throw new ApplicationException('Provided pop_criteria should return record of QueueItemModel');
        } else {
            $queueItem = DB::table('demo_casemanager_queue_items')->where('id', '=', $elem->id)->lockForUpdate()->get();
            if (!empty($queueItem) && array_key_exists('item_type', $queueItem) && array_key_exists('item_id', $queueItem)) {
                DB::table('demo_casemanager_queue_items')->where('id', '=', $elem->id)->delete();
                return $elem->item_type::find($elem->item_id);
            } else {
                return $this->pop();
            }
        }
        return null;
    }

    public static function listenEntityEvents($eventName, $model)
    {
        $ignoreModels = [QueueItemModel::class];
        $includedPackage = ['Casemanager'];
        if (!in_array(get_class($model), $ignoreModels) && in_array(explode('\\', get_class($model))[1], $includedPackage)) {
            /**@var $queues Collection<QueueModel> */
            $queues = QueueModel::where('active', 1)->where(function ($query) use ($model) {
                $query->where('supported_item_type', '=', 'any')
                    ->orWhere('supported_item_type', '=', get_class($model));
            })->orderBy('sort_order', 'ASC')->get();
            /**@var  $queue QueueModel */
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
    }

    /**
     * Bootstrap any application services.
     * @return void
     */
    public static function registerQueueListener()
    {
        Event::listen('eloquent.created: *', function ($model) {
            QueueModel::listenEntityEvents('created', $model);
        });
        Event::listen('eloquent.updated: *', function ($model) {
            QueueModel::listenEntityEvents('updated', $model);
        });
        Event::listen('eloquent.deleted: *', function ($model) {
            QueueModel::listenEntityEvents('deleted', $model);
        });
    }
}
