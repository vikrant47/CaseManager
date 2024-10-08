<?php

namespace Cyd293\BackendSkin;

use Backend\Classes\Skin as AbstractSkin;
use Backend\Classes\WidgetBase;
use Config;
use Cyd293\BackendSkin\Listener\PluginEventSubscriber;
use Cyd293\BackendSkin\Router\UrlGenerator;
use Cyd293\BackendSkin\Skin\BackendSkin;
use Demo\Core\Services\SwooleServiceProvider;
use Event;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public $elevated = true;

    public function boot()
    {
        $events = $this->app->get('events');
        /*SwooleServiceProvider::getLogger()->debug('Theme plugin booted');
        SwooleServiceProvider::getLogger()->debug('App object in plugin level hash '.spl_object_hash($this->app));
        SwooleServiceProvider::getLogger()->debug('Event object in plugin level hash '.spl_object_hash($events));
        */
        Config::set('cms.backendSkin', BackendSkin::class);
        Event::subscribe(new PluginEventSubscriber());
        WidgetBase::extendableExtendCallback(function (WidgetBase $widget) {
            $origViewPath = $widget->guessViewPath();
            $newViewPath = str_replace(base_path(), '', $origViewPath);
            $newViewPath = $this->getActiveSkin()->skinPath . '/views/' . $newViewPath . '/partials';
            $widget->addViewPath($newViewPath);
        });
    }

    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public function register()
    {
        $this->app->register(RoutingServiceProvider::class);
        $this->registerConsoleCommand('cyd293.backendskin', Console\SetSkinCommand::class);
    }

    /**
     * @return AbstractSkin
     */
    private function getActiveSkin()
    {
        return AbstractSkin::getActive();
    }
}
