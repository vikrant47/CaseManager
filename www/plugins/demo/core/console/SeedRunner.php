<?php namespace Demo\Core\Console;

use Demo\Core\Classes\Beans\TwigEngine;
use Demo\Core\Classes\Helpers\PluginConnection;
use \Demo\Core\Classes\Helpers\PluginHelper;
use Demo\Core\Classes\Helpers\StringInput;
use Demo\Core\Classes\Helpers\StringOutput;
use Demo\Core\Classes\Utils\ReflectionUtil;
use Demo\Core\Models\EngineApplication;
use Demo\Core\Models\EngineSettings;
use Demo\Core\Models\PluginVersions;
use Demo\Core\Plugin;
use Illuminate\Console\Command;
use Illuminate\Console\OutputStyle;
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
    protected $application;
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

    /**@param $applicationCode string unique Code of the application */
    public function runApplicationSeeds($applications, $version, $operation, $clean = false)
    {

        foreach ($applications as $application) {
            $pluginCode = $application->plugin_code;
            $applicationConnection = PluginConnection::getConnection($pluginCode);
            $seedPath = $applicationConnection->getSeedsPath($version);
            $path = $this->option('path');
            if (empty($path)) {
                $path = $seedPath;
            }
            $path = TwigEngine::eval($path, [
                'application' => $applicationConnection->getPluginBaseDirName(),
            ]);
            if ($operation === 'dump' || $operation === 'd') {
                $this->info('***************** Dumping seeds for application ' . $application->name . 'V(' . $version . ') ******************');
                $this->info('path = ' . $path);
                $this->runDump($application, $path, $clean);
            } else if ($operation === 'fsclean' || $operation === 'fsc') { // remove seeds from filesystem
                $this->runClean($application, $path);
            } else {
                $this->info('***************** Collecting seeds for application ' . $application->name . 'V(' . $version . ') ******************');
                $seedFiles = $this->getSeedsFiles($path);
                if (count($seedFiles) === 0) {
                    $this->info('***************** No seeds  found for application ' . $application->name . 'V(' . $version . ') ******************');
                } else {
                    if ($operation === 'uninstall' || $operation === 'u') {
                        $this->runUninstall($application, $seedFiles);
                    } else if ($operation === 'install' || $operation === 'i') {
                        $this->runInstall($application, $seedFiles);
                    }
                }
            }
        }
    }

    /**@param $applicationCode string unique Code of the application */
    public function runSeeds($applicationCode, $version, $operation, $clean = false)
    {
        if (!empty($applicationCode) && $applicationCode !== 'all' && $applicationCode !== 'a') {
            $applications = Db::table('demo_core_applications')->where([
                'active' => true,
                'code' => $applicationCode,
            ])->orderBy('name', 'ASC')->get();
        } else {
            $applications = Db::table('demo_core_applications')->where([
                'active' => true,
            ])->orderBy('name', 'ASC')->get();
            if ($applications->count() === 0) {
                $applications = Db::table('system_plugin_versions')->get()->map(function ($plugin) {
                    return (object)[
                        'plugin_code' => $plugin->code,
                        'name' => $plugin->code,
                    ];
                });
            }
        }
        $this->runApplicationSeeds($applications, $version, $operation, $clean);
    }

    public function addDefaultProperties()
    {

        EngineSettings::set(['default_application_id' => 'df07f9b4-26c1-40ca-ba1f-1b77b1692b83']);
    }

    /**
     * Execute the console command.
     * @return void
     */
    public function handle()
    {
        try {
            $applications = [];
            $applicationCode = $this->argument('application');
            $version = $this->argument('version');
            if (!$version) {
                $version = 'V0.0';
            }
            $clean = $this->option('clean');
            $operation = $this->argument('operation');
            $this->runSeeds($applicationCode, $version, $operation, $clean);
        } catch (\Exception $e) {
            if (!empty($this->option('debug'))) {
                $this->error($e);
            } else {
                throw $e;
            }
        }
    }

    public function setStringOutputChannel()
    {
        $this->output = new OutputStyle(new StringInput(), new StringOutput());
    }

    public function getOutputString()
    {
        return ReflectionUtil::getPropertyValue(get_class($this->output), 'output', $this->output);
    }

    /**
     * Get the console command arguments.
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['application', InputArgument::OPTIONAL, 'Plugin Name to run seeds.'],
            ['operation', InputArgument::OPTIONAL, 'Operation - install or i  / uninstall or u.'],
            ['version', InputArgument::OPTIONAL, 'Version - version of the application , default 0.0.'],
        ];
    }

    /**
     * Get the console command options.
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['debug', null, InputOption::VALUE_OPTIONAL, 'Print debug logs on console'],
            ['clean', null, InputOption::VALUE_OPTIONAL, 'Clean the seed directory'],
            ['path', null, InputOption::VALUE_OPTIONAL, 'Path to dump the seeds ,default is seed dir in application'],
        ];
    }

    /**
     * Run "up" a seed instance.
     *
     * @param $application EngineApplication
     * @param $files
     * @return void
     */
    protected function runInstall($application, $files)
    {
        // First we will resolve a "real" instance of the seed class from this
        // seed file name. Once we have the instances we can run the actual
        // command such as "up" or "down", or we can just simulate the action.
        $this->requireFiles($files);

        foreach ($files as $file) {
            $this->info('Installing Seed from file ' . $file);
            $seed = $this->resolveToClass(
                $application->plugin_code,
                $name = $this->getSeedName($file)
            );
            $seed->install();
            $this->info('Seed installed from file ' . $file);
        }
    }

    /**
     * Run "down" a seed instance.
     *
     * @param $application EngineApplication
     * @param $files
     * @return void
     */
    protected function runUninstall($application, $files)
    {
        $this->info('Uninstalling Seeds ........... ');
        // First we will resolve a "real" instance of the seed class from this
        // seed file name. Once we have the instances we can run the actual
        // command such as "up" or "down", or we can just simulate the action.
        $this->requireFiles($files);

        foreach ($files as $file) {
            $this->info('Uninstalling Seed from file ' . $file);
            $seed = $this->resolveToClass(
                $application->plugin_code,
                $name = $this->getSeedName($file)
            );
            $seed->uninstall();
            $this->info('Seed uninstalled from file ' . $file);
        }
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
    public function resolveToClass($identifier, $file)
    {
        $identifier = explode('.', $identifier);
        $class = '\\' . $identifier[0] . '\\' . $identifier[1] . '\\Seeds\\' . Str::studly($file);
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

    public function runClean($application, $path)
    {
        $this->info('*************** Cleaning directory ***************' . $path);
        return File::deleteDirectory($path);
    }

    /**@param $application EngineApplication */
    public function runDump($application, $path, $cleanDir = false)
    {
        $identifier = $application->plugin_code;
        $corePluginConnection = PluginConnection::getConnection('Demo.Core');
        // $application = PluginVersions::where('code', $identifier)->first();
        $tableNamespace = str_replace('.', '_', strtolower($identifier));
        $this->info('Searching tables with namespace ' . $tableNamespace);
        $pluggableTables = Db::select("SELECT columns.table_name
                                FROM information_schema.columns columns
                                where columns.table_name iLike 'demo_%'
                                 and columns.column_name = 'engine_application_id'");
        $pluggableTables = $this->collectionToArray($pluggableTables, 'table_name');
        $applicationTables = Db::select("SELECT table_name
                                FROM information_schema.tables
                                where table_name iLike '" . $tableNamespace . "%' and table_name not in (:pluggableTables)",
            ['pluggableTables' => join("','", $pluggableTables)]);
        $applicationTables = $this->collectionToArray($applicationTables, 'table_name');
        if ($cleanDir) {
            $this->runClean($application, $path);
        }
        $this->dumpSeed(array_merge($pluggableTables, $applicationTables), $application, $corePluginConnection->getTemplate('seed.file.twig'), $path);
    }

    /**
     * This will dump seed file in given path for the given application
     */
    public function dumpSeed($tables, $application, $template, $path)
    {
        $seedDir = $path;
        /*$seedDir = $path . DIRECTORY_SEPARATOR . strtolower($application->code);
        File::isDirectory($seedDir) or File::makeDirectory($seedDir, 0777, true, true);*/
        foreach ($tables as $table) {
            $this->info('Searching seed for table ' . $table);
            $data = new \October\Rain\Database\Collection();
            $packagable = true;
            $columns = Db::getSchemaBuilder()->getColumnListing($table);
            if (in_array('engine_application_id', $columns)) {
                // getQuery will return result as array instead of stdclass
                $data = Db::table($table)->where('engine_application_id', $application->id)->get();
            } else {
                $data = Db::table($table)->get();
                $packagable = false;
            }
            $seedPath = $seedDir . DIRECTORY_SEPARATOR . 'seed_' . $table . '.php';
            if ($data->count() > 0) {
                $contents = TwigEngine::eval($template, [
                    'data' => array_map(function ($item) {
                        return (array)$item;
                    }, $data->toArray()),
                    'application' => $application,
                    'table' => $table,
                    'packagable' => $packagable,
                    'className' => 'Seed' . Str::studly($table),
                ]);
                File::isDirectory($seedDir) or File::makeDirectory($seedDir, 0777, true, true);
                File::put($seedPath, $contents);
                $this->info('Seed dumped for table ' . $table . ' at ' . $seedPath);
            } else {
                File::delete($seedPath);
                $this->info('No records found in table ' . $table . ' for application ' . $application->code);
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
            return $this->files->glob($path . DIRECTORY_SEPARATOR . '*_*.php');
        })->filter()->sortBy(function ($file) {
            return $this->getSeedName($file);
        })->values()->keyBy(function ($file) {
            return $this->getSeedName($file);
        })->all();
    }
}
