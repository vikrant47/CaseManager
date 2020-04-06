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
                                                                            "id"=> 16,
                                                                                        "created_at"=>"2020-04-06 07:56:24",
                                                                                        "updated_at"=>"2020-04-06 07:56:24",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "permission_id"=> 61,
                                                                                        "policy_id"=> 81
                            ] ,            [
                                                                            "id"=> 17,
                                                                                        "created_at"=>"2020-04-06 07:56:24",
                                                                                        "updated_at"=>"2020-04-06 07:56:24",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "permission_id"=> 61,
                                                                                        "policy_id"=> 83
                            ] ,            [
                                                                            "id"=> 18,
                                                                                        "created_at"=>"2020-04-06 07:56:24",
                                                                                        "updated_at"=>"2020-04-06 07:56:24",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "permission_id"=> 61,
                                                                                        "policy_id"=> 85
                            ] ,            [
                                                                            "id"=> 19,
                                                                                        "created_at"=>"2020-04-06 07:56:24",
                                                                                        "updated_at"=>"2020-04-06 07:56:24",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "permission_id"=> 61,
                                                                                        "policy_id"=> 87
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_permission_policy_associations')->where('plugin_id', 6)->delete();
            }
}
