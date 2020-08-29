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
                                                                            "id"=>"9d10e6d1-3015-487d-89d8-0c7e968603a8",
                                                                                        "created_at"=>"2020-05-26 14:00:23",
                                                                                        "updated_at"=>"2020-05-26 14:00:23",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "permission_id"=>"cdd20bc9-83a0-4868-b25b-5cf3a44e422f",
                                                                                        "policy_id"=>"dca386f7-4def-4739-8942-52d494d3be01"
                            ] ,            [
                                                                            "id"=>"bc1b3c50-7cec-4cd2-8a72-23ac975b54b2",
                                                                                        "created_at"=>"2020-05-26 14:00:24",
                                                                                        "updated_at"=>"2020-05-26 14:00:24",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "permission_id"=>"b4631adf-9c69-4c5d-a938-d002947e940d",
                                                                                        "policy_id"=>"dca386f7-4def-4739-8942-52d494d3be01"
                            ] ,            [
                                                                            "id"=>"8968f76a-f759-49d4-a207-17853a89c45d",
                                                                                        "created_at"=>"2020-05-26 14:00:24",
                                                                                        "updated_at"=>"2020-05-26 14:00:24",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "permission_id"=>"a553449e-af5f-4e20-a1e8-b18ef4f38e56",
                                                                                        "policy_id"=>"dca386f7-4def-4739-8942-52d494d3be01"
                            ] ,            [
                                                                            "id"=>"37feb9b0-09d3-407c-aea6-d3c8cd973c12",
                                                                                        "created_at"=>"2020-05-26 14:00:24",
                                                                                        "updated_at"=>"2020-05-26 14:00:24",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "permission_id"=>"50ce192e-6999-4acb-95bb-929058b1dcf4",
                                                                                        "policy_id"=>"dca386f7-4def-4739-8942-52d494d3be01"
                            ] ,            [
                                                                            "id"=>"1aa6574b-0e6b-4006-abe5-24226b11ba93",
                                                                                        "created_at"=>"2020-04-27 12:16:52",
                                                                                        "updated_at"=>"2020-04-27 12:16:52",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "permission_id"=>"7525ccf2-f3eb-481f-a4fa-7bfabe6727a8",
                                                                                        "policy_id"=>"6613e84f-9a84-47e3-b5bf-c63879565291"
                            ] ,            [
                                                                            "id"=>"92be9a14-e47a-430d-93ab-48686dbea1f3",
                                                                                        "created_at"=>"2020-04-27 12:16:53",
                                                                                        "updated_at"=>"2020-04-27 12:16:53",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "permission_id"=>"3738376a-c035-435f-9534-7c0058524f79",
                                                                                        "policy_id"=>"6613e84f-9a84-47e3-b5bf-c63879565291"
                            ] ,            [
                                                                            "id"=>"4ade16e6-e40d-4c21-a40d-3b5467e0439f",
                                                                                        "created_at"=>"2020-04-27 12:16:53",
                                                                                        "updated_at"=>"2020-04-27 12:16:53",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "permission_id"=>"dd05044e-0d55-490c-b8d2-a3e7ae96d33f",
                                                                                        "policy_id"=>"6613e84f-9a84-47e3-b5bf-c63879565291"
                            ] ,            [
                                                                            "id"=>"65b4def0-247a-41cc-bbf0-516f0f0f506a",
                                                                                        "created_at"=>"2020-04-27 12:16:53",
                                                                                        "updated_at"=>"2020-04-27 12:16:53",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "permission_id"=>"d346ba98-9642-4f83-b4cd-5cb2b344d911",
                                                                                        "policy_id"=>"6613e84f-9a84-47e3-b5bf-c63879565291"
                            ] ,            [
                                                                            "id"=>"aea3d1d2-c933-4b9c-a579-663ae5e2d318",
                                                                                        "created_at"=>"2020-05-09 11:25:28",
                                                                                        "updated_at"=>"2020-05-09 11:25:28",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "permission_id"=>"f2d034b5-e778-4d64-a894-a7d917952f18",
                                                                                        "policy_id"=>"5f932697-47d8-4908-a374-9154150c2c1e"
                            ] ,            [
                                                                            "id"=>"134669e0-05c1-4a9b-840a-22337cc3d57c",
                                                                                        "created_at"=>"2020-05-09 11:25:29",
                                                                                        "updated_at"=>"2020-05-09 11:25:29",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "permission_id"=>"def47772-d544-4c5d-a1a9-aef9ce5e980e",
                                                                                        "policy_id"=>"5f932697-47d8-4908-a374-9154150c2c1e"
                            ] ,            [
                                                                            "id"=>"1edc5ace-76e9-4f60-93bc-1d76e717eec0",
                                                                                        "created_at"=>"2020-05-09 11:25:29",
                                                                                        "updated_at"=>"2020-05-09 11:25:29",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "permission_id"=>"3eaa00db-d16e-4f4c-a768-0b046374d69e",
                                                                                        "policy_id"=>"5f932697-47d8-4908-a374-9154150c2c1e"
                            ] ,            [
                                                                            "id"=>"e6370990-b8a8-48cb-ad36-78b01a74b988",
                                                                                        "created_at"=>"2020-05-09 11:25:29",
                                                                                        "updated_at"=>"2020-05-09 11:25:29",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "permission_id"=>"da37a6b4-291c-444a-95fe-849fa0e0e435",
                                                                                        "policy_id"=>"5f932697-47d8-4908-a374-9154150c2c1e"
                            ] ,            [
                                                                            "id"=>"6f4d1665-b7ec-49fb-b540-157a1667f66f",
                                                                                        "created_at"=>"2020-05-10 05:15:28",
                                                                                        "updated_at"=>"2020-05-10 05:15:28",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "permission_id"=>"d16d1625-4bbd-4f3b-92cd-05499e577f6e",
                                                                                        "policy_id"=>"23ce0011-6627-4b93-a9eb-58161f823380"
                            ] ,            [
                                                                            "id"=>"53c97e36-f642-4bdb-880e-8d682201db2e",
                                                                                        "created_at"=>"2020-05-10 05:15:28",
                                                                                        "updated_at"=>"2020-05-10 05:15:28",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "permission_id"=>"97d9e377-7eca-477e-a816-2c9ccd8b54f3",
                                                                                        "policy_id"=>"23ce0011-6627-4b93-a9eb-58161f823380"
                            ] ,            [
                                                                            "id"=>"5c7e760b-2eb7-4bae-8b72-68e00ca54e28",
                                                                                        "created_at"=>"2020-05-10 05:15:28",
                                                                                        "updated_at"=>"2020-05-10 05:15:28",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "permission_id"=>"73142b4b-edbc-423c-af61-5d97e8bd7ca2",
                                                                                        "policy_id"=>"23ce0011-6627-4b93-a9eb-58161f823380"
                            ] ,            [
                                                                            "id"=>"9f2ef627-7545-43c9-ad95-7ad5d4143688",
                                                                                        "created_at"=>"2020-05-10 05:15:28",
                                                                                        "updated_at"=>"2020-05-10 05:15:28",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "permission_id"=>"c8be5306-fede-42b9-ad2c-f74feb058af1",
                                                                                        "policy_id"=>"23ce0011-6627-4b93-a9eb-58161f823380"
                            ] ,            [
                                                                            "id"=>"c0b0f26c-75b9-4679-afbd-b8c3cc446d47",
                                                                                        "created_at"=>"2020-05-16 05:56:51",
                                                                                        "updated_at"=>"2020-05-16 05:56:51",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "permission_id"=>"b398875b-39e4-490b-8e5a-a74845e399f4",
                                                                                        "policy_id"=>"263d4d8d-d000-4bf1-b341-14be05cf39b2"
                            ] ,            [
                                                                            "id"=>"7584ff71-e90f-479f-8c30-401d1035004c",
                                                                                        "created_at"=>"2020-05-16 05:56:51",
                                                                                        "updated_at"=>"2020-05-16 05:56:51",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "permission_id"=>"77e5b9d0-f2cf-4be6-8aea-936aa3e80c1b",
                                                                                        "policy_id"=>"263d4d8d-d000-4bf1-b341-14be05cf39b2"
                            ] ,            [
                                                                            "id"=>"eef4eb20-89d0-4e0a-a06e-d3070867074e",
                                                                                        "created_at"=>"2020-05-16 05:56:51",
                                                                                        "updated_at"=>"2020-05-16 05:56:51",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "permission_id"=>"a6378efa-2b35-4eaa-9dc4-0631907143b9",
                                                                                        "policy_id"=>"263d4d8d-d000-4bf1-b341-14be05cf39b2"
                            ] ,            [
                                                                            "id"=>"f70a7bbf-def4-4ce8-9b8f-0ea327fb9c0c",
                                                                                        "created_at"=>"2020-05-16 05:56:51",
                                                                                        "updated_at"=>"2020-05-16 05:56:51",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "permission_id"=>"83cd01a7-e56d-4fa3-93cf-3751ff791914",
                                                                                        "policy_id"=>"263d4d8d-d000-4bf1-b341-14be05cf39b2"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_permission_policy_associations')->where('plugin_id', 10)->delete();
            }
}
