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
                                                                            "created_at"=>"2020-05-10 07:34:36",
                                                                                        "updated_at"=>"2020-05-13 04:03:38",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "name"=>"EchartJS",
                                                                                        "description"=> "",
                                                                                        "website"=>"https://echarts.apache.org/en/index.html",
                                                                                        "code"=>"echart-js",
                                                                                        "id"=>"a65cda17-3942-4dac-995b-fd66fe412d1a"
                            ] ,            [
                                                                            "created_at"=>"2020-06-21 04:12:40",
                                                                                        "updated_at"=>"2020-06-21 04:13:52",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "name"=>"Ag Grid Community Edition",
                                                                                        "description"=>"<p>ag-Grid is the industry standard for JavaScript Enterprise Applications. Developers using ag-Grid are building applications that would not be possible if ag-Grid did not exist.</p>",
                                                                                        "website"=>"https://www.ag-grid.com/javascript-grid/",
                                                                                        "code"=>"ag-grid",
                                                                                        "id"=>"72d4e2a0-b375-11ea-a676-43d852c02135"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_libraries')->where('plugin_id', 10)->delete();
            }
}
