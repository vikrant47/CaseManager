<?php namespace Demo\Workflow;

use Demo\Workflow\EventHandlers\Universal\SearchQueueBeforePersist;
use Demo\Workflow\EventHandlers\Universal\SearchWorkflowBeforePersist;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function getEventHandlers()
    {
        return [
            SearchQueueBeforePersist::class,
            SearchWorkflowBeforePersist::class
        ];
    }

    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }
}
