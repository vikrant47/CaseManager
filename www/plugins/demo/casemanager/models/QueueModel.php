<?php namespace Demo\Casemanager\Models;

use Backend\Models\UserGroup;
use Illuminate\Support\Collection;
use Model;
use Event;
use Backend\Models\User;
use October\Rain\Auth\Models\Group;


/**
 * Model
 */
class QueueModel extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \Demo\CaseManager\Classes\Traits\UserAuditSupport;
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
    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public function getSupportedItemTypeOptions()
    {
        return ['any' => 'Any', CaseModel::class => 'Case', QueueModel::class => 'Queue'];
    }

    public function getTriggerOptions()
    {
        return ['created' => 'Create', 'updated' => 'Update', 'deleted' => 'Delete'];
    }

    /**
     * Push an item to queue
     * If queue is virtual then process item othewise push item to database
     */
    public function pushItem($item, $existingItem)
    {
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
    }

    public function processItem($item)
    {
        eval($this->script);
    }

    public static function listenEntityEvents($eventName, $model)
    {
        $ignoreModels = [QueueItemModel::class];
        $includedPackage = ['Casemanager'];
        if (!in_array(get_class($model), $ignoreModels) && in_array(explode('\\', get_class($model))[1], $includedPackage)) {
            $existingItems = QueueItemModel::where(['item_id' => $model->id, 'item_type' => get_class($model)])->get();
            /**@var $queues Collection<QueueModel> */
            $queues = QueueModel::where('active', 1)->where(function ($query) use ($model) {
                $query->where('supported_item_type', '=', 'any')
                    ->orWhere('supported_item_type', '=', get_class($model));
            })->get();
            /**@var  $queue QueueModel */
            foreach ($queues as $queue) {
                if (in_array($eventName, $queue->trigger)) {
                    $value = eval($queue->input_condition);
                    if ($value === true) {
                        $queue->pushItem($model, $existingItems->first());
                    }
                }
            }
        }
    }

    /**
     * Bootstrap any application services.
     *
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
