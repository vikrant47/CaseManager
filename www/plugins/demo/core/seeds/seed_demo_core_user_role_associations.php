<?php
namespace Demo\Core\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Core d */
class SeedDemoCoreUserRoleAssociations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_user_role_associations')->insert([
            [
                                                                            "id"=> 1,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "user_id"=> 1,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1
                            ] ,            [
                                                                            "id"=> 8,
                                                                                        "created_at"=>"2020-04-06 08:54:23",
                                                                                        "updated_at"=>"2020-04-06 08:54:23",
                                                                                        "user_id"=> 3,
                                                                                        "role_id"=> 2,
                                                                                        "plugin_id"=> 10,
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1
                            ] ,            [
                                                                            "id"=> 11,
                                                                                        "created_at"=>"2020-04-06 08:56:07",
                                                                                        "updated_at"=>"2020-04-06 08:56:07",
                                                                                        "user_id"=> 2,
                                                                                        "role_id"=> 2,
                                                                                        "plugin_id"=> 10,
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1
                            ] ,            [
                                                                            "id"=> 12,
                                                                                        "created_at"=>"2020-04-06 14:03:21",
                                                                                        "updated_at"=>"2020-04-06 14:03:21",
                                                                                        "user_id"=> 6,
                                                                                        "role_id"=> 2,
                                                                                        "plugin_id"=> 10,
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_user_role_associations')->where('plugin_id', 10)->delete();
            }
}
