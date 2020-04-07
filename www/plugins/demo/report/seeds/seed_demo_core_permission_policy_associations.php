<?php
namespace Demo\Report\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Report d */
class SeedDemoCorePermissionPolicyAssociations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_permission_policy_associations')->insert([
            [
                                                                            "id"=> 14,
                                                                                        "created_at"=>"2020-04-06 07:18:47",
                                                                                        "updated_at"=>"2020-04-06 07:18:47",
                                                                                        "created_by_id"=> 6,
                                                                                        "updated_by_id"=> 6,
                                                                                        "plugin_id"=> 14,
                                                                                        "policy_id"=> 142,
                                                                                        "permission_id"=> 242
                            ] ,            [
                                                                            "id"=> 15,
                                                                                        "created_at"=>"2020-04-06 07:18:47",
                                                                                        "updated_at"=>"2020-04-06 07:18:47",
                                                                                        "created_by_id"=> 6,
                                                                                        "updated_by_id"=> 6,
                                                                                        "plugin_id"=> 14,
                                                                                        "policy_id"=> 142,
                                                                                        "permission_id"=> 243
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_permission_policy_associations')->where('plugin_id', 14)->delete();
            }
}
