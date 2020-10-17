<?php
namespace Demo\Core\Seeds\V0_0;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds engine d */
class SeedDemoCoreApplications implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_applications')->insert([
            [
                                                                            "id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "name"=>"Workflow",
                                                                                        "code"=>"workflow",
                                                                                        "plugin_code"=>"Demo.Workflow",
                                                                                        "active"=> 1,
                                                                                        "description"=>"Workflow Application",
                                                                                        "created_at"=>"2020-08-23 15:50:25",
                                                                                        "updated_at"=>"2020-09-27 14:02:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 1,
                                                                                        "home_nav_id"=>"84398af6-6036-43ed-b987-8f11ffb7057e",
                                                                                        "icon"=>"oc-icon-codepen"
                            ] ,            [
                                                                            "id"=>"68473c10-0017-11eb-a76c-5f4eddcf828f",
                                                                                        "name"=>"Universal",
                                                                                        "code"=>"universal",
                                                                                        "plugin_code"=>"Demo.Core",
                                                                                        "active"=> 1,
                                                                                        "description"=> "",
                                                                                        "created_at"=>"2020-09-26 16:43:29",
                                                                                        "updated_at"=>"2020-09-27 14:02:49",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "home_nav_id"=>"139f4d70-98d4-492d-84ab-99eabb2e2865",
                                                                                        "icon"=>"oc-icon-codepen"
                            ] ,            [
                                                                            "id"=>"801c3e91-8be6-402e-9872-69d6ea29fe06",
                                                                                        "name"=>"Tenant",
                                                                                        "code"=>"tenant",
                                                                                        "plugin_code"=>"Demo.Tenant",
                                                                                        "active"=> 1,
                                                                                        "description"=>"Tenant Application",
                                                                                        "created_at"=>"2020-08-23 15:50:25",
                                                                                        "updated_at"=>"2020-09-27 14:03:10",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 1,
                                                                                        "home_nav_id"=>"a1e64d30-df01-11ea-a07e-45079aa792c5",
                                                                                        "icon"=>"oc-icon-codepen"
                            ] ,            [
                                                                            "id"=>"c79b3f36-a77a-4de9-a9f0-f890a99728ef",
                                                                                        "name"=>"Notification",
                                                                                        "code"=>"notification",
                                                                                        "plugin_code"=>"Demo.Notification",
                                                                                        "active"=> 1,
                                                                                        "description"=>"Notification",
                                                                                        "created_at"=>"2020-08-23 15:50:25",
                                                                                        "updated_at"=>"2020-09-27 14:03:50",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 1,
                                                                                        "home_nav_id"=>"211608c8-5b81-47bf-8757-8c39889924b7",
                                                                                        "icon"=>"oc-icon-codepen"
                            ] ,            [
                                                                            "id"=>"cf0c66c7-12c9-43df-813c-14aeafdf6ae1",
                                                                                        "name"=>"Report",
                                                                                        "code"=>"report",
                                                                                        "plugin_code"=>"Demo.Report",
                                                                                        "active"=> 1,
                                                                                        "description"=>"Report Application",
                                                                                        "created_at"=>"2020-08-23 15:50:25",
                                                                                        "updated_at"=>"2020-09-27 14:04:34",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 1,
                                                                                        "home_nav_id"=>"1b4aebe2-66f2-4984-a3d0-f69c3cfb90fc",
                                                                                        "icon"=>"oc-icon-book"
                            ] ,            [
                                                                            "id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "name"=>"Case Manager",
                                                                                        "code"=>"casemanager",
                                                                                        "plugin_code"=>"Demo.Casemanager",
                                                                                        "active"=> 1,
                                                                                        "description"=>"Case Manager",
                                                                                        "created_at"=>"2020-08-23 15:50:25",
                                                                                        "updated_at"=>"2020-09-27 14:05:49",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 1,
                                                                                        "home_nav_id"=>"01f868fa-2ac6-42c1-b5e0-030df343dd31",
                                                                                        "icon"=>"oc-icon-codepen"
                            ] ,            [
                                                                            "id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "name"=>"Engine",
                                                                                        "code"=>"engine",
                                                                                        "plugin_code"=>"Demo.Core",
                                                                                        "active"=> 1,
                                                                                        "description"=>"Engine Application",
                                                                                        "created_at"=>"2020-08-23 15:50:25",
                                                                                        "updated_at"=>"2020-09-27 14:06:14",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 1,
                                                                                        "home_nav_id"=>"1e73e4d1-f263-4744-a537-ab2d22d90e3c",
                                                                                        "icon"=>"oc-icon-gears"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_applications')->delete();
            }
}
