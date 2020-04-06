<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Casemanager d */
class SeedDemoCoreRolePolicyAssociations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_role_policy_associations')->insert([
            [
                                                                            "id"=> 24,
                                                                                        "created_at"=>"2020-04-06 07:16:12",
                                                                                        "updated_at"=>"2020-04-06 07:16:12",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "role_id"=> 2,
                                                                                        "policy_id"=> 61
                            ] ,            [
                                                                            "id"=> 25,
                                                                                        "created_at"=>"2020-04-06 07:16:12",
                                                                                        "updated_at"=>"2020-04-06 07:16:12",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "role_id"=> 2,
                                                                                        "policy_id"=> 62
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_role_policy_associations')->where('plugin_id', 6)->delete();
            }
}
