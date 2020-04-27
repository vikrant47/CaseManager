<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Casemanager d */
class SeedDemoCorePermissionPolicyAssociations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_permission_policy_associations')->insert([
            [
                                                                            "id"=> 533,
                                                                                        "created_at"=>"2020-04-27 10:59:16",
                                                                                        "updated_at"=>"2020-04-27 10:59:16",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "permission_id"=> 529,
                                                                                        "policy_id"=> 514
                            ] ,            [
                                                                            "id"=> 534,
                                                                                        "created_at"=>"2020-04-27 10:59:16",
                                                                                        "updated_at"=>"2020-04-27 10:59:16",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "permission_id"=> 530,
                                                                                        "policy_id"=> 514
                            ] ,            [
                                                                            "id"=> 535,
                                                                                        "created_at"=>"2020-04-27 10:59:16",
                                                                                        "updated_at"=>"2020-04-27 10:59:16",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "permission_id"=> 531,
                                                                                        "policy_id"=> 514
                            ] ,            [
                                                                            "id"=> 536,
                                                                                        "created_at"=>"2020-04-27 10:59:17",
                                                                                        "updated_at"=>"2020-04-27 10:59:17",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "permission_id"=> 532,
                                                                                        "policy_id"=> 514
                            ] ,            [
                                                                            "id"=> 16,
                                                                                        "created_at"=>"2020-04-06 07:56:24",
                                                                                        "updated_at"=>"2020-04-06 07:56:24",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "permission_id"=> 81,
                                                                                        "policy_id"=> 61
                            ] ,            [
                                                                            "id"=> 17,
                                                                                        "created_at"=>"2020-04-06 07:56:24",
                                                                                        "updated_at"=>"2020-04-06 07:56:24",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "permission_id"=> 83,
                                                                                        "policy_id"=> 61
                            ] ,            [
                                                                            "id"=> 18,
                                                                                        "created_at"=>"2020-04-06 07:56:24",
                                                                                        "updated_at"=>"2020-04-06 07:56:24",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "permission_id"=> 85,
                                                                                        "policy_id"=> 61
                            ] ,            [
                                                                            "id"=> 19,
                                                                                        "created_at"=>"2020-04-06 07:56:24",
                                                                                        "updated_at"=>"2020-04-06 07:56:24",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "permission_id"=> 87,
                                                                                        "policy_id"=> 61
                            ] ,            [
                                                                            "id"=> 20,
                                                                                        "created_at"=>"2020-04-06 07:58:19",
                                                                                        "updated_at"=>"2020-04-06 07:58:19",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "permission_id"=> 82,
                                                                                        "policy_id"=> 62
                            ] ,            [
                                                                            "id"=> 21,
                                                                                        "created_at"=>"2020-04-06 07:58:19",
                                                                                        "updated_at"=>"2020-04-06 07:58:19",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "permission_id"=> 84,
                                                                                        "policy_id"=> 62
                            ] ,            [
                                                                            "id"=> 22,
                                                                                        "created_at"=>"2020-04-06 07:58:19",
                                                                                        "updated_at"=>"2020-04-06 07:58:19",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "permission_id"=> 86,
                                                                                        "policy_id"=> 62
                            ] ,            [
                                                                            "id"=> 23,
                                                                                        "created_at"=>"2020-04-06 07:58:19",
                                                                                        "updated_at"=>"2020-04-06 07:58:19",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "permission_id"=> 88,
                                                                                        "policy_id"=> 62
                            ] ,            [
                                                                            "id"=> 537,
                                                                                        "created_at"=>"2020-04-27 11:51:21",
                                                                                        "updated_at"=>"2020-04-27 11:51:21",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "permission_id"=> 533,
                                                                                        "policy_id"=> 515
                            ] ,            [
                                                                            "id"=> 538,
                                                                                        "created_at"=>"2020-04-27 11:51:21",
                                                                                        "updated_at"=>"2020-04-27 11:51:21",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "permission_id"=> 534,
                                                                                        "policy_id"=> 515
                            ] ,            [
                                                                            "id"=> 539,
                                                                                        "created_at"=>"2020-04-27 11:51:21",
                                                                                        "updated_at"=>"2020-04-27 11:51:21",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "permission_id"=> 535,
                                                                                        "policy_id"=> 515
                            ] ,            [
                                                                            "id"=> 540,
                                                                                        "created_at"=>"2020-04-27 11:51:21",
                                                                                        "updated_at"=>"2020-04-27 11:51:21",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "permission_id"=> 536,
                                                                                        "policy_id"=> 515
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_permission_policy_associations')->where('plugin_id', 6)->delete();
            }
}
