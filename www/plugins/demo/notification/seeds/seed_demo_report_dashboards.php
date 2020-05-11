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
                                                                            "id"=> 1,
                                                                                        "created_at"=>"2020-05-10 09:22:09",
                                                                                        "updated_at"=>"2020-05-10 15:54:50",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Default Deshboard",
                                                                                        "description"=> "",
                                                                                        "active"=> 1,
                                                                                        "config_widgets"=>"[{\"x\":\"0\",\"y\":\"0\",\"width\":\"6\",\"height\":\"8\",\"widget\":\"1\"},{\"x\":\"6\",\"y\":\"0\",\"width\":\"6\",\"height\":\"8\",\"widget\":\"1\"}]",
                                                                                        "public"=> 0,
                                                                                        "code"=>"default-dashboard",
                                                                                        "plugin_id"=> 3
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_report_dashboards')->where('plugin_id', 3)->delete();
            }
}
