<?php namespace Demo\Core;

use Demo\Core\EventHandlers\Universal\BeforeCreateOrUpdate;
use Demo\Core\EventHandlers\CustomField\BeforeCreateOrUpdateCustomField;
use Demo\Core\EventHandlers\Universal\BeforeDeleteCascade;
use Demo\Core\FormWidgets\DesignProviders\DefaultDesignProvider;
use Demo\Core\FormWidgets\RelatedList;
use Demo\Workflow\EventHandlers\Universal\BeforeUpdateWorkflowItemState;
use RainLab\Builder\Classes\ControlLibrary;
use System\Classes\PluginBase;
use BackendAuth;
use Event;
use App;

class Plugin extends PluginBase
{
    public function getEventHandlers()
    {
        return [
            BeforeCreateOrUpdate::class,
            BeforeUpdateWorkflowItemState::class,
            BeforeCreateOrUpdateCustomField::class,
            BeforeDeleteCascade::class,
        ];
    }

    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public function registerFormWidgets()
    {
        return [
            RelatedList::class => ['code' => 'relatedlist', 'Label' => 'Related List']
        ];
    }

    public static function registerServiceProviders()
    {
        App::register('\Demo\Core\Services\CommandServiceProvider');
        App::register('\Demo\Core\Services\EventHandlerServiceProvider');
        App::register('\Demo\Core\Services\FormFieldService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Plugin::registerServiceProviders();
        DefaultDesignProvider::listenWidgetEvents();
    }
}
