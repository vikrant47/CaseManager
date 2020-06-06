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
                                                                            "created_at"=> null,
                                                                                        "updated_at"=>"2020-05-16 07:44:41",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "label"=>"Queues",
                                                                                        "type"=>"list",
                                                                                        "active"=> 1,
                                                                                        "name"=>"queues",
                                                                                        "description"=> "",
                                                                                        "url"=> "",
                                                                                        "model"=>"Demo\Workflow\Models\Queue",
                                                                                        "view"=> null,
                                                                                        "form"=> "",
                                                                                        "plugin_id"=> 11,
                                                                                        "sort_order"=> 5,
                                                                                        "icon"=>"oc-icon-adjust",
                                                                                        "id"=>"1167df07-11a5-467e-af94-28257f1bf241",
                                                                                        "record_id"=> null,
                                                                                        "parent_id"=>"492e6fda-26f4-4115-aff6-b771a7220e46",
                                                                                        "dashboard_id"=> null,
                                                                                        "widget_id"=> null,
                                                                                        "uipage_id"=> null
                            ] ,            [
                                                                            "created_at"=>"2020-05-09 15:13:06",
                                                                                        "updated_at"=>"2020-05-16 14:24:22",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "label"=>"Workflow",
                                                                                        "type"=>"folder",
                                                                                        "active"=> 1,
                                                                                        "name"=>"workflow",
                                                                                        "description"=> "",
                                                                                        "url"=> "",
                                                                                        "model"=> null,
                                                                                        "view"=> null,
                                                                                        "form"=> "",
                                                                                        "plugin_id"=> 11,
                                                                                        "sort_order"=> 5,
                                                                                        "icon"=>"oc-icon-recycle",
                                                                                        "id"=>"492e6fda-26f4-4115-aff6-b771a7220e46",
                                                                                        "record_id"=> null,
                                                                                        "parent_id"=> null,
                                                                                        "dashboard_id"=> null,
                                                                                        "widget_id"=> null,
                                                                                        "uipage_id"=> null
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_navigations')->where('plugin_id', 11)->delete();
            }
}
