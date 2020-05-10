<?php
namespace Demo\Core\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Core d */
class SeedDemoCoreIframes implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_iframes')->insert([
            [
                                                                            "id"=> 3,
                                                                                        "created_at"=>"2019-11-24 15:42:32",
                                                                                        "updated_at"=>"2020-03-16 05:09:54",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Test",
                                                                                        "description"=> "",
                                                                                        "backend_menu"=>"[{\"plugin\":\"10\",\"main_menu\":\"main-menu-item\",\"side_menu\":\"side-menu-item2\"}]",
                                                                                        "code"=>"test",
                                                                                        "url"=>"https://www.youtube.com/watch?v=cTbIjrF05N0",
                                                                                        "active"=> 1,
                                                                                        "iframe"=> 1
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_iframes')->delete();
            }
}
