<?php namespace Demo\Core;

use Demo\Core\EventHandlers\Migrations\BeforeCreateMigrations;
use Demo\Core\EventHandlers\Model\BeforeCreateModels;
use Demo\Core\EventHandlers\Universal\BeforeAllRestrict;
use Demo\Core\EventHandlers\Universal\BeforeCreateOrUpdateAudit;
use Demo\Core\EventHandlers\CustomField\BeforeCreateOrUpdateCustomField;
use Demo\Core\EventHandlers\Universal\BeforeDeleteCascade;
use Demo\Core\EventHandlers\Universal\RestrictSystemRecordHandler;
use Demo\Core\FormWidgets\DesignProviders\DefaultDesignProvider;
use Demo\Core\FormWidgets\DurationWidget;
use Demo\Core\FormWidgets\WorkFlowDesigner;
use Demo\Core\FormWidgets\RelatedList;
use Demo\Core\EventHandlers\Universal\UniversalWebhookHandler;
use Demo\Core\FormWidgets\RelationDynamicDropdown;
use Demo\Core\FormWidgets\SearchableRelatedList;
use Demo\Core\Middlewares\CorePluginMiddlerware;
use Demo\Core\Services\InMemoryQueryFilter;
use Demo\Core\Services\SwooleServiceProvider;
use Demo\Workspace\EventHandlers\Universal\BeforeUpdateWorkState;
use RainLab\Builder\Classes\ControlLibrary;
use System\Classes\PluginBase;
use BackendAuth;
use Event;
use App;
use DB;

class Plugin extends PluginBase
{
    public function getEventHandlers()
    {
        return [
            /*BeforeCreateMigrations::class,*/
            BeforeCreateOrUpdateAudit::class,
            BeforeUpdateWorkState::class,
            BeforeCreateOrUpdateCustomField::class,
            BeforeDeleteCascade::class,
            UniversalWebhookHandler::class,
            BeforeAllRestrict::class,
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
            WorkFlowDesigner::class => ['code' => 'querybuilderwidget', 'Label' => 'Query Builder'],
            DurationWidget::class => ['code' => 'durationwidget', 'Label' => 'Duration'],
            RelationDynamicDropdown::class => [
                'label' => 'Relation Dynamic Dropdown',
                'code' => 'relation-dynamic-dropdown'
            ]
        ];
    }

    public static function registerServiceProviders()
    {
        App::register('\Demo\Core\Services\CommandServiceProvider');
        App::register('\Demo\Core\Services\EventHandlerServiceProvider');
        App::register('\Demo\Core\Services\FormFieldService');
        App::register('\Demo\Core\Services\SwooleServiceProvider');
    }

    public static function registerServices()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        SwooleServiceProvider::getLogger()->debug('plugin booted');
        trace_sql();
        DB::getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('jsonb', 'text');
        Plugin::registerServiceProviders();
        Plugin::registerServices();
        DefaultDesignProvider::listenWidgetEvents();
    }
}
