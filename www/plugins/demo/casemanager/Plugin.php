<?php namespace Demo\Casemanager;

use Demo\Casemanager\Models\QueueModel;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        QueueModel::registerQueueListener();
    }
}
