<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds casemanager d */
class SeedDemoTenantTenants implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_tenant_tenants')->insert([
            [
                                                                            "id"=>"ac21b010-ef78-11ea-b1ec-1192ca1b9447",
                                                                                        "name"=>"Delete Me Tenant2",
                                                                                        "code"=>"delete_me_tenant2",
                                                                                        "description"=> "",
                                                                                        "active"=> 1,
                                                                                        "brand_setting_logo"=> null,
                                                                                        "default_theme"=>"nobleui",
                                                                                        "created_at"=> null,
                                                                                        "updated_at"=> null,
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "brand_setting_favicon"=> null,
                                                                                        "brand_setting_app_name"=>"Hello World",
                                                                                        "brand_setting_app_tagline"=>"Delete Me Tenant"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_tenant_tenants')->where('engine_application_id', 'df07f9b4-26c1-40ca-ba1f-1b77b1692b83')->delete();
            }
}
