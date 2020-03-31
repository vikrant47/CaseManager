<?php namespace Demo\Casemanager;

use Demo\Casemanager\EventHandlers\WorkflowItem\BeforeUpdateAutoAssignCaseToUser;
use Demo\Casemanager\Models\QueueItem;
use Demo\Casemanager\Models\Queue;
use System\Classes\PluginBase;
use BackendAuth;
use Event;

class Plugin extends PluginBase
{
    public function getEventHandlers()
    {
        return [
            BeforeUpdateAutoAssignCaseToUser::class
        ];
    }

    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }
}
