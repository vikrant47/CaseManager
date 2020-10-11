<?php


namespace Demo\Core\Services;


use Demo\Core\Classes\Beans\TemplateEngine;
use Demo\Core\Classes\Enums\HandlerType;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Models\EventHandler;
use Demo\Core\Plugin;
use October\Rain\Exception\ApplicationException;
use October\Rain\Support\ServiceProvider;
use System\Classes\PluginManager;
use Event;
use DB;

class EventHandlerServiceProvider extends ServiceProvider
{
    /**@var $logger \Monolog\Logger */
    public $logger;
    public static $MODEL_EVENTS_OPTIONS = [
        'creating' => 'Creating', 'updating' => 'Updating', 'deleting' => 'Deleting',
        'created' => 'Created', 'updated' => 'Updated', 'deleted' => 'Deleted',
    ];
    public $handlerRegistered = false;
    public $QUERY_EVENT_HANDLER = ['execute' => []];
    public $MODEL_EVENT_HANDLER = [
        'creating' => [],
        'updating' => [],
        'deleting' => [],
        'created' => [],
        'deleted' => [],
        'updated' => [],
    ];

    /**
     * EventHandlerServiceProvider constructor.
     * @param \Illuminate\Contracts\Foundation\Application $app
     */
    public function __construct($app)
    {
        parent::__construct($app);
    }

    public function executeSystemEvents($handlerType, $eventName, $model)
    {
        $this->logger->debug(get_class($model) . ' ' . $eventName . ' triggered, Executing handlers ');
        $handlers = $this->{$handlerType}[$eventName];
        $this->logger->debug(get_class($model) . ' ' . $eventName . ' filesystem handler loaded ' . count($handlers));
        foreach ($handlers as $handler) {
            $this->logger->debug(get_class($model) . ' ' . $eventName . ' Executing ' . get_class($handler));
            if ($handler->model === 'universal' || $handler->model === get_class($model)) {
                $context = new TemplateEngine();
                $handler->handler($eventName, $model);
            }
        }
    }

    public function executeDbEvents($handlerType, $eventName, $model)
    {
        $dbHandlers = $this->loadFromDatabase($eventName, get_class($model));
        $this->logger->debug(get_class($model) . ' ' . $eventName . ' database handler loaded ' . $dbHandlers->count());
        // throw new ApplicationException($dbHandlers->count());
        foreach ($dbHandlers as $handler) {
            $this->logger->debug(get_class($model) . ' ' . $eventName . ' Executing ' . $handler->name);
            $handler->handler($eventName, $model);
        }
    }

    public function executeEvents($handlerType, $eventName, $model)
    {
        $this->executeSystemEvents($handlerType, $eventName, $model);
        $this->executeDbEvents($handlerType, $eventName, $model);
    }

    public function executeQueryEvent()
    {

    }

    public function registerHandlers()
    {
        Event::listen('eloquent.creating: *', function ($model) {
            $this->executeEvents(HandlerType::MODEL_EVENT_HANDLER, 'creating', $model);
        });
        Event::listen('eloquent.updating: *', function ($model) {
            $this->executeEvents(HandlerType::MODEL_EVENT_HANDLER, 'updating', $model);
        });
        Event::listen('eloquent.deleting: *', function ($model) {
            $this->executeEvents(HandlerType::MODEL_EVENT_HANDLER, 'deleting', $model);
        });
        Event::listen('eloquent.created: *', function ($model) {
            $this->executeEvents(HandlerType::MODEL_EVENT_HANDLER, 'created', $model);
        });
        Event::listen('eloquent.updated: *', function ($model) {
            $this->executeEvents(HandlerType::MODEL_EVENT_HANDLER, 'updated', $model);
        });
        Event::listen('eloquent.deleted: *', function ($model) {
            $this->executeEvents(HandlerType::MODEL_EVENT_HANDLER, 'deleted', $model);
        });
        /*DB::listen(function ($query) {
            $this->executeSystemEvents(HandlerType::QUERY_EVENT_HANDLER, 'execute', $query);
        });*/
    }

    public function loadFromFileSystem()
    {
        foreach (PluginManager::instance()->getPlugins() as $plugin) {
            if (method_exists($plugin, 'getEventHandlers')) {
                $eventHandlers = $plugin->getEventHandlers();
                foreach ($eventHandlers as $eventHandler) {
                    $instance = new $eventHandler();
                    if (empty($instance->handlerType)) {
                        $instance->handlerType = HandlerType::MODEL_EVENT_HANDLER;
                    }
                    foreach ($instance->events as $eventName) {
                        array_push($this->{$instance->handlerType}[$eventName], $instance);
                    }
                }
            }
        }
        $events = array_keys($this->MODEL_EVENT_HANDLER);

        foreach ($events as $eventName) {
            usort($this->MODEL_EVENT_HANDLER[$eventName], function ($a, $b) {
                return $a->sort_order - $b->sort_order;
            });
        }
    }

    public function loadFromDatabase($event, $model)
    {
        return EventHandler::where('event', $event)->where(function ($query) use ($model) {
            $query->where('model', '=', 'universal')
                ->orWhere('model', '=', $model);
        })->where('active', 1)->orderBy('sort_order')->get();
    }

    public function register()
    {
        $this->logger = PluginConnection::getLogger('demo.core');
        if ($this->handlerRegistered === false) {
            $this->loadFromFileSystem();
            $this->registerHandlers();
            $this->handlerRegistered = true;
        }
    }
}
