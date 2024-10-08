<?php
namespace Demo\Notification\Seeds\V0_0;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds notification d */
class SeedDemoReportDashboards implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_report_dashboards')->insert([
            [
                                                                            "id"=>"cc326831-e515-44a8-8eb8-b23b8fa8fdaa",
                                                                                        "created_at"=>"2020-05-10 09:22:09",
                                                                                        "updated_at"=>"2020-06-22 03:46:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Default Deshboard",
                                                                                        "description"=>"<p>This is a dummy dashboard</p>",
                                                                                        "active"=> 1,
                                                                                        "widgets_config"=>"[{\"x\": \"0\", \"y\": \"0\", \"width\": \"5\", \"height\": \"4\", \"widget\": \"84383d11-89c6-4dac-906c-bb2b08923b53\"}, {\"x\": \"5\", \"y\": \"0\", \"width\": \"7\", \"height\": \"4\", \"widget\": \"8be0d030-b3d3-11ea-90ed-bfdae0c12a09\"}]",
                                                                                        "public"=> false,
                                                                                        "code"=>"default-dashboard",
                                                                                        "engine_application_id"=>"c79b3f36-a77a-4de9-a9f0-f890a99728ef"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_report_dashboards')->where('engine_application_id', 'c79b3f36-a77a-4de9-a9f0-f890a99728ef')->delete();
            }
}
