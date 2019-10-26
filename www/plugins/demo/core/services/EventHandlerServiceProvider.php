<?php


namespace Demo\Core\Services;


use Demo\Core\Plugin;
use October\Rain\Support\ServiceProvider;
use System\Classes\PluginManager;
use Event;

class EventHandlerServiceProvider extends ServiceProvider
{
    public $handlerRegistered = false;
    public $events = [
        'beforeCreate' => [],
        'beforeUpdate' => [],
        'beforeDelete' => [],
        'afterCreate' => [],
        'afterDelete' => [],
        'afterUpdate' => [],
    ];

    public function executeEvents($eventName, $model)
    {
        $handlers = $this->events[$eventName];
        foreach ($handlers as $handler) {
            $handler->handler($eventName, $model);
        }
    }

    public function registerHandlers()
    {
        Event::listen('eloquent.creating: *', function ($model) {
            $this->executeEvents('beforeCreate', $model);
        });
        Event::listen('eloquent.updating: *', function ($model) {
            $this->executeEvents('beforeUpdate', $model);
        });
        Event::listen('eloquent.deleting: *', function ($model) {
            $this->executeEvents('beforeDelete', $model);
        });
        Event::listen('eloquent.created: *', function ($model) {
            $this->executeEvents('afterCreate', $model);
        });
        Event::listen('eloquent.updated: *', function ($model) {
            $this->executeEvents('afterUpdate', $model);
        });
        Event::listen('eloquent.deleted: *', function ($model) {
            $this->executeEvents('afterDelete', $model);
        });
    }

    public function register()
    {
        if ($this->handlerRegistered === false) {
            foreach (PluginManager::instance()->getPlugins() as $plugin) {
                if (method_exists($plugin, 'getEventHandlers')) {
                    $eventHandlers = $plugin->getEventHandlers();
                    foreach ($eventHandlers as $eventHandler) {
                        $instance = new $eventHandler();
                        foreach ($instance->events as $event) {
                            array_push($this->events[$event], $instance);
                        }
                    }
                }
            }
            $this->registerHandlers();
            $this->handlerRegistered = true;
        }
    }
}