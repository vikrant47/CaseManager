<?php


namespace Demo\Tenant\Services;


use Demo\Core\Console\SeedRunner;
use Demo\Tenant\Models\Tenant;
use App;
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
     * @param $tenant
     * @param null $output
     */
    public function runMigration($tenant, $output = null)
    {
        $this->pushTenantDatabaseConfiguration($tenant);
        $this->setDefaultDatabaseConnection($tenant->code);
        DB::transaction(function () use ($output) {
            UpdateManager::instance()
                ->setNotesOutput($output)
                ->update();
        });
        $this->setDefaultDatabaseConnection($this->originalDatabase);
    }

    /**@var $tenant Tenant */
    public function runSeeds($tenant)
    {
        $this->pushTenantDatabaseConfiguration($tenant);
        $this->setDefaultDatabaseConnection($tenant->code);
        DB::transaction(function () {
            $seedRunner = new SeedRunner();
            $seedRunner->runSeeds(['plugin' => 'all', 'operation' => 'install'], []);
        });
        $this->setDefaultDatabaseConnection($this->originalDatabase);
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
}