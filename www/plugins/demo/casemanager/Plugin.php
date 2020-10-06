<?php namespace Demo\Casemanager;

use Demo\Casemanager\EventHandlers\Task\BeforeCreateTaskAssignQueueToCase;
use Demo\Casemanager\EventHandlers\Work\BeforeUpdateAutoAssignCaseToUser;
use Demo\Casemanager\Models\Task;
use Demo\Casemanager\Models\Queue;
use System\Classes\PluginBase;
use BackendAuth;
use Event;

class Plugin extends PluginBase
{
    public function getEventHandlers()
    {
        return [
            BeforeUpdateAutoAssignCaseToUser::class,
            BeforeCreateTaskAssignQueueToCase::class,
        ];
    }

    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }
}
