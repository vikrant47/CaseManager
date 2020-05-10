<?php
namespace Demo\Core\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Core d */
class SeedDemoCoreSecurityPolicies implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_security_policies')->insert([
            [
                                                                            "id"=> 21,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Models Model Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Models Model",
                                                                                        "plugin_id"=> 10
                            ] ,            [
                                                                            "id"=> 22,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Custom Field Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Custom Field",
                                                                                        "plugin_id"=> 10
                            ] ,            [
                                                                            "id"=> 23,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Form Field Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Form Field",
                                                                                        "plugin_id"=> 10
                            ] ,            [
                                                                            "id"=> 24,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Event Handler Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Event Handler",
                                                                                        "plugin_id"=> 10
                            ] ,            [
                                                                            "id"=> 25,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Inbound Api Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Inbound Api",
                                                                                        "plugin_id"=> 10
                            ] ,            [
                                                                            "id"=> 26,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Command Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Command",
                                                                                        "plugin_id"=> 10
                            ] ,            [
                                                                            "id"=> 27,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Iframe Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Iframe",
                                                                                        "plugin_id"=> 10
                            ] ,            [
                                                                            "id"=> 28,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Javascript Library Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Javascript Library",
                                                                                        "plugin_id"=> 10
                            ] ,            [
                                                                            "id"=> 29,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Webhook Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Webhook",
                                                                                        "plugin_id"=> 10
                            ] ,            [
                                                                            "id"=> 30,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Model Association Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Model Association",
                                                                                        "plugin_id"=> 10
                            ] ,            [
                                                                            "id"=> 31,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Role Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Role",
                                                                                        "plugin_id"=> 10
                            ] ,            [
                                                                            "id"=> 32,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Permission Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Permission",
                                                                                        "plugin_id"=> 10
                            ] ,            [
                                                                            "id"=> 33,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Security Policy Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Security Policy",
                                                                                        "plugin_id"=> 10
                            ] ,            [
                                                                            "id"=> 34,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Security Policy Association Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Security Policy Association",
                                                                                        "plugin_id"=> 10
                            ] ,            [
                                                                            "id"=> 35,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Role Policy Association Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Role Policy Association",
                                                                                        "plugin_id"=> 10
                            ] ,            [
                                                                            "id"=> 36,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"User Security Policy",
                                                                                        "description"=>"Security Policy for all operations on User",
                                                                                        "plugin_id"=> 10
                            ] ,            [
                                                                            "id"=> 37,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"User Security Policy -1",
                                                                                        "description"=>"Security Policy for all operations on User",
                                                                                        "plugin_id"=> 10
                            ] ,            [
                                                                            "id"=> 518,
                                                                                        "created_at"=>"2020-04-27 12:16:52",
                                                                                        "updated_at"=>"2020-04-27 12:16:52",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Role Policy",
                                                                                        "description"=>"Autogenerated policy for Role",
                                                                                        "plugin_id"=> 10
                            ] ,            [
                                                                            "id"=> 520,
                                                                                        "created_at"=>"2020-05-10 05:15:28",
                                                                                        "updated_at"=>"2020-05-10 05:15:28",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Navigation Role Association Policy",
                                                                                        "description"=>"Autogenerated policy for Navigation Role Association",
                                                                                        "plugin_id"=> 10
                            ] ,            [
                                                                            "id"=> 519,
                                                                                        "created_at"=>"2020-05-09 11:25:28",
                                                                                        "updated_at"=>"2020-05-09 11:25:28",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Navigation Policy",
                                                                                        "description"=>"Autogenerated policy for Navigation",
                                                                                        "plugin_id"=> 10
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_security_policies')->where('plugin_id', 10)->delete();
            }
}
