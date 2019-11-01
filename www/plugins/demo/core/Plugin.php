<?php namespace Demo\Core;

use Demo\Core\EventHandlers\Universal\BeforeCreateOrUpdate;
use System\Classes\PluginBase;
use BackendAuth;
use Event;
use App;

class Plugin extends PluginBase
{
    public function getEventHandlers()
    {
        return [BeforeCreateOrUpdate::class];
    }

    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public static function registerServiceProviders()
    {
        App::register('\Demo\Core\Services\CommandServiceProvider');
        App::register('\Demo\Core\Services\EventHandlerServiceProvider');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Plugin::registerServiceProviders();
    }
}
