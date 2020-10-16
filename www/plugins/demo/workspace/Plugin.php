<?php namespace Demo\Workspace;

use Demo\Workspace\EventHandlers\Universal\SearchQueueBeforePersist;
use Demo\Workspace\EventHandlers\Universal\SearchChannelBeforePersist;
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
