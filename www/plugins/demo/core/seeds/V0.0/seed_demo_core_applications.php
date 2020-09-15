<?php
namespace Demo\Core\Seeds;

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
                                                                            "id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "name"=>"Engine",
                                                                                        "code"=>"engine",
                                                                                        "plugin_code"=>"Demo.Core",
                                                                                        "active"=> 1,
                                                                                        "description"=>"Engine Application",
                                                                                        "created_at"=>"2020-08-23 15:50:25",
                                                                                        "updated_at"=>"2020-08-23 15:50:25",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 1
                            ] ,            [
                                                                            "id"=>"cf0c66c7-12c9-43df-813c-14aeafdf6ae1",
                                                                                        "name"=>"Report",
                                                                                        "code"=>"report",
                                                                                        "plugin_code"=>"Demo.Report",
                                                                                        "active"=> 1,
                                                                                        "description"=>"Report Application",
                                                                                        "created_at"=>"2020-08-23 15:50:25",
                                                                                        "updated_at"=>"2020-08-23 15:50:25",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 1
                            ] ,            [
                                                                            "id"=>"801c3e91-8be6-402e-9872-69d6ea29fe06",
                                                                                        "name"=>"Tenant",
                                                                                        "code"=>"tenant",
                                                                                        "plugin_code"=>"Demo.Tenant",
                                                                                        "active"=> 1,
                                                                                        "description"=>"Tenant Application",
                                                                                        "created_at"=>"2020-08-23 15:50:25",
                                                                                        "updated_at"=>"2020-08-23 15:50:25",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 1
                            ] ,            [
                                                                            "id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "name"=>"Case Manager",
                                                                                        "code"=>"casemanager",
                                                                                        "plugin_code"=>"Demo.Casemanager",
                                                                                        "active"=> 1,
                                                                                        "description"=>"Case Manager",
                                                                                        "created_at"=>"2020-08-23 15:50:25",
                                                                                        "updated_at"=>"2020-08-23 15:50:25",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 1
                            ] ,            [
                                                                            "id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "name"=>"Workflow",
                                                                                        "code"=>"workflow",
                                                                                        "plugin_code"=>"Demo.Workflow",
                                                                                        "active"=> 1,
                                                                                        "description"=>"Workflow Application",
                                                                                        "created_at"=>"2020-08-23 15:50:25",
                                                                                        "updated_at"=>"2020-08-23 15:50:25",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 1
                            ] ,            [
                                                                            "id"=>"c79b3f36-a77a-4de9-a9f0-f890a99728ef",
                                                                                        "name"=>"Notification",
                                                                                        "code"=>"notification",
                                                                                        "plugin_code"=>"Demo.Notification",
                                                                                        "active"=> 1,
                                                                                        "description"=>"Notification",
                                                                                        "created_at"=>"2020-08-23 15:50:25",
                                                                                        "updated_at"=>"2020-08-23 15:50:25",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 1
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_applications')->delete();
            }
}
