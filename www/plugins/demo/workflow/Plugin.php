<?php namespace Demo\Workflow;

use Demo\Workflow\EventHandlers\Universal\SearchQueueBeforePersist;
use Demo\Workflow\EventHandlers\Universal\SearchChannelBeforePersist;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function getEventHandlers()
    {
        return [
            SearchQueueBeforePersist::class,
            SearchChannelBeforePersist::class
        ];
    }

    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }
}
