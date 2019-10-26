<?php namespace Demo\Core;

use Demo\Core\Models\QueueItemModel;
use Demo\Core\Models\QueueModel;
use System\Classes\PluginBase;
use BackendAuth;
use Event;
use App;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public static function beforeCreateAudit($model)
    {
        if ($model->attachAuditedBy === true) {
            $user = BackendAuth::getUser();
            $model->created_by = $user;
            $model->updated_by = $user;
        }
    }

    public static function beforeUpdateAudit($model)
    {
        if ($model->attachAuditedBy === true) {
            $user = BackendAuth::getUser();
            $model->updated_by = $user;
        }
    }

    public static function registerAuditListener()
    {
        Event::listen('eloquent.creating: *', function ($model) {
            Plugin::beforeCreateAudit($model);
        });
        Event::listen('eloquent.updating: *', function ($model) {
            Plugin::beforeUpdateAudit($model);
        });
    }

    public static function registerServiceProviders()
    {
        App::register('\Demo\Core\Services\CommandServiceProvider');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Plugin::registerAuditListener();
        QueueModel::registerQueueListener();
        Plugin::registerServiceProviders();
    }
}
