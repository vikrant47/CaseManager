<?php
namespace Demo\Core\Seeds\V0_0;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds engine d */
class SeedDemoCoreUiPages implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_ui_pages')->insert([
            [
                                                                            "id"=>"3ed2a26a-8fee-48f9-87f6-48cc51bec3eb",
                                                                                        "created_at"=>"2020-05-16 06:00:56",
                                                                                        "updated_at"=>"2020-05-16 15:13:38",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "name"=>"Hello World",
                                                                                        "description"=> "",
                                                                                        "code"=>"hello-world",
                                                                                        "template"=>"<h1>\r\n    Hello World\r\n</h1>",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_ui_pages')->where('engine_application_id', 'dc81b635-1d0a-4f3e-83af-13642d56abe4')->delete();
            }
}
