<?php
namespace Demo\Core\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Core d */
class SeedDemoCoreModels implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_models')->insert([
            [
                                                                            "id"=> 501,
                                                                                        "created_at"=>"2020-04-26 07:09:40",
                                                                                        "updated_at"=>"2020-04-26 07:09:40",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"List Action",
                                                                                        "model"=>"Demo\Core\Models\ListAction",
                                                                                        "controller"=>"Demo\Core\Controllers\ListActionController",
                                                                                        "plugin_id"=> 2,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=> 0,
                                                                                        "description"=> "",
                                                                                        "attach_audited_by"=> false,
                                                                                        "viewable"=> 1
                            ] ,            [
                                                                            "id"=> 502,
                                                                                        "created_at"=>"2020-04-26 07:16:16",
                                                                                        "updated_at"=>"2020-04-26 07:16:16",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Form Action",
                                                                                        "model"=>"Demo\Core\Models\FormAction",
                                                                                        "controller"=>"Deom\Core\Cotrollers\FormActionController",
                                                                                        "plugin_id"=> 2,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=> 0,
                                                                                        "description"=> "",
                                                                                        "attach_audited_by"=> false,
                                                                                        "viewable"=> 1
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_models')->where('plugin_id', 2)->delete();
            }
}
