<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Casemanager d */
class SeedDemoCoreNavigations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_navigations')->insert([
            [
                                                                            "id"=> 54,
                                                                                        "created_at"=>"2020-05-13 04:38:17",
                                                                                        "updated_at"=>"2020-05-13 04:38:31",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "label"=>"Dashboard",
                                                                                        "type"=>"dashboard",
                                                                                        "active"=> 1,
                                                                                        "name"=>"dashboard",
                                                                                        "description"=> "",
                                                                                        "url"=> "",
                                                                                        "model"=> null,
                                                                                        "list"=> "",
                                                                                        "form"=> "",
                                                                                        "record_id"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "parent_id"=> 44,
                                                                                        "sort_order"=> 4,
                                                                                        "icon"=>"oc-icon-dashboard",
                                                                                        "dashboard_id"=> 1,
                                                                                        "widget_id"=> null
                            ] ,            [
                                                                            "id"=> 53,
                                                                                        "created_at"=>"2020-05-13 04:37:14",
                                                                                        "updated_at"=>"2020-05-13 04:39:02",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "label"=>"Case Report",
                                                                                        "type"=>"widget",
                                                                                        "active"=> 1,
                                                                                        "name"=>"case-report",
                                                                                        "description"=> "",
                                                                                        "url"=> "",
                                                                                        "model"=> null,
                                                                                        "list"=> "",
                                                                                        "form"=> "",
                                                                                        "record_id"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "parent_id"=> 44,
                                                                                        "sort_order"=> 0,
                                                                                        "icon"=>"oc-icon-book",
                                                                                        "dashboard_id"=> null,
                                                                                        "widget_id"=> 1
                            ] ,            [
                                                                            "id"=> 52,
                                                                                        "created_at"=>"2020-05-10 10:28:19",
                                                                                        "updated_at"=>"2020-05-13 05:02:57",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 2,
                                                                                        "label"=>"Youtube",
                                                                                        "type"=>"url",
                                                                                        "active"=> 1,
                                                                                        "name"=>"youtube",
                                                                                        "description"=> "",
                                                                                        "url"=>"https://www.youtube.com/embed/RBumgq5yVrA",
                                                                                        "model"=>"Demo\Report\Models\Dashboard",
                                                                                        "list"=>"\$/demo/report/models/dashboard/columns.yaml",
                                                                                        "form"=> "",
                                                                                        "record_id"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "parent_id"=> 44,
                                                                                        "sort_order"=> 5,
                                                                                        "icon"=>"oc-icon-adjust",
                                                                                        "dashboard_id"=> null,
                                                                                        "widget_id"=> null
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_navigations')->where('plugin_id', 6)->delete();
            }
}
