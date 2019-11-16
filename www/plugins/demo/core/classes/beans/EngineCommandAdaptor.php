<?php


namespace Demo\Core\Classes\Beans;

use \Demo\Core\Classes\Helpers\PluginHelper;
use Demo\Core\Models\Command as CommandModel;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class EngineCommandAdaptor extends Command
{
    /**@var $command CommandModel */
    protected $command;
    /**
     * @var string The console command name.
     */
    protected $name;

    /**
     * @var string The console command description.
     */
    protected $description;


    public function __construct(CommandModel $command)
    {
        parent::__construct();
        $this->command = $command;
        $this->name = $command->slug;
        $this->description = $command->description;
    }

    /**
     * Execute the console command.
     * @return void
     */
    public function handle()
    {
        $this->command->execute();
    }

    /**
     * Get the console command arguments.
     * @return array
     */
    protected function getArguments()
    {
        return $this->command->arguments;
    }

    /**
     * Get the console command options.
     * @return array
     */
    protected function getOptions()
    {
        return $this->command->parameters;
    }

}