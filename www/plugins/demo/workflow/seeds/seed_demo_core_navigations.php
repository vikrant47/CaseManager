<?php
namespace Demo\Workflow\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Workflow d */
class SeedDemoCoreNavigations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_navigations')->insert([
            [
                                                                            "id"=>"1167df07-11a5-467e-af94-28257f1bf241",
                                                                                        "created_at"=> null,
                                                                                        "updated_at"=>"2020-05-16 07:44:41",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "label"=>"Queues",
                                                                                        "icon"=>"oc-icon-adjust",
                                                                                        "type"=>"list",
                                                                                        "active"=> 1,
                                                                                        "name"=>"queues",
                                                                                        "description"=> "",
                                                                                        "url"=> "",
                                                                                        "model"=>"Demo\Workflow\Models\Queue",
                                                                                        "list"=> null,
                                                                                        "form"=> "",
                                                                                        "view"=> null,
                                                                                        "uipage_id"=> null,
                                                                                        "record_id"=> null,
                                                                                        "dashboard_id"=> null,
                                                                                        "widget_id"=> null,
                                                                                        "plugin_id"=> 11,
                                                                                        "parent_id"=>"492e6fda-26f4-4115-aff6-b771a7220e46",
                                                                                        "sort_order"=> 5
                            ] ,            [
                                                                            "id"=>"492e6fda-26f4-4115-aff6-b771a7220e46",
                                                                                        "created_at"=>"2020-05-09 15:13:06",
                                                                                        "updated_at"=>"2020-05-16 14:24:22",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "label"=>"Workflow",
                                                                                        "icon"=>"oc-icon-folder",
                                                                                        "type"=>"folder",
                                                                                        "active"=> 1,
                                                                                        "name"=>"workflow",
                                                                                        "description"=> "",
                                                                                        "url"=> "",
                                                                                        "model"=> null,
                                                                                        "list"=> null,
                                                                                        "form"=> "",
                                                                                        "view"=> null,
                                                                                        "uipage_id"=> null,
                                                                                        "record_id"=> null,
                                                                                        "dashboard_id"=> null,
                                                                                        "widget_id"=> null,
                                                                                        "plugin_id"=> 11,
                                                                                        "parent_id"=> null,
                                                                                        "sort_order"=> 5
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_navigations')->where('plugin_id', 11)->delete();
            }
}
