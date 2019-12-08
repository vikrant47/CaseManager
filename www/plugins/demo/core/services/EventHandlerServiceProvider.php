<?php


namespace Demo\Core\Services;


use Demo\Core\Classes\Beans\ScriptContext;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Models\EventHandler;
use Demo\Core\Plugin;
use October\Rain\Exception\ApplicationException;
use October\Rain\Support\ServiceProvider;
use System\Classes\PluginManager;
use Event;

class EventHandlerServiceProvider extends ServiceProvider
{
    /**@var $logger \Monolog\Logger */
    public $logger;
    public static $MODEL_EVENTS_OPTIONS = [
        'creating' => 'Creating', 'updating' => 'Updating', 'deleting' => 'Deleting',
        'created' => 'Created', 'updated' => 'Updated', 'deleted' => 'Deleted',
    ];
    public $handlerRegistered = false;
    public $events = [
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

    public function executeEvents($eventName, $model)
    {
        $this->logger->debug(get_class($model) . ' ' . $eventName . ' triggered, Executing handlers ');
        $handlers = $this->events[$eventName];
        $this->logger->debug(get_class($model) . ' ' . $eventName . ' filesystem handler loaded ' . count($handlers));
        foreach ($handlers as $handler) {
            $this->logger->debug(get_class($model) . ' ' . $eventName . ' Executing ' . get_class($handler));
            if ($handler->model === 'universal' || $handler->model === get_class($model)) {
                $context = new ScriptContext();
                $handler->handler($eventName, $model);
            }
        }
        $dbHandlers = $this->loadFromDatabase($eventName, get_class($model));
        $this->logger->debug(get_class($model) . ' ' . $eventName . ' database handler loaded ' . $dbHandlers->count());
        // throw new ApplicationException($dbHandlers->count());
        foreach ($dbHandlers as $handler) {
            $this->logger->debug(get_class($model) . ' ' . $eventName . ' Executing ' . $handler->name);
            $handler->handler($eventName, $model);
        }
    }

    public function registerHandlers()
    {
        Event::listen('eloquent.creating: *', function ($model) {
            $this->executeEvents('creating', $model);
        });
        Event::listen('eloquent.updating: *', function ($model) {
            $this->executeEvents('updating', $model);
        });
        Event::listen('eloquent.deleting: *', function ($model) {
            $this->executeEvents('deleting', $model);
        });
        Event::listen('eloquent.created: *', function ($model) {
            $this->executeEvents('created', $model);
        });
        Event::listen('eloquent.updated: *', function ($model) {
            $this->executeEvents('updated', $model);
        });
        Event::listen('eloquent.deleted: *', function ($model) {
            $this->executeEvents('deleted', $model);
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