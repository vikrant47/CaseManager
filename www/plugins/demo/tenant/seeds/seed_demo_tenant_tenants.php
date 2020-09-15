<?php
namespace Demo\Tenant\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds tenant d */
class SeedDemoTenantTenants implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_tenant_tenants')->insert([
            [
                                                                            "id"=>"32ad38eb-e4c2-46e2-aab4-c31debfe5f92",
                                                                                        "name"=>"Default",
                                                                                        "code"=>"default",
                                                                                        "description"=> null,
                                                                                        "active"=> 1,
                                                                                        // "logo"=> "",
                                                                                        "default_theme"=> "",
                                                                                        "created_at"=>"2020-08-29 15:59:45",
                                                                                        "updated_at"=>"2020-08-29 15:59:49",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "engine_application_id"=>"801c3e91-8be6-402e-9872-69d6ea29fe06"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_tenant_tenants')->where('engine_application_id', '801c3e91-8be6-402e-9872-69d6ea29fe06')->delete();
            }
}
