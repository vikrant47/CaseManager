<?php
namespace Demo\Notification\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Notification d */
class SeedDemoReportDashboards implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_report_dashboards')->insert([
            [
                                                                            "created_at"=>"2020-05-10 09:22:09",
                                                                                        "updated_at"=>"2020-06-14 06:57:11",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Default Deshboard",
                                                                                        "description"=> "",
                                                                                        "active"=> 1,
                                                                                        "config_widgets"=>"[{\"widget\":\"84383d11-89c6-4dac-906c-bb2b08923b53\",\"x\":0,\"y\":0,\"width\":6,\"height\":8},{\"widget\":\"84383d11-89c6-4dac-906c-bb2b08923b53\",\"x\":6,\"y\":0,\"width\":6,\"height\":8}]",
                                                                                        "public"=> 0,
                                                                                        "code"=>"default-dashboard",
                                                                                        "plugin_id"=> 3,
                                                                                        "id"=>"cc326831-e515-44a8-8eb8-b23b8fa8fdaa"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_report_dashboards')->where('plugin_id', 3)->delete();
            }
}
