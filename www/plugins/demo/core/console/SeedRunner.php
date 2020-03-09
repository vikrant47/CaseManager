<?php namespace Demo\Core\Console;

use \Demo\Core\Classes\Helpers\PluginHelper;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class SeedRunner extends Command
{
    protected $plugin;
    protected $files;
    /**
     * @var string The console command name.
     */
    protected $name = 'core:run-seeds';

    /**
     * @var string The console command description.
     */
    protected $description = 'Run all seeds in seed directory.';

    /**
     * SeedRunner constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->files = new Filesystem();
    }

    /**
     * Execute the console command.
     * @return void
     */
    public function handle()
    {
        $seedPath = $this->getSeedsPath();
        $this->info('Collecting seeds files from path ' . $seedPath);
        $seedFiles = $this->getSeedsFiles($seedPath);
        $operation = $this->argument('operation');
        if ($operation === 'uninstall' || $operation === 'u') {
            $this->runUninstall($seedFiles);
        } else {
            $this->runInstall($seedFiles);
        }
    }

    /**
     * Get the console command arguments.
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['plugin', InputArgument::OPTIONAL, 'Plugin Name to run seeds.'],
            ['operation', InputArgument::OPTIONAL, 'Operation - install or i  / uninstall or u.'],
        ];
    }

    /**
     * Get the console command options.
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }

    /**
     * Run "up" a seed instance.
     *
     * @param string $file
     * @param int $batch
     * @param bool $pretend
     * @return void
     */
    protected function runInstall($files)
    {
        $this->info('Installing Seeds ........... ');
        // First we will resolve a "real" instance of the seed class from this
        // seed file name. Once we have the instances we can run the actual
        // command such as "up" or "down", or we can just simulate the action.
        $this->requireFiles($files);

        foreach ($files as $file) {
            $this->info('Installing Seed from file ' . $file);
            $seed = $this->resolveToClass(
                $name = $this->getSeedName($file)
            );
            $seed->install();
            $this->info('Seed installed from file ' . $file);
        }
    }

    /**
     * Run "down" a seed instance.
     *
     * @param string $file
     * @param int $batch
     * @param bool $pretend
     * @return void
     */
    protected function runUninstall($files)
    {
        $this->info('Uninstalling Seeds ........... ');
        // First we will resolve a "real" instance of the seed class from this
        // seed file name. Once we have the instances we can run the actual
        // command such as "up" or "down", or we can just simulate the action.
        $this->requireFiles($files);

        foreach ($files as $file) {
            $this->info('Uninstalling Seed from file ' . $file);
            $seed = $this->resolveToClass(
                $name = $this->getSeedName($file)
            );
            $seed->uninstall();
            $this->info('Seed uninstalled from file ' . $file);
        }
    }

    /**
     * Get the path to the seed directory.
     *
     * @return string
     */
    protected function getSeedsPath()
    {
        $plugin = $this->getPlugin();
        $paths = explode('.', $plugin);
        $path = $this->laravel->basePath() . DIRECTORY_SEPARATOR
            . 'plugins' . DIRECTORY_SEPARATOR
            . strtolower($paths[0]) . DIRECTORY_SEPARATOR
            . strtolower($paths[1]) . DIRECTORY_SEPARATOR . 'seeds';

        return $path;
    }

    protected function getPlugin()
    {
        $plugin = $this->argument('plugin');
        if (empty($plugin)) {
            $plugin = 'Demo.Core';
        }
        return $plugin;
    }

    /**
     * Require in all the seed files in a given path.
     *
     * @param array $files
     * @return void
     */
    public function requireFiles(array $files)
    {
        foreach ($files as $file) {
            $this->info('Loading file ' . $file . ' , status = ' . json_encode(file_exists($file) == 1));
            $this->files->requireOnce($file);
        }
    }

    /**
     * Resolve a seed instance from a file.
     *
     * @param string $file
     * @return object
     */
    public function resolveToClass($file)
    {
        $plugin = $this->getPlugin();
        $plugin = explode('.', $plugin);
        $class = '\\' . $plugin[0] . '\\' . $plugin[1] . '\\Seeds\\' . Str::studly($file);
        $this->info('Loading class ' . $class . '');
        return new $class;
    }

    /**
     * Get the name of the seed.
     *
     * @param string $path
     * @return string
     */
    public function getSeedName($path)
    {
        return str_replace('.php', '', basename($path));
    }

    /**
     * Get all of the seed files in a given path.
     *
     * @param string|array $paths
     * @return array
     */
    public function getSeedsFiles($paths)
    {
        return Collection::make($paths)->flatMap(function ($path) {
            return $this->files->glob($path . DIRECTORY_SEPARATOR . '*_*.php');
        })->filter()->sortBy(function ($file) {
            return $this->getSeedName($file);
        })->values()->keyBy(function ($file) {
            return $this->getSeedName($file);
        })->all();
    }
}