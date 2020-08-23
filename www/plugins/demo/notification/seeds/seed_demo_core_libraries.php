<?php
namespace Demo\Notification\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Notification d */
class SeedDemoCoreLibraries implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_libraries')->insert([
            [
                                                                            "id"=>"484b31f0-b376-11ea-a48a-af29a00365d7",
                                                                                        "created_at"=>"2020-06-21 04:18:38",
                                                                                        "updated_at"=>"2020-06-21 04:18:38",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "css_files"=> null,
                                                                                        "javascript_files"=> null,
                                                                                        "plugin_id"=> 3,
                                                                                        "name"=>"Chart Js Slandered",
                                                                                        "code"=>"chart-js-slandered",
                                                                                        "description"=>"<h2>Simple yet flexible JavaScript charting for designers &amp; developers</h2>",
                                                                                        "website"=>"https://www.chartjs.org/"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_libraries')->where('plugin_id', 3)->delete();
            }
}
