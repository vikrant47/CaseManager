<?php
namespace Demo\Core\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Core d */
class SeedDemoCoreLibraries implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_libraries')->insert([
            [
                                                                            "id"=> 1,
                                                                                        "created_at"=>"2020-05-10 07:34:36",
                                                                                        "updated_at"=>"2020-05-13 04:03:38",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "name"=>"EchartJS",
                                                                                        "description"=> "",
                                                                                        "website"=>"https://echarts.apache.org/en/index.html",
                                                                                        "code"=>"echart-js"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_libraries')->where('plugin_id', 10)->delete();
            }
}
