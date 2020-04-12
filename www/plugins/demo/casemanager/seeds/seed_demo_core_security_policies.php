<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Casemanager d */
class SeedDemoCoreSecurityPolicies implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_security_policies')->insert([
            [
                                                                            "id"=> 143,
                                                                                        "created_at"=>"2020-04-06 14:06:17",
                                                                                        "updated_at"=>"2020-04-06 14:06:17",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Agent Case Policy",
                                                                                        "description"=> "",
                                                                                        "plugin_id"=> 6
                            ] ,            [
                                                                            "id"=> 61,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Case Model Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Case Model",
                                                                                        "plugin_id"=> 6
                            ] ,            [
                                                                            "id"=> 62,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Case Priority Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Case Priority",
                                                                                        "plugin_id"=> 6
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_security_policies')->where('plugin_id', 6)->delete();
            }
}
