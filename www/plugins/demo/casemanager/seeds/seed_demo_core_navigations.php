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
                                                                            "created_at"=>"2020-05-10 10:28:19",
                                                                                        "updated_at"=>"2020-05-16 14:59:12",
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
                                                                                        "view"=> null,
                                                                                        "form"=> "",
                                                                                        "plugin_id"=> 6,
                                                                                        "sort_order"=> 5,
                                                                                        "icon"=>"oc-icon-adjust",
                                                                                        "id"=>"ed44650b-b008-456c-85de-adc1270cfbed",
                                                                                        "record_id"=> null,
                                                                                        "parent_id"=>"3280cd3c-8a95-4683-b661-7846bc9fdf03",
                                                                                        "dashboard_id"=> null,
                                                                                        "widget_id"=> null,
                                                                                        "uipage_id"=> null
                            ] ,            [
                                                                            "created_at"=> null,
                                                                                        "updated_at"=>"2020-05-31 13:33:07",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "label"=>"All Cases",
                                                                                        "type"=>"list",
                                                                                        "active"=> 1,
                                                                                        "name"=>"all-cases",
                                                                                        "description"=> "",
                                                                                        "url"=> "",
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "view"=> "",
                                                                                        "form"=> "",
                                                                                        "plugin_id"=> 6,
                                                                                        "sort_order"=> 0,
                                                                                        "icon"=>"oc-icon-ambulance",
                                                                                        "id"=>"01f868fa-2ac6-42c1-b5e0-030df343dd31",
                                                                                        "record_id"=> null,
                                                                                        "parent_id"=>"3280cd3c-8a95-4683-b661-7846bc9fdf03",
                                                                                        "dashboard_id"=> null,
                                                                                        "widget_id"=> null,
                                                                                        "uipage_id"=> null
                            ] ,            [
                                                                            "created_at"=>"2020-05-18 04:33:41",
                                                                                        "updated_at"=>"2020-05-31 13:39:19",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "label"=>"My Cases",
                                                                                        "type"=>"list",
                                                                                        "active"=> 1,
                                                                                        "name"=>"my-cases",
                                                                                        "description"=> "",
                                                                                        "url"=>"list=mycases",
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "view"=> "",
                                                                                        "form"=> "",
                                                                                        "plugin_id"=> 6,
                                                                                        "sort_order"=> 0,
                                                                                        "icon"=>"oc-icon-briefcase",
                                                                                        "id"=>"c3984be1-820c-4cc8-a675-742815313468",
                                                                                        "record_id"=> null,
                                                                                        "parent_id"=>"3280cd3c-8a95-4683-b661-7846bc9fdf03",
                                                                                        "dashboard_id"=> null,
                                                                                        "widget_id"=> null,
                                                                                        "uipage_id"=> null
                            ] ,            [
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
                                                                                        "view"=> null,
                                                                                        "form"=> "",
                                                                                        "plugin_id"=> 6,
                                                                                        "sort_order"=> 4,
                                                                                        "icon"=>"oc-icon-dashboard",
                                                                                        "id"=>"81d30c41-fd09-4757-a6f9-e92463faf8bc",
                                                                                        "record_id"=> null,
                                                                                        "parent_id"=>"3280cd3c-8a95-4683-b661-7846bc9fdf03",
                                                                                        "dashboard_id"=> null,
                                                                                        "widget_id"=> null,
                                                                                        "uipage_id"=> null
                            ] ,            [
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
                                                                                        "view"=> null,
                                                                                        "form"=> "",
                                                                                        "plugin_id"=> 6,
                                                                                        "sort_order"=> 0,
                                                                                        "icon"=>"oc-icon-book",
                                                                                        "id"=>"6f85afbb-3858-4387-b4ce-9f70cf19ed20",
                                                                                        "record_id"=> null,
                                                                                        "parent_id"=>"3280cd3c-8a95-4683-b661-7846bc9fdf03",
                                                                                        "dashboard_id"=> null,
                                                                                        "widget_id"=> null,
                                                                                        "uipage_id"=> null
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_navigations')->where('plugin_id', 6)->delete();
            }
}
