<?php namespace Demo\Core;

use Demo\Core\EventHandlers\Migrations\BeforeCreateMigrations;
use Demo\Core\EventHandlers\Model\BeforeCreateModels;
use Demo\Core\EventHandlers\Universal\BeforeCreateOrUpdateAudit;
use Demo\Core\EventHandlers\CustomField\BeforeCreateOrUpdateCustomField;
use Demo\Core\EventHandlers\Universal\BeforeDeleteCascade;
use Demo\Core\EventHandlers\Universal\RestrictSystemRecordHandler;
use Demo\Core\FormWidgets\DesignProviders\DefaultDesignProvider;
use Demo\Core\FormWidgets\QueryBuilderWidget;
use Demo\Core\FormWidgets\RelatedList;
use Demo\Core\EventHandlers\Universal\UniversalWebhookHandler;
use Demo\Core\Middlewares\CorePluginMiddlerware;
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
            /*BeforeCreateMigrations::class,*/
            BeforeCreateOrUpdateAudit::class,
            BeforeUpdateWorkflowItemState::class,
            BeforeCreateOrUpdateCustomField::class,
            BeforeDeleteCascade::class,
            UniversalWebhookHandler::class,
            RestrictSystemRecordHandler::class,
            BeforeCreateModels::class,
        ];
    }

    public function getPluginMiddleware()
    {
        return [
            CorePluginMiddlerware::class,
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
            RelatedList::class => ['code' => 'relatedlist', 'Label' => 'Related List'],
            QueryBuilderWidget::class => ['code' => 'querybuilderwidget', 'Label' => 'Query Builder']
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
        trace_sql();
        Plugin::registerServiceProviders();
        DefaultDesignProvider::listenWidgetEvents();
    }
}
