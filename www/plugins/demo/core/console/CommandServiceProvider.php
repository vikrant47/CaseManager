<?php namespace Demo\Core\Console;

use October\Rain\Support\ServiceProvider;

class CommandServiceProvider extends ServiceProvider
{
    public function getCommands()
    {
        return [
            'core:run-seeds' => new SeedRunner()
        ];
    }

    public function register()
    {
        $commands = $this->getCommands();
        foreach ($commands as $command => $instance) {
            $this->app->singleton($command, function () use ($command, $instance) {
                return $instance;
            });
            $this->commands($command);
        }
    }
}