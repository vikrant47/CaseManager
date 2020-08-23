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
                                                                            "id"=>"ed44650b-b008-456c-85de-adc1270cfbed",
                                                                                        "created_at"=>"2020-05-10 10:28:19",
                                                                                        "updated_at"=>"2020-05-16 14:59:12",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 2,
                                                                                        "label"=>"Youtube",
                                                                                        "icon"=>"oc-icon-adjust",
                                                                                        "type"=>"url",
                                                                                        "active"=> 1,
                                                                                        "name"=>"youtube",
                                                                                        "description"=> "",
                                                                                        "url"=>"https://www.youtube.com/embed/RBumgq5yVrA",
                                                                                        "model"=>"Demo\Report\Models\Dashboard",
                                                                                        "list"=> null,
                                                                                        "form"=> "",
                                                                                        "view"=> null,
                                                                                        "uipage_id"=> null,
                                                                                        "record_id"=> null,
                                                                                        "dashboard_id"=> null,
                                                                                        "widget_id"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "parent_id"=>"3280cd3c-8a95-4683-b661-7846bc9fdf03",
                                                                                        "sort_order"=> 5
                            ] ,            [
                                                                            "id"=>"01f868fa-2ac6-42c1-b5e0-030df343dd31",
                                                                                        "created_at"=> null,
                                                                                        "updated_at"=>"2020-06-07 06:06:40",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "label"=>"All Cases",
                                                                                        "icon"=>"oc-icon-ambulance",
                                                                                        "type"=>"list",
                                                                                        "active"=> 1,
                                                                                        "name"=>"all-cases",
                                                                                        "description"=> "",
                                                                                        "url"=> "",
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "list"=> null,
                                                                                        "form"=> "",
                                                                                        "view"=> "",
                                                                                        "uipage_id"=> null,
                                                                                        "record_id"=> null,
                                                                                        "dashboard_id"=> null,
                                                                                        "widget_id"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "parent_id"=>"3280cd3c-8a95-4683-b661-7846bc9fdf03",
                                                                                        "sort_order"=> 0
                            ] ,            [
                                                                            "id"=>"c3984be1-820c-4cc8-a675-742815313468",
                                                                                        "created_at"=>"2020-05-18 04:33:41",
                                                                                        "updated_at"=>"2020-07-13 11:25:02",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "label"=>"My Cases",
                                                                                        "icon"=>"oc-icon-briefcase",
                                                                                        "type"=>"list",
                                                                                        "active"=> 1,
                                                                                        "name"=>"my-cases",
                                                                                        "description"=> "",
                                                                                        "url"=> "",
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "list"=>"\$/demo/casemanager/models/casemodel/my_case_columns.yaml",
                                                                                        "form"=> "",
                                                                                        "view"=> "",
                                                                                        "uipage_id"=> null,
                                                                                        "record_id"=> null,
                                                                                        "dashboard_id"=> null,
                                                                                        "widget_id"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "parent_id"=>"3280cd3c-8a95-4683-b661-7846bc9fdf03",
                                                                                        "sort_order"=> 0
                            ] ,            [
                                                                            "id"=>"6f85afbb-3858-4387-b4ce-9f70cf19ed20",
                                                                                        "created_at"=>"2020-05-13 04:37:14",
                                                                                        "updated_at"=>"2020-06-14 06:00:06",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "label"=>"Case Report",
                                                                                        "icon"=>"oc-icon-book",
                                                                                        "type"=>"widget",
                                                                                        "active"=> 1,
                                                                                        "name"=>"case-report",
                                                                                        "description"=> "",
                                                                                        "url"=> "",
                                                                                        "model"=> null,
                                                                                        "list"=> null,
                                                                                        "form"=> "",
                                                                                        "view"=> "",
                                                                                        "uipage_id"=> null,
                                                                                        "record_id"=> null,
                                                                                        "dashboard_id"=> null,
                                                                                        "widget_id"=>"84383d11-89c6-4dac-906c-bb2b08923b53",
                                                                                        "plugin_id"=> 6,
                                                                                        "parent_id"=>"3280cd3c-8a95-4683-b661-7846bc9fdf03",
                                                                                        "sort_order"=> 0
                            ] ,            [
                                                                            "id"=>"81d30c41-fd09-4757-a6f9-e92463faf8bc",
                                                                                        "created_at"=>"2020-05-13 04:38:17",
                                                                                        "updated_at"=>"2020-06-20 06:33:23",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "label"=>"Dashboard",
                                                                                        "icon"=>"oc-icon-dashboard",
                                                                                        "type"=>"dashboard",
                                                                                        "active"=> 1,
                                                                                        "name"=>"dashboard",
                                                                                        "description"=> "",
                                                                                        "url"=> "",
                                                                                        "model"=> null,
                                                                                        "list"=> null,
                                                                                        "form"=> "",
                                                                                        "view"=> "",
                                                                                        "uipage_id"=> null,
                                                                                        "record_id"=> null,
                                                                                        "dashboard_id"=>"cc326831-e515-44a8-8eb8-b23b8fa8fdaa",
                                                                                        "widget_id"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "parent_id"=>"3280cd3c-8a95-4683-b661-7846bc9fdf03",
                                                                                        "sort_order"=> 4
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_navigations')->where('plugin_id', 6)->delete();
            }
}
