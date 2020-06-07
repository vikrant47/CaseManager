<?php
namespace Demo\Core\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Core d */
class SeedDemoCoreRoles implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_roles')->insert([
            [
                                                                            "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Administrator",
                                                                                        "code"=>"admin",
                                                                                        "description"=>"Admin of the platform",
                                                                                        "plugin_id"=> 10,
                                                                                        "id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357"
                            ] ,            [
                                                                            "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Everyone",
                                                                                        "code"=>"everyone",
                                                                                        "description"=>"Every user of the platform",
                                                                                        "plugin_id"=> 10,
                                                                                        "id"=>"90bafbbe-fbfd-42ed-9e51-5434f2733247"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_roles')->where('plugin_id', 10)->delete();
            }
}
