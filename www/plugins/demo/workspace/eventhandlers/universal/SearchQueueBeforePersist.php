<?php

namespace Demo\Workspace\EventHandlers\Universal;


use Demo\Core\Classes\Beans\TemplateEngine;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Classes\Utils\ModelUtil;
use Demo\Workspace\Models\Queue;
use Demo\Workspace\Models\Task;
use Demo\Workspace\Models\ServiceChannel;
use Log;
use October\Rain\Exception\ApplicationException;
use System\Models\EventLog;

class SearchQueueBeforePersist
{
    public $model = 'universal';
    public $events = ['creating', 'updating', 'deleting', 'created', 'updated', 'deleted'];
    public $sort_order = -1000;

    public function executeChannel(ServiceChannel $serviceChannel, $model, $event)
    {
        $logger = PluginConnection::getCurrentLogger();
        $queues = Queue::where('active', 1)->where('service_channel_id', $serviceChannel->id)->orderBy('sort_order', 'ASC')->get();
        $logger->info('Evaluating queue to accept item ' . ModelUtil::toString($model) . ' total = ' . $queues->count());
        // throw new ApplicationException('Queue found "'.$queues->count(). '" , Evaluating input condition."');
        /**@var  $queue Queue */
        foreach ($queues as $queue) {
            // if event are empty than it returns integer so should check if its array
            $logger->info('Queue found with name ' . $queue->name . ' , evaluating input condition');
            // throw new ApplicationException('Queue found with name "'.$queue->name. '" , Evaluating input condition."');
            $context = new TemplateEngine();
            $value = $context->execute($queue->condition, [
                'queue' => $queue, 'event' => $event, 'model' => $model, 'serviceChannel' => $serviceChannel
            ]);
            $logger->info('Input condition evaluated to ' . $value);
            if ($value === true) {
                // throw new ApplicationException('Condition Evaluated to true for queue "'.$queue->name. '"');
                $logger->info('Pushing item to queue with id ' . $model->id);
                $queue->pushItem($model);
                break;
            }
        }
    }


    /**
     * Find all queues based on Model and evaluate them one by one
     * If a queue qualifies than break the loop.
     * Only one queue is alloed to push an item
     */
    public function handler($event, $model)
    {
        $logger = PluginConnection::getCurrentLogger();
        $ignoreModels = [Task::class, Queue::class, ServiceChannel::class, EventLog::class];
        $includedPackage = ['Workflow'];
        $modelClass = get_class($model);
        if (!in_array($modelClass, $ignoreModels)
            /*&& in_array(explode('\\', get_class($model))[1], $includedPackage)*/
        ) {
            /**@var $queues Collection<Queue> */
            // throw new ApplicationException('Searching for queue , $event = ' . $event . ' , model = ' . get_class($model));
            $logger->debug('Searching service channel for model ' . ModelUtil::toString($model));
            /*$serviceChannels = ServiceChannel::where(['active' => true, 'model' => $modelClass])->where('event', 'iLike', '%' . $event . '%')->get();
            $logger->debug('Total channel found ' . $serviceChannels->count() . ' for model ' . ModelUtil::toString($model));
            foreach ($serviceChannels as $serviceChannel) {
                $logger->debug('Evaluating service channel ' . $serviceChannel->name . ' for model ' . ModelUtil::toString($model));
                $context = new ScriptContext();
                $value = $context->execute($serviceChannel->condition, ['serviceChannel' => $serviceChannel, 'event' => $event, 'model' => $model]);
                if ($value === true) {
                    $this->executeChannel($serviceChannel, $model, $event);
                }
            }*/
        }
    }
}
