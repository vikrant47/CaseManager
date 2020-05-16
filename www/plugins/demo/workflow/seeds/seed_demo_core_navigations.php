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
                                                                            "id"=> 40,
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
                                                                                        "list"=>"\$/demo/workflow/models/queue/columns.yaml",
                                                                                        "form"=> "",
                                                                                        "record_id"=> null,
                                                                                        "plugin_id"=> 11,
                                                                                        "parent_id"=> 34,
                                                                                        "sort_order"=> 5,
                                                                                        "icon"=>"oc-icon-adjust",
                                                                                        "dashboard_id"=> null,
                                                                                        "widget_id"=> null,
                                                                                        "uipage_id"=> null
                            ] ,            [
                                                                            "id"=> 34,
                                                                                        "created_at"=>"2020-05-09 15:13:06",
                                                                                        "updated_at"=>"2020-05-16 07:46:22",
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
                                                                                        "list"=> "",
                                                                                        "form"=> "",
                                                                                        "record_id"=> null,
                                                                                        "plugin_id"=> 11,
                                                                                        "parent_id"=> 50,
                                                                                        "sort_order"=> 5,
                                                                                        "icon"=>"oc-icon-recycle",
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
