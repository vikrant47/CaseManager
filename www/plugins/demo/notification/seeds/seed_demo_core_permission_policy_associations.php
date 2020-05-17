<?php
namespace Demo\Notification\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Notification d */
class SeedDemoCorePermissionPolicyAssociations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_permission_policy_associations')->insert([
            [
                                                                            "id"=> 565,
                                                                                        "created_at"=>"2020-05-17 05:46:59",
                                                                                        "updated_at"=>"2020-05-17 05:46:59",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 3,
                                                                                        "permission_id"=> 561,
                                                                                        "policy_id"=> 522
                            ] ,            [
                                                                            "id"=> 566,
                                                                                        "created_at"=>"2020-05-17 05:46:59",
                                                                                        "updated_at"=>"2020-05-17 05:46:59",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 3,
                                                                                        "permission_id"=> 562,
                                                                                        "policy_id"=> 522
                            ] ,            [
                                                                            "id"=> 567,
                                                                                        "created_at"=>"2020-05-17 05:46:59",
                                                                                        "updated_at"=>"2020-05-17 05:46:59",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 3,
                                                                                        "permission_id"=> 563,
                                                                                        "policy_id"=> 522
                            ] ,            [
                                                                            "id"=> 568,
                                                                                        "created_at"=>"2020-05-17 05:46:59",
                                                                                        "updated_at"=>"2020-05-17 05:46:59",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 3,
                                                                                        "permission_id"=> 564,
                                                                                        "policy_id"=> 522
                            ] ,            [
                                                                            "id"=> 569,
                                                                                        "created_at"=>"2020-05-17 05:47:53",
                                                                                        "updated_at"=>"2020-05-17 05:47:53",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 3,
                                                                                        "permission_id"=> 565,
                                                                                        "policy_id"=> 523
                            ] ,            [
                                                                            "id"=> 570,
                                                                                        "created_at"=>"2020-05-17 05:47:53",
                                                                                        "updated_at"=>"2020-05-17 05:47:53",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 3,
                                                                                        "permission_id"=> 566,
                                                                                        "policy_id"=> 523
                            ] ,            [
                                                                            "id"=> 571,
                                                                                        "created_at"=>"2020-05-17 05:47:53",
                                                                                        "updated_at"=>"2020-05-17 05:47:53",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 3,
                                                                                        "permission_id"=> 567,
                                                                                        "policy_id"=> 523
                            ] ,            [
                                                                            "id"=> 572,
                                                                                        "created_at"=>"2020-05-17 05:47:53",
                                                                                        "updated_at"=>"2020-05-17 05:47:53",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 3,
                                                                                        "permission_id"=> 568,
                                                                                        "policy_id"=> 523
                            ] ,            [
                                                                            "id"=> 573,
                                                                                        "created_at"=>"2020-05-17 05:52:10",
                                                                                        "updated_at"=>"2020-05-17 05:52:10",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 3,
                                                                                        "permission_id"=> 569,
                                                                                        "policy_id"=> 524
                            ] ,            [
                                                                            "id"=> 574,
                                                                                        "created_at"=>"2020-05-17 05:52:11",
                                                                                        "updated_at"=>"2020-05-17 05:52:11",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 3,
                                                                                        "permission_id"=> 570,
                                                                                        "policy_id"=> 524
                            ] ,            [
                                                                            "id"=> 575,
                                                                                        "created_at"=>"2020-05-17 05:52:11",
                                                                                        "updated_at"=>"2020-05-17 05:52:11",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 3,
                                                                                        "permission_id"=> 571,
                                                                                        "policy_id"=> 524
                            ] ,            [
                                                                            "id"=> 576,
                                                                                        "created_at"=>"2020-05-17 05:52:11",
                                                                                        "updated_at"=>"2020-05-17 05:52:11",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 3,
                                                                                        "permission_id"=> 572,
                                                                                        "policy_id"=> 524
                            ] ,            [
                                                                            "id"=> 577,
                                                                                        "created_at"=>"2020-05-17 05:53:01",
                                                                                        "updated_at"=>"2020-05-17 05:53:01",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 3,
                                                                                        "permission_id"=> 573,
                                                                                        "policy_id"=> 525
                            ] ,            [
                                                                            "id"=> 578,
                                                                                        "created_at"=>"2020-05-17 05:53:01",
                                                                                        "updated_at"=>"2020-05-17 05:53:01",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 3,
                                                                                        "permission_id"=> 574,
                                                                                        "policy_id"=> 525
                            ] ,            [
                                                                            "id"=> 579,
                                                                                        "created_at"=>"2020-05-17 05:53:01",
                                                                                        "updated_at"=>"2020-05-17 05:53:01",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 3,
                                                                                        "permission_id"=> 575,
                                                                                        "policy_id"=> 525
                            ] ,            [
                                                                            "id"=> 580,
                                                                                        "created_at"=>"2020-05-17 05:53:01",
                                                                                        "updated_at"=>"2020-05-17 05:53:01",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 3,
                                                                                        "permission_id"=> 576,
                                                                                        "policy_id"=> 525
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_permission_policy_associations')->where('plugin_id', 3)->delete();
            }
}
