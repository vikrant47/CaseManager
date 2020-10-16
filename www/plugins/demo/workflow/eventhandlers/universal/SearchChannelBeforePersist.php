<?php

namespace Demo\Workflow\EventHandlers\Universal;


use Demo\Core\Classes\Beans\TemplateEngine;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Classes\Utils\ModelUtil;
use Demo\Core\Services\InMemoryQueryFilter;
use Demo\Core\Services\QueryFilter;
use Demo\Core\Services\SecuredEntityService;
use Demo\Workflow\Models\ServiceChannel;
use Demo\Workflow\Models\Workflow;
use Demo\Workflow\Models\Work;
use Demo\Workflow\Models\WorkflowTransition;
use Demo\Workflow\Services\ChannelService;
use Demo\Workflow\Services\WorkflowService;
use Demo\Workflow\Services\WorkService;
use Log;
use October\Rain\Exception\ApplicationException;
use System\Models\EventLog;

class SearchChannelBeforePersist
{
    public $model = 'universal';
    public $events = ['created'];
    public $sort_order = -1000;

    /**
     * Find all channels based on Model and evaluate them one by one
     * If a channel qualifies than break the loop.
     * Only one channel is allowed to push an item
     */
    public function handler($event, $model)
    {
        $logger = PluginConnection::getCurrentLogger();
        $logger->debug('Searching channel for model ' . ModelUtil::toString($model));
        $ignoreModels = [Work::class, WorkflowTransition::class, EventLog::class];
        $includedPackage = ['Workflow'];
        $modelClass = get_class($model);
        if (!in_array($modelClass, $ignoreModels) /*&& in_array(explode('\\', get_class($model))[1], $includedPackage)*/) {
            $channelService = new ChannelService();
            $channel = $channelService->searchChannel($model);
            if ($channel === null) {
                return;
            }
            $logger->debug($channel->name . ' Channel matched for model ' . ModelUtil::toString($model));
            $workService = new WorkService();
            $work = $workService->newWork($channel, $model);
            $logger->debug('Searching workflow for channel ' . ModelUtil::toString($channel));
            $wrokflowService = new WorkflowService();
            $workflow = $wrokflowService->searchWorkflow($channel);
            if ($workflow !== null) {
                $wrokflowService->startWorkflow($workflow, $work);
            } else {
                $logger->debug('No matching workflow found for channel ' . ModelUtil::toString($channel));
            }
            if (!$work->exists) {
                $work->save();
            }
        }
    }
}
