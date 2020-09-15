<?php


namespace Demo\Tenant\Services;


use Backend\Facades\Backend;
use Backend\Models\BrandSetting;
use Cyd293\BackendSkin\Classes\Skin;
use Demo\Core\Console\SeedRunner;
use Demo\Tenant\Models\Tenant;
use App;
use October\Rain\Exception\ApplicationException;
use October\Rain\Support\ServiceProvider;
use DB;
use System\Classes\UpdateManager;
use Config;

class TenantService extends ServiceProvider
{

    protected $originalDatabase;

    public function __construct($app)
    {
        parent::__construct($app);
        $this->originalDatabase = Config::get('database.default');
    }

    public function close()
    {
        $this->setDefaultDatabaseConnection($this->originalDatabase);
    }

    /**
     * Connect to the given tenant database
     * @param $tenant string
     */
    public function connect($tenant)
    {
        $this->configureConnectionByName($tenant);
        $this->setDefaultDatabaseConnection($tenant);
    }

    /**
     * Creates a new database schema.
     * @param string $schemaName The new schema name.
     * @return bool
     */
    public function createDatabase($schemaName)
    {
        // We will use the `statement` method from the connection class so that
        // we have access to parameter binding.
        DB::statement(DB::raw('CREATE DATABASE ' . $schemaName));
    }

    /**
     * Drops a new database schema.
     * @param string $schemaName The new schema name.
     * @return bool
     */
    public function dropDatabase($schemaName)
    {
        // We will use the `statement` method from the connection class so that
        // we have access to parameter binding.
        DB::statement(DB::raw('DROP DATABASE ' . $schemaName));
    }

    /**
     * Configures a tenant's database connection.
     * @param string $tenantName The database name.
     * @return void
     */
    public function configureConnectionByName($tenantName)
    {
        // Just get access to the config.
        $config = App::make('config');

        // Will contain the array of connections that appear in our database config file.
        $connections = $config->get('database.connections');

        // This line pulls out the default connection by key (by default it's `mysql`)
        $defaultConnection = $connections[$config->get('database.default')];

        // Now we simply copy the default connection information to our new connection.
        $newConnection = $defaultConnection;
        // Override the database name.
        $newConnection['database'] = $tenantName;

        // This will add our new connection to the run-time configuration for the duration of the request.
        App::make('config')->set('database.connections.' . $tenantName, $newConnection);

    }

    /**@var $tenant Tenant */
    public function createTenantDatabase($tenant)
    {
        self::createDatabase($tenant->code);
        self::configureConnectionByName($tenant->code);
    }

    /**
     * @param null $output
     */
    public function runMigration($output = null)
    {

        DB::transaction(function () use ($output) {
            UpdateManager::instance()
                ->setNotesOutput($output)
                ->update();
        });

    }

    /*** @param $applications string[] */
    public function runSeeds($applications)
    {
        DB::transaction(function () use ($applications) {
            $seedRunner = new SeedRunner();
            $seedRunner->setStringOutputChannel();
            $seedRunner->runApplicationSeeds($applications, 'V0.0', 'insert');
            // throw new ApplicationException($seedRunner->getOutputString());
        });
    }

    /**Push all tenant db config from database to laravel config object*/
    public function pushTenantsDatabaseConfiguration()
    {
        $tenants = Tenant::where(['active' => true])->get();
        foreach ($tenants as $tenant) {
            self::configureConnectionByName($tenant->code);
        }
    }

    /**@var $tenant Tenant */
    public function pushTenantDatabaseConfiguration($tenant)
    {
        self::configureConnectionByName($tenant->code);
    }

    /**@var $tenant Tenant */
    public function getConnection($tenant)
    {

    }

    /**@var $databaseName string */
    public function setDefaultDatabaseConnection($databaseName)
    {
        Config::set('database.default', $databaseName);
        DB::setDefaultConnection($databaseName);
    }

    /**
     * @param $tenant Tenant
     * @param $controllerType string
     * @return string
     */
    public static function generateUrl($tenant, $controllerType)
    {
        $url = Backend::url(str_replace('\\', '/', strtolower(str_replace('\\Controllers', '', $controllerType))));
        $index = strpos($url, '/backend');
        if ($index !== false) {
            $url = '/tenant/' . $tenant->code . substr($url, $index + 8);
        }
        return $url;
    }

    /**
     * @param $settings array brand settings
     */
    public function setBrandSettings($settings = [])
    {
        DB::transaction(function () use ($settings) {
            $brandSettings = BrandSetting::instance();
            foreach ($settings as $key => $setting) {
                $brandSettings->setSettingsValue($key, $setting);
            }
            $brandSettings->save();
        });
    }

    /**
     * @param $theme string Name of the theme
     */
    public function setTheme($theme)
    {
        DB::transaction(function () use ($theme) {
            Skin::setActiveSkin($theme);
        });
    }
}