<?php namespace Demo\Notification;

use Demo\Core\EventHandlers\CustomField\BeforeCreateOrUpdateCustomField;
use Demo\Core\EventHandlers\Universal\BeforeDeleteCascade;
use Demo\Notification\EventHandlers\Universal\UniversalNotificationHandler;
use Demo\Workflow\EventHandlers\Universal\BeforeUpdateWorkState;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function getEventHandlers()
    {
        return [
            UniversalNotificationHandler::class
        ];
    }

    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }
}
