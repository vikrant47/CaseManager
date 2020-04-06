<?php
namespace Demo\Core\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Core d */
class SeedDemoCoreRolePolicyAssociations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_role_policy_associations')->insert([
            [
                                                                            "id"=> 3,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "role_id"=> 3,
                                                                                        "policy_id"=> 61
                            ] ,            [
                                                                            "id"=> 4,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "role_id"=> 3,
                                                                                        "policy_id"=> 61
                            ] ,            [
                                                                            "id"=> 5,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "role_id"=> 3,
                                                                                        "policy_id"=> 61
                            ] ,            [
                                                                            "id"=> 6,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "role_id"=> 3,
                                                                                        "policy_id"=> 61
                            ] ,            [
                                                                            "id"=> 7,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "role_id"=> 3,
                                                                                        "policy_id"=> 61
                            ] ,            [
                                                                            "id"=> 8,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "role_id"=> 3,
                                                                                        "policy_id"=> 61
                            ] ,            [
                                                                            "id"=> 9,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "role_id"=> 3,
                                                                                        "policy_id"=> 61
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_role_policy_associations')->where('plugin_id', 10)->delete();
            }
}
