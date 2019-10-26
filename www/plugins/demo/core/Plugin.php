<?php namespace Demo\Core;

use Demo\Core\EventHandlers\Any\BeforeCreateOrUpdate;
use Demo\Core\Models\QueueItemModel;
use Demo\Core\Models\QueueModel;
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
        QueueModel::registerQueueListener();
        Plugin::registerServiceProviders();
    }
}
