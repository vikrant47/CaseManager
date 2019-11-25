<?php namespace Demo\Core\Services;

use Demo\Core\Classes\Beans\EngineCommandAdaptor;
use Demo\Core\Console\SeedRunner;
use Demo\Core\Models\Command;
use Demo\Core\Models\EventHandler;
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

    public function loadFromDatabase()
    {
        return Command::where('active', 1)->get()->map(function ($command) {
            return new EngineCommandAdaptor($command);
        });
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

    public function registerDatabaseCommands()
    {
        $commands = $this->loadFromDatabase();
        foreach ($commands as $command) {
            $this->commands([$command->name => $command]);
        }
    }

    public function register()
    {
        if ($_ENV['APP_ENV'] !== 'testing' && $this->app->runningInConsole()) {
            $this->registerLocalCommands();
            $this->registerDatabaseCommands();
        }
    }
}