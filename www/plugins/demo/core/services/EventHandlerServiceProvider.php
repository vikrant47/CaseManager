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
            if ($handler->model === 'universal' || $handler->model === get_class($model))
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

    public function loadFromFileSystem()
    {
        foreach (PluginManager::instance()->getPlugins() as $plugin) {
            if (method_exists($plugin, 'getEventHandlers')) {
                $eventHandlers = $plugin->getEventHandlers();
                foreach ($eventHandlers as $eventHandler) {
                    $instance = new $eventHandler();
                    foreach ($instance->events as $eventName) {
                        array_push($this->events[$eventName], $instance);
                    }
                }
            }
        }
        $events = array_keys($this->events);

        foreach ($events as $eventName) {
            usort($this->events[$eventName], function ($a, $b) {
                return $a->sort_order - $b->sort_order;
            });
        }
    }

    public function loadFromDatabase($event, $model)
    {

    }

    public function register()
    {
        if ($this->handlerRegistered === false) {
            $this->loadFromFileSystem();
            $this->handlerRegistered = true;
        }
    }
}