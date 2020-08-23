<?php
namespace Demo\Tenant\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Tenant d */
class SeedDemoCoreModels implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_models')->insert([
            [
                                                                            "id"=>"74359f60-df01-11ea-8ee1-8bbb436e69b5",
                                                                                        "created_at"=>"2020-08-15 14:13:13",
                                                                                        "updated_at"=>"2020-08-15 14:13:13",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Tenant",
                                                                                        "model"=>"Demo\Tenant\Models\Tenant",
                                                                                        "controller"=>"Demo\Tenant\Controllers\TenantController",
                                                                                        "plugin_id"=> 12,
                                                                                        "audit"=> false,
                                                                                        "viewable"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"*",
                                                                                        "description"=> "",
                                                                                        "attach_audited_by"=> false
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_models')->where('plugin_id', 12)->delete();
            }
}
