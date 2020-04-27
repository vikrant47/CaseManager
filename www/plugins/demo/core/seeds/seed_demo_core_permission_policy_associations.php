<?php
namespace Demo\Core\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Core d */
class SeedDemoCorePermissionPolicyAssociations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_permission_policy_associations')->insert([
            [
                                                                            "id"=> 549,
                                                                                        "created_at"=>"2020-04-27 12:16:52",
                                                                                        "updated_at"=>"2020-04-27 12:16:52",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "permission_id"=> 545,
                                                                                        "policy_id"=> 518
                            ] ,            [
                                                                            "id"=> 550,
                                                                                        "created_at"=>"2020-04-27 12:16:53",
                                                                                        "updated_at"=>"2020-04-27 12:16:53",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "permission_id"=> 546,
                                                                                        "policy_id"=> 518
                            ] ,            [
                                                                            "id"=> 551,
                                                                                        "created_at"=>"2020-04-27 12:16:53",
                                                                                        "updated_at"=>"2020-04-27 12:16:53",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "permission_id"=> 547,
                                                                                        "policy_id"=> 518
                            ] ,            [
                                                                            "id"=> 552,
                                                                                        "created_at"=>"2020-04-27 12:16:53",
                                                                                        "updated_at"=>"2020-04-27 12:16:53",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "permission_id"=> 548,
                                                                                        "policy_id"=> 518
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_permission_policy_associations')->where('plugin_id', 10)->delete();
            }
}
