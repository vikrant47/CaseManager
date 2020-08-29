<?php
namespace Demo\Report\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Report d */
class SeedDemoCoreModels implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_models')->insert([
            [
                                                                            "id"=>"2992b3f4-859b-41aa-b340-c2ebb85346d3",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Widget",
                                                                                        "model"=>"Demo\Report\Models\Widget",
                                                                                        "controller"=>"Demo\Report\Controllers\WidgetController",
                                                                                        "plugin_id"=> "cf0c66c7-12c9-43df-813c-14aeafdf6ae1",
                                                                                        "audit"=> false,
                                                                                        "viewable"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\"*\"]",
                                                                                        "description"=> null,
                                                                                        "attach_audited_by"=> 1
                            ] ,            [
                                                                            "id"=>"04da8041-7f96-4d23-bee5-9ca58dc6d12b",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Dashboard",
                                                                                        "model"=>"Demo\Report\Models\Dashboard",
                                                                                        "controller"=>"Demo\Report\Controllers\DashboardController",
                                                                                        "plugin_id"=> "cf0c66c7-12c9-43df-813c-14aeafdf6ae1",
                                                                                        "audit"=> false,
                                                                                        "viewable"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\"*\"]",
                                                                                        "description"=> null,
                                                                                        "attach_audited_by"=> 1
                            ] ,            [
                                                                            "id"=>"032584e9-f55f-4a0b-8451-b451f236726b",
                                                                                        "created_at"=>"2020-05-29 08:12:47",
                                                                                        "updated_at"=>"2020-05-29 08:12:47",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Service Channel",
                                                                                        "model"=>"Demo\Workflow\Models\ServiceChannel",
                                                                                        "controller"=>"Demo\Workflow\Controllers\ServiceChannelController",
                                                                                        "plugin_id"=> "cf0c66c7-12c9-43df-813c-14aeafdf6ae1",
                                                                                        "audit"=> false,
                                                                                        "viewable"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=> 0,
                                                                                        "description"=> "",
                                                                                        "attach_audited_by"=> false
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_models')->where('plugin_id', 14)->delete();
            }
}
