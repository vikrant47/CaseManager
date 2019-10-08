<?php namespace Demo\Casemanager\Models;

use Model;
use Event;
use Backend\Models\User;

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

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public function getSupportedItemTypeOptions()
    {
        return ['any' => 'Any', CaseModel::class => 'Case', QueueModel::class => 'Queue'];
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public static function registerQueueListener()
    {
        $ignoreModels = [QueueItemModel::class];
        $includedPackage = ['Casemanager'];
        Event::listen(['eloquent.created: *', 'eloquent.updated: *'], function ($model) use ($ignoreModels, $includedPackage) {
            if (!in_array(get_class($model), $ignoreModels) && in_array(explode('\\', get_class($model))[1], $includedPackage)) {
                $existingItems = QueueItemModel::where(['item_id' => $model->id, 'item_type' => get_class($model)])->get();
                $queues = QueueModel::where('active', 1)->where(function ($query) use ($model) {
                    $query->where('supported_item_type', '=', 'any')
                        ->orWhere('supported_item_type', '=', get_class($model));
                })->get();
                foreach ($queues as $queue) {
                    $insert = true;
                    if ($existingItems->count() > 0) {
                        if ($queue->redundancy_policy === QueueModel::$OVERRIDE_POLICY) {
                            $insert = false;
                            $value = eval($queue->input_condition);
                            if ($value) {
                                $existingItem = $existingItems->first();
                                $existingItem->updated_at = new \DateTime();
                                $existingItem->save();
                            }
                        }
                    }
                    if ($insert) {
                        $value = eval($queue->input_condition);
                        if ($value === true) {
                            $queueItem = new QueueItemModel();
                            $queueItem->queue = $queue;
                            $queueItem->item_id = $model->id;
                            $queueItem->item_type = get_class($model);
                            $queueItem->save();
                        }
                    }
                }
            }
        });
    }
}
