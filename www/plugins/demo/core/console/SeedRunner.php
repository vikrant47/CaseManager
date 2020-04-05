<?php namespace Demo\Core\Console;

use Demo\Core\Classes\Beans\TwigEngine;
use Demo\Core\Classes\Helpers\PluginConnection;
use \Demo\Core\Classes\Helpers\PluginHelper;
use Demo\Core\Models\PluginVersions;
use Demo\Core\Plugin;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Db;
use File;

class SeedRunner extends Command
{
    protected $dumpSeedPath;
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
        try {
            $plugins = [];
            $plugin = $this->argument('plugin');
            if (!empty($plugin) && $plugin !== 'all') {
                $plugins[] = $plugin;
            } else {
                $plugins = Db::table('system_plugin_versions')->where('code', 'like', 'Demo%')->orderBy('id', 'ASC')->get(['code'])
                    ->map(function ($plugin) {
                        return $plugin->code;
                    });
            }
            foreach ($plugins as $plugin) {
                $operation = $this->argument('operation');
                if ($operation === 'dump' || $operation === 'd') {
                    $path = $this->argument('path');
                    if (empty($path)) {
                        $path = storage_path() . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR . 'seeds';
                    }
                    $this->info('***************** Dumping seeds for plugin ' . $plugin . ' ******************');
                    $this->info('path = ' . $path);
                    $this->runDump($plugin, $path);
                } else {
                    $this->info('***************** Collecting seeds for plugin ' . $plugin . ' ******************');
                    $seedPath = $this->getSeedsPath($plugin);
                    $seedFiles = $this->getSeedsFiles($seedPath);
                    if ($operation === 'uninstall' || $operation === 'u') {
                        $this->runUninstall($plugin, $seedFiles);
                    } else {
                        $this->runInstall($plugin, $seedFiles);
                    }
                }
            }
        } catch (\Exception $e) {
            if (!empty($this->option('debug'))) {
                $this->error($e);
            } else {
                throw $e;
            }
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
            ['path', InputArgument::OPTIONAL, 'Path to dump the seeds ,default is ' . $this->dumpSeedPath],
        ];
    }

    /**
     * Get the console command options.
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['debug', null, InputOption::VALUE_OPTIONAL, 'Print debug logs on console']
        ];
    }

    /**
     * Run "up" a seed instance.
     *
     * @param string $file
     * @param int $batch
     * @param bool $pretend
     * @return void
     */
    protected function runInstall($plugin, $files)
    {
        // First we will resolve a "real" instance of the seed class from this
        // seed file name. Once we have the instances we can run the actual
        // command such as "up" or "down", or we can just simulate the action.
        $this->requireFiles($files);

        foreach ($files as $file) {
            $this->info('Installing Seed from file ' . $file);
            $seed = $this->resolveToClass(
                $plugin,
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
    protected function runUninstall($plugin, $files)
    {
        $this->info('Uninstalling Seeds ........... ');
        // First we will resolve a "real" instance of the seed class from this
        // seed file name. Once we have the instances we can run the actual
        // command such as "up" or "down", or we can just simulate the action.
        $this->requireFiles($files);

        foreach ($files as $file) {
            $this->info('Uninstalling Seed from file ' . $file);
            $seed = $this->resolveToClass(
                $plugin,
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
    protected function getSeedsPath($plugin)
    {
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
    public function resolveToClass($plugin, $file)
    {
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

    public function collectionToArray($collection, $field)
    {
        return array_map(function ($table) use ($field) {
            return $table->{$field};
        }, $collection);
    }

    public function runDump($identifier, $path)
    {
        $corePluginConnection = PluginConnection::getConnection('Demo.Core');
        $plugin = PluginVersions::where('code', $identifier)->first();
        $tableNamespace = str_replace('.', '_', strtolower($plugin->code));
        $this->info('Searching tables with namespace ' . $tableNamespace);
        $pluggableTables = Db::select("SELECT columns.table_name
                                FROM information_schema.columns columns
                                where columns.table_name iLike 'demo_%'
                                 and columns.column_name = 'plugin_id'");
        $pluggableTables = $this->collectionToArray($pluggableTables, 'table_name');
        $pluginTables = Db::select("SELECT table_name
                                FROM information_schema.tables 
                                where table_name iLike '" . $tableNamespace . "%' and table_name not in (:pluggableTables)",
            ['pluggableTables' => join("','",$pluggableTables)]);
        $pluginTables = $this->collectionToArray($pluginTables, 'table_name');
        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);
        $this->dumpSeed(array_merge($pluggableTables, $pluginTables), $plugin, $corePluginConnection->getTemplate('seed.file.twig'), $path);
    }

    /**
     * This will dump seed file in given path for the given plugin
     */
    public function dumpSeed($tables, $plugin, $template, $path)
    {
        $seedDir = $path . DIRECTORY_SEPARATOR . strtolower($plugin->code);
        File::isDirectory($seedDir) or File::makeDirectory($seedDir, 0777, true, true);
        foreach ($tables as $table) {
            $this->info('Searching seed for table ' . $table);
            $data = new \October\Rain\Database\Collection();
            $packagable = true;
            $columns = Db::getSchemaBuilder()->getColumnListing($table);
            if (in_array('plugin_id', $columns)) {
                // getQuery will return result as array instead of stdclass
                $data = Db::table($table)->where('plugin_id', $plugin->id)->get();
            } else {
                $data = Db::table($table)->get();
                $packagable = false;
            }
            if ($data->count() > 0) {
                $contents = TwigEngine::eval($template, [
                    'data' => array_map(function ($item) {
                        return (array)$item;
                    }, $data->toArray()),
                    'plugin' => $plugin,
                    'table' => $table,
                    'packagable' => $packagable,
                    'className' => 'Seed' . Str::studly($table),
                ]);
                $seedPath = $seedDir . DIRECTORY_SEPARATOR . 'seed_' . $table . '.php';
                File::put($seedPath, $contents);
                $this->info('Seed dumped for table ' . $table . ' at ' . $seedPath);
            } else {
                $this->info('No records found in table ' . $table . ' for plugin ' . $plugin->code);
            }
        }
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
            return $this->files->glob($path . DIRECTORY_SEPARATOR . ' * _ *.php');
        })->filter()->sortBy(function ($file) {
            return $this->getSeedName($file);
        })->values()->keyBy(function ($file) {
            return $this->getSeedName($file);
        })->all();
    }
}