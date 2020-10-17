<?php
namespace Demo\Casemanager\Seeds\V0_0;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds casemanager d */
class SeedDemoCoreRolePolicyAssociations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_role_policy_associations')->insert([
            [
                                                                            "id"=>"f2fdb718-c407-4cb6-ba87-728135b46da0",
                                                                                        "created_at"=>"2020-05-10 06:31:16",
                                                                                        "updated_at"=>"2020-05-10 06:31:16",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "role_id"=>"f2fdb718-c407-4cb6-ba87-728135b46da0",
                                                                                        "policy_id"=>"65971c94-5f2a-4f63-a6a3-9ca1b19a5b9f"
                            ] ,            [
                                                                            "id"=>"4a4af35a-8048-4b57-a709-fc90f10a9e6e",
                                                                                        "created_at"=>"2020-05-10 06:31:16",
                                                                                        "updated_at"=>"2020-05-10 06:31:16",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "role_id"=>"4a4af35a-8048-4b57-a709-fc90f10a9e6e",
                                                                                        "policy_id"=>"694b6dcf-0017-4013-bc71-c7d71dae6a3a"
                            ] ,            [
                                                                            "id"=>"d83e4ade-4e1a-45fa-931c-62d3d868197c",
                                                                                        "created_at"=>"2020-05-10 06:31:16",
                                                                                        "updated_at"=>"2020-05-10 06:31:16",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "role_id"=>"d83e4ade-4e1a-45fa-931c-62d3d868197c",
                                                                                        "policy_id"=>"7d48cc5f-ae88-47fa-a29e-5566e08fe187"
                            ] ,            [
                                                                            "id"=>"6f6e4767-ac24-49b9-870d-8cc526e3e3f5",
                                                                                        "created_at"=>"2020-05-10 06:31:16",
                                                                                        "updated_at"=>"2020-05-10 06:31:16",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "role_id"=>"6f6e4767-ac24-49b9-870d-8cc526e3e3f5",
                                                                                        "policy_id"=>"0dcd7801-d4ae-439d-907d-950b72a9f24d"
                            ] ,            [
                                                                            "id"=>"8b88a7e5-de52-4ac9-be78-ac6bdf05ae1a",
                                                                                        "created_at"=>"2020-05-10 06:31:16",
                                                                                        "updated_at"=>"2020-05-10 06:31:16",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "role_id"=>"8b88a7e5-de52-4ac9-be78-ac6bdf05ae1a",
                                                                                        "policy_id"=>"22ba842b-7972-4ccd-825b-c9659d4e7465"
                            ] ,            [
                                                                            "id"=>"ce4aee41-e636-46f3-9e13-de033bc34636",
                                                                                        "created_at"=>"2020-05-10 06:31:16",
                                                                                        "updated_at"=>"2020-05-10 06:31:16",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "role_id"=>"ce4aee41-e636-46f3-9e13-de033bc34636",
                                                                                        "policy_id"=>"f7d2748b-a40e-44cc-bbc3-ef17bbd82077"
                            ] ,            [
                                                                            "id"=>"a50e7180-cf50-11ea-898f-253b10049313",
                                                                                        "created_at"=>"2020-07-26 14:59:46",
                                                                                        "updated_at"=>"2020-07-26 14:59:46",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354",
                                                                                        "policy_id"=>"694b6dcf-0017-4013-bc71-c7d71dae6a3a"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_role_policy_associations')->where('engine_application_id', 'df07f9b4-26c1-40ca-ba1f-1b77b1692b83')->delete();
            }
}
