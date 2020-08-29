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
                                                                            "id"=>"6613e84f-9a84-47e3-b5bf-c63879565291",
                                                                                        "created_at"=>"2020-04-27 12:16:52",
                                                                                        "updated_at"=>"2020-04-27 12:16:52",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Role Policy",
                                                                                        "description"=>"Autogenerated policy for Role",
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"23ce0011-6627-4b93-a9eb-58161f823380",
                                                                                        "created_at"=>"2020-05-10 05:15:28",
                                                                                        "updated_at"=>"2020-05-10 05:15:28",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Navigation Role Association Policy",
                                                                                        "description"=>"Autogenerated policy for Navigation Role Association",
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"5f932697-47d8-4908-a374-9154150c2c1e",
                                                                                        "created_at"=>"2020-05-09 11:25:28",
                                                                                        "updated_at"=>"2020-05-09 11:25:28",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Navigation Policy",
                                                                                        "description"=>"Autogenerated policy for Navigation",
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"263d4d8d-d000-4bf1-b341-14be05cf39b2",
                                                                                        "created_at"=>"2020-05-16 05:56:50",
                                                                                        "updated_at"=>"2020-05-16 05:56:50",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"UI Page Policy",
                                                                                        "description"=>"Autogenerated policy for UI Page",
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"dca386f7-4def-4739-8942-52d494d3be01",
                                                                                        "created_at"=>"2020-05-26 14:00:23",
                                                                                        "updated_at"=>"2020-05-26 14:00:23",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Setting Policy",
                                                                                        "description"=>"Autogenerated policy for Setting",
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"85c78e51-2354-493e-baee-65311adc956b",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Models Model Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Models Model",
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"03bcb86a-db37-4684-8728-35d7d405f661",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Custom Field Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Custom Field",
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"d0bc0fbe-0144-4aa3-8bee-9ae0a3d702c7",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Form Field Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Form Field",
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"b832a312-8a98-4f75-839e-31ec212e5939",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Event Handler Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Event Handler",
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"a4b297c9-4e74-4749-949e-037c4de97786",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Inbound Api Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Inbound Api",
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"bb8a8b6d-ea02-4f24-bf86-34b2ff24b966",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Command Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Command",
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"965e3124-92d7-42a2-beff-7d81c156d2df",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Iframe Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Iframe",
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"6d947a2b-d393-4cac-8034-5d05e2cbb19e",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Javascript Library Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Javascript Library",
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"d2ea3a6e-67d2-40ae-8cec-8eb9fc1d898d",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Webhook Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Webhook",
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"88241f18-95d9-4d86-b1ed-9ee70c1a1911",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Model Association Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Model Association",
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"065447ca-8376-4db0-ad88-f5ad3a54b997",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Role Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Role",
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"b9241926-67ab-4bd3-92e3-d6dc1f652f76",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Permission Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Permission",
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"66e06e62-f496-406c-ac0d-af5959d59098",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Security Policy Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Security Policy",
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"51c95602-b4ae-4623-a83f-292cc94ad815",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Security Policy Association Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Security Policy Association",
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"dbb3b129-a3ea-4f68-a0d4-fc26faa37175",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Role Policy Association Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Role Policy Association",
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"325f0d78-cad1-43bb-a09f-37695eeca121",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"User Security Policy",
                                                                                        "description"=>"Security Policy for all operations on User",
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"3d88450a-5bb3-4ee6-b047-a9238a26c862",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"User Security Policy -1",
                                                                                        "description"=>"Security Policy for all operations on User",
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_security_policies')->where('plugin_id', 10)->delete();
            }
}
