<?php


namespace Demo\Core\Classes\Beans;

use \Demo\Core\Classes\Helpers\PluginHelper;
use Demo\Core\Models\CommandModel;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class EngineCommandAdaptor extends Command
{
    /**@var $commandModel CommandModel */
    protected $commandModel;
    /**
     * @var string The console command name.
     */
    protected $name;

    /**
     * @var string The console command description.
     */
    protected $description;


    public function __construct(CommandModel $commandModel)
    {
        parent::__construct();
        $this->commandModel = $commandModel;
        $this->name = $commandModel->slug;
        $this->description = $commandModel->description;
    }

    /**
     * Execute the console command.
     * @return void
     */
    public function handle()
    {
        $this->commandModel->execute();
    }

    /**
     * Get the console command arguments.
     * @return array
     */
    protected function getArguments()
    {
        return $this->commandModel->arguments;
    }

    /**
     * Get the console command options.
     * @return array
     */
    protected function getOptions()
    {
        return $this->commandModel->parameters;
    }

}