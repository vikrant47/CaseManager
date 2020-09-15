<?php
namespace Demo\Core\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds engine d */
class SeedDemoCoreLibraries implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_libraries')->insert([
            [
                                                                            "id"=>"a65cda17-3942-4dac-995b-fd66fe412d1a",
                                                                                        "created_at"=>"2020-05-10 07:34:36",
                                                                                        "updated_at"=>"2020-05-13 04:03:38",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "css_files"=> null,
                                                                                        "javascript_files"=> null,
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "name"=>"EchartJS",
                                                                                        "code"=>"echart-js",
                                                                                        "description"=> "",
                                                                                        "website"=>"https://echarts.apache.org/en/index.html"
                            ] ,            [
                                                                            "id"=>"72d4e2a0-b375-11ea-a676-43d852c02135",
                                                                                        "created_at"=>"2020-06-21 04:12:40",
                                                                                        "updated_at"=>"2020-06-21 04:13:52",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "css_files"=> null,
                                                                                        "javascript_files"=> null,
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "name"=>"Ag Grid Community Edition",
                                                                                        "code"=>"ag-grid",
                                                                                        "description"=>"<p>ag-Grid is the industry standard for JavaScript Enterprise Applications. Developers using ag-Grid are building applications that would not be possible if ag-Grid did not exist.</p>",
                                                                                        "website"=>"https://www.ag-grid.com/javascript-grid/"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_libraries')->where('engine_application_id', 'dc81b635-1d0a-4f3e-83af-13642d56abe4')->delete();
            }
}
