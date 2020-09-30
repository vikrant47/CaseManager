<?php
namespace Demo\Workflow\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds workflow d */
class SeedDemoCoreNavigations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_navigations')->insert([
            [
                                                                            "id"=>"05443970-02d3-11eb-ae0e-9fa04abb3d8f",
                                                                                        "created_at"=>"2020-09-30 04:11:31",
                                                                                        "updated_at"=>"2020-09-30 04:11:31",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "label"=>"Queue",
                                                                                        "icon"=>"oc-icon-th-list",
                                                                                        "type"=>"folder",
                                                                                        "active"=> 1,
                                                                                        "name"=>"queue",
                                                                                        "description"=> "",
                                                                                        "url"=> "",
                                                                                        "model"=> null,
                                                                                        "list"=> "",
                                                                                        "form"=> null,
                                                                                        "view"=> "",
                                                                                        "uipage_id"=> null,
                                                                                        "record_id"=> null,
                                                                                        "dashboard_id"=> null,
                                                                                        "widget_id"=> null,
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "parent_id"=> null,
                                                                                        "sort_order"=> 2,
                                                                                        "position"=>"sidebar",
                                                                                        "script"=> "",
                                                                                        "tooltip"=>"queue",
                                                                                        "nav_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83"
                            ] ,            [
                                                                            "id"=>"492e6fda-26f4-4115-aff6-b771a7220e46",
                                                                                        "created_at"=>"2020-05-09 15:13:06",
                                                                                        "updated_at"=>"2020-09-30 04:19:20",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "label"=>"Workflow",
                                                                                        "icon"=>"oc-icon-puzzle-piece",
                                                                                        "type"=>"folder",
                                                                                        "active"=> 1,
                                                                                        "name"=>"workflow",
                                                                                        "description"=> "",
                                                                                        "url"=> "",
                                                                                        "model"=> null,
                                                                                        "list"=> "",
                                                                                        "form"=> "",
                                                                                        "view"=> "",
                                                                                        "uipage_id"=> null,
                                                                                        "record_id"=> null,
                                                                                        "dashboard_id"=> null,
                                                                                        "widget_id"=> null,
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "parent_id"=> null,
                                                                                        "sort_order"=> 5,
                                                                                        "position"=>"sidebar",
                                                                                        "script"=> "",
                                                                                        "tooltip"=> "",
                                                                                        "nav_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83"
                            ] ,            [
                                                                            "id"=>"1167df07-11a5-467e-af94-28257f1bf241",
                                                                                        "created_at"=> null,
                                                                                        "updated_at"=>"2020-09-30 04:12:27",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "label"=>"Queues",
                                                                                        "icon"=>"oc-icon-stack-overflow",
                                                                                        "type"=>"list",
                                                                                        "active"=> 1,
                                                                                        "name"=>"queues",
                                                                                        "description"=> "",
                                                                                        "url"=> "",
                                                                                        "model"=>"Demo\Workflow\Models\Queue",
                                                                                        "list"=> "",
                                                                                        "form"=> "",
                                                                                        "view"=> "",
                                                                                        "uipage_id"=> null,
                                                                                        "record_id"=> null,
                                                                                        "dashboard_id"=> null,
                                                                                        "widget_id"=> null,
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "parent_id"=>"05443970-02d3-11eb-ae0e-9fa04abb3d8f",
                                                                                        "sort_order"=> 5,
                                                                                        "position"=>"sidebar",
                                                                                        "script"=> "",
                                                                                        "tooltip"=> "",
                                                                                        "nav_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_navigations')->where('engine_application_id', '8374144e-94a5-470d-8d9e-4cbad05102ad')->delete();
            }
}
