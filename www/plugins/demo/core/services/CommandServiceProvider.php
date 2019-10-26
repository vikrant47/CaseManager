<?php namespace Demo\Core\Services;

use Demo\Core\Console\SeedRunner;
use Demo\Core\Models\CommandModel;
use Demo\Core\Models\EventHandlerModel;
use Illuminate\Support\Facades\App;
use October\Rain\Support\ServiceProvider;

class CommandServiceProvider extends ServiceProvider
{
    public function getCommands()
    {
        return [
            'core:run-seeds' => new SeedRunner()
        ];
    }

    public function loadFromDatabase($event, $model)
    {
        return CommandModel::where('active', 1)->get();
    }

    public function registerLocalCommands()
    {
        $commands = $this->getCommands();
        foreach ($commands as $command => $instance) {
            $this->app->singleton($command, function () use ($command, $instance) {
                return $instance;
            });
            $this->commands($command);
        }
    }

    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->registerLocalCommands();
        }
    }
}