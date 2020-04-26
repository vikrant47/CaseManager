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
                                                                            "id"=> 504,
                                                                                        "created_at"=>"2020-04-26 07:09:40",
                                                                                        "updated_at"=>"2020-04-26 07:09:40",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 2,
                                                                                        "permission_id"=> 500,
                                                                                        "policy_id"=> 507
                            ] ,            [
                                                                            "id"=> 505,
                                                                                        "created_at"=>"2020-04-26 07:09:40",
                                                                                        "updated_at"=>"2020-04-26 07:09:40",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 2,
                                                                                        "permission_id"=> 501,
                                                                                        "policy_id"=> 507
                            ] ,            [
                                                                            "id"=> 506,
                                                                                        "created_at"=>"2020-04-26 07:09:40",
                                                                                        "updated_at"=>"2020-04-26 07:09:40",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 2,
                                                                                        "permission_id"=> 502,
                                                                                        "policy_id"=> 507
                            ] ,            [
                                                                            "id"=> 507,
                                                                                        "created_at"=>"2020-04-26 07:09:40",
                                                                                        "updated_at"=>"2020-04-26 07:09:40",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 2,
                                                                                        "permission_id"=> 503,
                                                                                        "policy_id"=> 507
                            ] ,            [
                                                                            "id"=> 508,
                                                                                        "created_at"=>"2020-04-26 07:09:40",
                                                                                        "updated_at"=>"2020-04-26 07:09:40",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 2,
                                                                                        "permission_id"=> 504,
                                                                                        "policy_id"=> 507
                            ] ,            [
                                                                            "id"=> 524,
                                                                                        "created_at"=>"2020-04-26 07:16:15",
                                                                                        "updated_at"=>"2020-04-26 07:16:15",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 2,
                                                                                        "permission_id"=> 520,
                                                                                        "policy_id"=> 512
                            ] ,            [
                                                                            "id"=> 525,
                                                                                        "created_at"=>"2020-04-26 07:16:16",
                                                                                        "updated_at"=>"2020-04-26 07:16:16",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 2,
                                                                                        "permission_id"=> 521,
                                                                                        "policy_id"=> 512
                            ] ,            [
                                                                            "id"=> 526,
                                                                                        "created_at"=>"2020-04-26 07:16:16",
                                                                                        "updated_at"=>"2020-04-26 07:16:16",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 2,
                                                                                        "permission_id"=> 522,
                                                                                        "policy_id"=> 512
                            ] ,            [
                                                                            "id"=> 527,
                                                                                        "created_at"=>"2020-04-26 07:16:16",
                                                                                        "updated_at"=>"2020-04-26 07:16:16",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 2,
                                                                                        "permission_id"=> 523,
                                                                                        "policy_id"=> 512
                            ] ,            [
                                                                            "id"=> 528,
                                                                                        "created_at"=>"2020-04-26 07:16:16",
                                                                                        "updated_at"=>"2020-04-26 07:16:16",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 2,
                                                                                        "permission_id"=> 524,
                                                                                        "policy_id"=> 512
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_permission_policy_associations')->where('plugin_id', 2)->delete();
            }
}
