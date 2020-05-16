<?php
namespace Demo\Core\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Core d */
class SeedDemoCoreUiPages implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_ui_pages')->insert([
            [
                                                                            "id"=> 2,
                                                                                        "created_at"=>"2020-05-16 06:00:56",
                                                                                        "updated_at"=>"2020-05-16 06:01:16",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "name"=>"Hello World",
                                                                                        "description"=> "",
                                                                                        "code"=>"hello-world",
                                                                                        "template"=>"<h1>\r\n    Hello World\r\n</h1>",
                                                                                        "plugin_id"=> 10
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_ui_pages')->where('plugin_id', 10)->delete();
            }
}
