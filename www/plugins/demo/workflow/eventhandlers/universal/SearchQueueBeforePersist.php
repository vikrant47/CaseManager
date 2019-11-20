<?php

namespace Demo\Workflow\EventHandlers\Universal;


use Demo\Core\Classes\Beans\ScriptContext;
use Demo\Workflow\Models\Queue;
use Demo\Workflow\Models\QueueItem;
use Log;
use October\Rain\Exception\ApplicationException;

class SearchQueueBeforePersist
{
    public $model = 'universal';
    public $events = ['creating', 'updating', 'deleting', 'created', 'updated', 'deleted'];
    public $sort_order = -1000;

    /**
     * Find all queues based on supported item type and evaluate them one by one
     * If a queue qualifies than break the loop.
     * Only one queue is alloed to push an item
     */
    public function handler($event, $model)
    {
        $ignoreModels = [QueueItem::class];
        $includedPackage = ['Workflow'];
        if (!in_array(get_class($model), $ignoreModels) /*&& in_array(explode('\\', get_class($model))[1], $includedPackage)*/) {
            /**@var $queues Collection<Queue> */
            // throw new ApplicationException('Searching for queue , $event = ' . $event . ' , model = ' . get_class($model));
            $queues = Queue::where('active', 1)->where(function ($query) use ($model) {
                $query->where('supported_item_type', '=', 'universal')
                    ->orWhere('supported_item_type', '=', get_class($model));
            })->orderBy('sort_order', 'ASC')->get();
            // throw new ApplicationException('Queue found "'.$queues->count(). '" , Evaluating input condition."');
            /**@var  $queue Queue */
            foreach ($queues as $queue) {
                // if trigger are empty than it returns integer so should check if its array
                if (is_array($queue->trigger)) {
                    if (in_array($event, $queue->trigger)) {
                        // throw new ApplicationException('Queue found with name "'.$queue->name. '" , Evaluating input condition."');
                        $context = new ScriptContext();
                        $value = $context->execute($queue->input_condition, ['queue' => $queue, 'event' => $event, 'model' => $model]);
                        if ($value === true) {
                            // throw new ApplicationException('Condition Evaluated to true for queue "'.$queue->name. '"');
                            $queue->pushItem($model);
                            break;
                        }
                    }
                }
            }
        }
    }
}
