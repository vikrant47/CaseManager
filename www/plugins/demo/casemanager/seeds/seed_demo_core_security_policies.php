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
                                                                            "created_at"=>"2020-04-27 11:51:21",
                                                                                        "updated_at"=>"2020-04-27 11:51:21",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Project Policy",
                                                                                        "description"=>"Autogenerated policy for Project",
                                                                                        "plugin_id"=> 6,
                                                                                        "id"=>"b70d97bf-4ef2-4fa1-bc21-332b0bf6aef9"
                            ] ,            [
                                                                            "created_at"=>"2020-04-06 14:06:17",
                                                                                        "updated_at"=>"2020-04-06 14:06:17",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Agent Case Policy",
                                                                                        "description"=> "",
                                                                                        "plugin_id"=> 6,
                                                                                        "id"=>"65971c94-5f2a-4f63-a6a3-9ca1b19a5b9f"
                            ] ,            [
                                                                            "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Case Model Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Case Model",
                                                                                        "plugin_id"=> 6,
                                                                                        "id"=>"694b6dcf-0017-4013-bc71-c7d71dae6a3a"
                            ] ,            [
                                                                            "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Case Priority Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Case Priority",
                                                                                        "plugin_id"=> 6,
                                                                                        "id"=>"7d48cc5f-ae88-47fa-a29e-5566e08fe187"
                            ] ,            [
                                                                            "created_at"=>"2020-04-27 10:59:16",
                                                                                        "updated_at"=>"2020-04-27 10:59:16",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Case Priority Policy",
                                                                                        "description"=>"Autogenerated policy for Case Priority",
                                                                                        "plugin_id"=> 6,
                                                                                        "id"=>"0dcd7801-d4ae-439d-907d-950b72a9f24d"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_security_policies')->where('plugin_id', 6)->delete();
            }
}
