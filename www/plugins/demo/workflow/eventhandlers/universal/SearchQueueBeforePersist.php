<?php

namespace Demo\Workflow\EventHandlers\Universal;


use Demo\Core\Classes\Beans\ScriptContext;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Classes\Utils\ModelUtil;
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
     * Find all queues based on Item Type and evaluate them one by one
     * If a queue qualifies than break the loop.
     * Only one queue is alloed to push an item
     */
    public function handler($event, $model)
    {
        $logger = PluginConnection::getCurrentLogger();
        $ignoreModels = [QueueItem::class];
        $includedPackage = ['Workflow'];
        if (!in_array(get_class($model), $ignoreModels) /*&& in_array(explode('\\', get_class($model))[1], $includedPackage)*/) {
            /**@var $queues Collection<Queue> */
            // throw new ApplicationException('Searching for queue , $event = ' . $event . ' , model = ' . get_class($model));
            $queues = Queue::where('active', 1)->where(function ($query) use ($model) {
                $query->where('item_type', '=', 'universal')
                    ->orWhere('item_type', '=', get_class($model));
            })->orderBy('sort_order', 'ASC')->get();
            $logger->info('Evaluating queue to accept item ' . ModelUtil::toString($model) . ' total = ' . $queues->count());
            // throw new ApplicationException('Queue found "'.$queues->count(). '" , Evaluating input condition."');
            /**@var  $queue Queue */
            foreach ($queues as $queue) {
                // if event are empty than it returns integer so should check if its array
                if (is_array($queue->event)) {
                    if (in_array($event, $queue->event)) {
                        $logger->info('Queue found with name ' . $queue->name . ' , evaluating input condition');
                        // throw new ApplicationException('Queue found with name "'.$queue->name. '" , Evaluating input condition."');
                        $context = new ScriptContext();
                        $value = $context->execute($queue->input_condition, ['queue' => $queue, 'event' => $event, 'item' => $model]);
                        $logger->info('Input condition evaluated to ' . $value);
                        if ($value === true) {
                            // throw new ApplicationException('Condition Evaluated to true for queue "'.$queue->name. '"');
                            $logger->info('Pushing item to queue with id ' . $model->id);
                            $queue->pushItem($model);
                            break;
                        }
                    }
                }
            }
        }
    }
}
