<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Casemanager d */
class SeedDemoCoreRoles implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_roles')->insert([
            [
                                                                            "created_at"=>"2020-04-04 14:10:36",
                                                                                        "updated_at"=>"2020-04-06 07:16:12",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Agent",
                                                                                        "code"=>"agent",
                                                                                        "description"=>"test",
                                                                                        "plugin_id"=> 6,
                                                                                        "id"=>"e751a812-4da9-4726-b375-8495ac2d3354"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_roles')->where('plugin_id', 6)->delete();
            }
}
