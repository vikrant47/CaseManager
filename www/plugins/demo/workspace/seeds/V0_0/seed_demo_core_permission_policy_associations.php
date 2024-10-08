<?php
namespace Demo\Workspace\Seeds\V0_0;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds workspace d */
class SeedDemoCorePermissionPolicyAssociations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_permission_policy_associations')->insert([
            [
                                                                            "id"=>"e9fd3360-0784-11eb-9be1-d701206b7c22",
                                                                                        "created_at"=>"2020-10-06 03:35:00",
                                                                                        "updated_at"=>"2020-10-06 03:35:00",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "permission_id"=>"e9fbb520-0784-11eb-b6df-1f71b1a17add",
                                                                                        "policy_id"=>"e9f92600-0784-11eb-9e3a-6119dc8d869f"
                            ] ,            [
                                                                            "id"=>"e9ff0130-0784-11eb-a85c-c5972fd10c1a",
                                                                                        "created_at"=>"2020-10-06 03:35:00",
                                                                                        "updated_at"=>"2020-10-06 03:35:00",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "permission_id"=>"e9fe8870-0784-11eb-8de0-f3fa8c4e0292",
                                                                                        "policy_id"=>"e9f92600-0784-11eb-9e3a-6119dc8d869f"
                            ] ,            [
                                                                            "id"=>"ea003300-0784-11eb-a632-d34bcf2876c8",
                                                                                        "created_at"=>"2020-10-06 03:35:00",
                                                                                        "updated_at"=>"2020-10-06 03:35:00",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "permission_id"=>"e9ffb2c0-0784-11eb-862b-4fcf0d484174",
                                                                                        "policy_id"=>"e9f92600-0784-11eb-9e3a-6119dc8d869f"
                            ] ,            [
                                                                            "id"=>"ea016f20-0784-11eb-a2c9-55d8d0cf84ab",
                                                                                        "created_at"=>"2020-10-06 03:35:00",
                                                                                        "updated_at"=>"2020-10-06 03:35:00",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "permission_id"=>"ea00ed00-0784-11eb-ac70-23bc12104985",
                                                                                        "policy_id"=>"e9f92600-0784-11eb-9e3a-6119dc8d869f"
                            ] ,            [
                                                                            "id"=>"28a68c10-084d-11eb-8317-b1cb2e8ef700",
                                                                                        "created_at"=>"2020-10-07 03:28:25",
                                                                                        "updated_at"=>"2020-10-07 03:28:25",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "permission_id"=>"28a52ab0-084d-11eb-9df4-499d4c58db51",
                                                                                        "policy_id"=>"28a259b0-084d-11eb-b9c6-d92efd9c0910"
                            ] ,            [
                                                                            "id"=>"28a84ce0-084d-11eb-bef3-79dc97887071",
                                                                                        "created_at"=>"2020-10-07 03:28:25",
                                                                                        "updated_at"=>"2020-10-07 03:28:25",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "permission_id"=>"28a7ccc0-084d-11eb-b8e8-873e3f0fc2dd",
                                                                                        "policy_id"=>"28a259b0-084d-11eb-b9c6-d92efd9c0910"
                            ] ,            [
                                                                            "id"=>"28a97150-084d-11eb-9267-5da1a584b948",
                                                                                        "created_at"=>"2020-10-07 03:28:25",
                                                                                        "updated_at"=>"2020-10-07 03:28:25",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "permission_id"=>"28a8f350-084d-11eb-a658-3b626abe0ec3",
                                                                                        "policy_id"=>"28a259b0-084d-11eb-b9c6-d92efd9c0910"
                            ] ,            [
                                                                            "id"=>"28aa9300-084d-11eb-b2de-cdf40cd298d7",
                                                                                        "created_at"=>"2020-10-07 03:28:25",
                                                                                        "updated_at"=>"2020-10-07 03:28:25",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "permission_id"=>"28aa1590-084d-11eb-95ae-a3828ee503c6",
                                                                                        "policy_id"=>"28a259b0-084d-11eb-b9c6-d92efd9c0910"
                            ] ,            [
                                                                            "id"=>"ea0053f0-0646-11eb-8933-57f7e283060a",
                                                                                        "created_at"=>"2020-10-04 13:38:40",
                                                                                        "updated_at"=>"2020-10-04 13:38:40",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "permission_id"=>"e9fe80a0-0646-11eb-856b-bf38ffec61aa",
                                                                                        "policy_id"=>"e9fb8a40-0646-11eb-8293-f7c3068a2d5f"
                            ] ,            [
                                                                            "id"=>"ea02b440-0646-11eb-a353-e537b287baac",
                                                                                        "created_at"=>"2020-10-04 13:38:40",
                                                                                        "updated_at"=>"2020-10-04 13:38:40",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "permission_id"=>"ea020920-0646-11eb-bad8-45718632a696",
                                                                                        "policy_id"=>"e9fb8a40-0646-11eb-8293-f7c3068a2d5f"
                            ] ,            [
                                                                            "id"=>"ea043160-0646-11eb-a620-e5a4fa93ff08",
                                                                                        "created_at"=>"2020-10-04 13:38:40",
                                                                                        "updated_at"=>"2020-10-04 13:38:40",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "permission_id"=>"ea039670-0646-11eb-a307-69fd59a8c7f9",
                                                                                        "policy_id"=>"e9fb8a40-0646-11eb-8293-f7c3068a2d5f"
                            ] ,            [
                                                                            "id"=>"ea05ac80-0646-11eb-8b21-b373a2ba90b2",
                                                                                        "created_at"=>"2020-10-04 13:38:40",
                                                                                        "updated_at"=>"2020-10-04 13:38:40",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "permission_id"=>"ea0507a0-0646-11eb-bc80-015049fb6bd5",
                                                                                        "policy_id"=>"e9fb8a40-0646-11eb-8293-f7c3068a2d5f"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_permission_policy_associations')->where('engine_application_id', '8374144e-94a5-470d-8d9e-4cbad05102ad')->delete();
            }
}
