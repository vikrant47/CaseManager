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
                            ] ,            [
                                                                            "id"=> 553,
                                                                                        "created_at"=>"2020-05-09 11:25:28",
                                                                                        "updated_at"=>"2020-05-09 11:25:28",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "permission_id"=> 549,
                                                                                        "policy_id"=> 519
                            ] ,            [
                                                                            "id"=> 554,
                                                                                        "created_at"=>"2020-05-09 11:25:29",
                                                                                        "updated_at"=>"2020-05-09 11:25:29",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "permission_id"=> 550,
                                                                                        "policy_id"=> 519
                            ] ,            [
                                                                            "id"=> 555,
                                                                                        "created_at"=>"2020-05-09 11:25:29",
                                                                                        "updated_at"=>"2020-05-09 11:25:29",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "permission_id"=> 551,
                                                                                        "policy_id"=> 519
                            ] ,            [
                                                                            "id"=> 556,
                                                                                        "created_at"=>"2020-05-09 11:25:29",
                                                                                        "updated_at"=>"2020-05-09 11:25:29",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "permission_id"=> 552,
                                                                                        "policy_id"=> 519
                            ] ,            [
                                                                            "id"=> 557,
                                                                                        "created_at"=>"2020-05-10 05:15:28",
                                                                                        "updated_at"=>"2020-05-10 05:15:28",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "permission_id"=> 553,
                                                                                        "policy_id"=> 520
                            ] ,            [
                                                                            "id"=> 558,
                                                                                        "created_at"=>"2020-05-10 05:15:28",
                                                                                        "updated_at"=>"2020-05-10 05:15:28",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "permission_id"=> 554,
                                                                                        "policy_id"=> 520
                            ] ,            [
                                                                            "id"=> 559,
                                                                                        "created_at"=>"2020-05-10 05:15:28",
                                                                                        "updated_at"=>"2020-05-10 05:15:28",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "permission_id"=> 555,
                                                                                        "policy_id"=> 520
                            ] ,            [
                                                                            "id"=> 560,
                                                                                        "created_at"=>"2020-05-10 05:15:28",
                                                                                        "updated_at"=>"2020-05-10 05:15:28",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "permission_id"=> 556,
                                                                                        "policy_id"=> 520
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_permission_policy_associations')->where('plugin_id', 10)->delete();
            }
}
