<?php


namespace Demo\Core\Services;


use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Classes\Utils\ModelUtil;
use Demo\Core\Classes\Utils\ReflectionUtil;
use Illuminate\Http\Request;
use Monolog\Logger;
use October\Rain\Foundation\Providers\ExecutionContextProvider;
use October\Rain\Router\RoutingServiceProvider;
use October\Rain\Router\UrlGenerator;
use October\Rain\Support\ServiceProvider;
use App;

class SwooleServiceProvider extends ServiceProvider
{
    protected $logger;
    protected $routingServiceProvider;
    protected $backendServiceProvider;

    public function __construct($app)
    {
        parent::__construct($app);
        $this->routingServiceProvider = new RoutingServiceProvider($app);
        $this->logger = self::getLogger();
        $this->backendServiceProvider = new  \Backend\ServiceProvider($app);
    }


    /**@return Logger */
    static function getLogger()
    {
        return PluginConnection::getLogger('laravel.swoole');
    }

    public function register()
    {
        $this->registerUrlGenerator();
        $this->initBackend();
        $this->backendServiceProvider->register();
        /*ReflectionUtil::invoke(RoutingServiceProvider::class, $this->routingServiceProvider, 'registerRouter');
        ReflectionUtil::invoke(RoutingServiceProvider::class, $this->routingServiceProvider, 'registerRedirector');
        ReflectionUtil::invoke(RoutingServiceProvider::class, $this->routingServiceProvider, 'registerPsrRequest');
        ReflectionUtil::invoke(RoutingServiceProvider::class, $this->routingServiceProvider, 'registerPsrResponse');
        ReflectionUtil::invoke(RoutingServiceProvider::class, $this->routingServiceProvider, 'registerResponseFactory');
        ReflectionUtil::invoke(RoutingServiceProvider::class, $this->routingServiceProvider, 'registerControllerDispatcher');
        */
    }

    /**
     * Register the URL generator service.
     *
     * @return void
     */
    protected function registerUrlGenerator()
    {

        $app = $this->app;
        // $this->logger->debug('Registering url');
        $routes = $app['router']->getRoutes();

        // The URL generator needs the route collection that exists on the router.
        // Keep in mind this is an object, so we're passing by references here
        // and all the registered routes will be available to the generator.
        $app->instance('routes', $routes);
        // $this->logger->debug('creating UrlGenerator instance');
        $url = new UrlGenerator(
            $routes, $app->rebinding(
            'request', function ($app, $request) {
            $app['url']->setRequest($request);
        }));
        // $this->logger->debug('creating UrlGenerator instance created');
        $url->setSessionResolver(function () {
            return $this->app['session'];
        });
        // $this->logger->debug('session resolver has been set');
        // If the route collection is "rebound", for example, when the routes stay
        // cached for the application, we will need to rebind the routes on the
        // URL generator instance so it has the latest version of the routes.
        $app->rebinding('routes', function ($app, $routes) {
            $app['url']->setRoutes($routes);
        });
        $app['url'] = $url;
        $this->logger->debug('routes re-binded');
    }

    public function initBackend()
    {
        $this->app->singleton('execution.context', function ($app) {
            return 'back-end';
        });
    }
}