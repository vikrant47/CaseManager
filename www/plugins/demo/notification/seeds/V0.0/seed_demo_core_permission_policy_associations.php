<?php
namespace Demo\Notification\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds notification d */
class SeedDemoCorePermissionPolicyAssociations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_permission_policy_associations')->insert([
            [
                                                                            "id"=>"184216ef-08e4-4cf8-aa62-7b65d126eff3",
                                                                                        "created_at"=>"2020-05-17 05:47:53",
                                                                                        "updated_at"=>"2020-05-17 05:47:53",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"c79b3f36-a77a-4de9-a9f0-f890a99728ef",
                                                                                        "permission_id"=>"4537497b-b519-44d4-9f2a-bb37e102ad31",
                                                                                        "policy_id"=>"ccb4059f-d21c-4e9a-9a33-ede9a46b3291"
                            ] ,            [
                                                                            "id"=>"72105d80-17fd-405e-9375-8e524b83162d",
                                                                                        "created_at"=>"2020-05-17 05:47:53",
                                                                                        "updated_at"=>"2020-05-17 05:47:53",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"c79b3f36-a77a-4de9-a9f0-f890a99728ef",
                                                                                        "permission_id"=>"41152b61-10bd-4e93-baaa-515b7ee8b1d9",
                                                                                        "policy_id"=>"ccb4059f-d21c-4e9a-9a33-ede9a46b3291"
                            ] ,            [
                                                                            "id"=>"ae690372-6d82-44a9-9179-0f92fec7434d",
                                                                                        "created_at"=>"2020-05-17 05:52:10",
                                                                                        "updated_at"=>"2020-05-17 05:52:10",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"c79b3f36-a77a-4de9-a9f0-f890a99728ef",
                                                                                        "permission_id"=>"87e96f3e-0bba-443a-b420-57278b4ed0e7",
                                                                                        "policy_id"=>"c789ebf5-15b8-47fe-94b3-52a2b78c1397"
                            ] ,            [
                                                                            "id"=>"993298aa-f2d9-4639-9eaf-061b85d5e9cb",
                                                                                        "created_at"=>"2020-05-17 05:52:11",
                                                                                        "updated_at"=>"2020-05-17 05:52:11",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"c79b3f36-a77a-4de9-a9f0-f890a99728ef",
                                                                                        "permission_id"=>"56353b9f-78b8-480a-909a-ed0d6641b6c9",
                                                                                        "policy_id"=>"c789ebf5-15b8-47fe-94b3-52a2b78c1397"
                            ] ,            [
                                                                            "id"=>"4d4aea7c-0441-4da4-a7dc-39f5479cd3e8",
                                                                                        "created_at"=>"2020-05-17 05:52:11",
                                                                                        "updated_at"=>"2020-05-17 05:52:11",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"c79b3f36-a77a-4de9-a9f0-f890a99728ef",
                                                                                        "permission_id"=>"9f7304df-5b8e-4fa1-91a3-96a1d5d00df8",
                                                                                        "policy_id"=>"c789ebf5-15b8-47fe-94b3-52a2b78c1397"
                            ] ,            [
                                                                            "id"=>"b036b07b-a7e5-4f37-9e0a-3de849ad1c23",
                                                                                        "created_at"=>"2020-05-17 05:52:11",
                                                                                        "updated_at"=>"2020-05-17 05:52:11",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"c79b3f36-a77a-4de9-a9f0-f890a99728ef",
                                                                                        "permission_id"=>"6cf18928-ad33-440e-b7b9-61cd43554ed9",
                                                                                        "policy_id"=>"c789ebf5-15b8-47fe-94b3-52a2b78c1397"
                            ] ,            [
                                                                            "id"=>"5f704a75-94e9-4ae2-9dbc-c27bad9bd6d2",
                                                                                        "created_at"=>"2020-05-17 05:53:01",
                                                                                        "updated_at"=>"2020-05-17 05:53:01",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"c79b3f36-a77a-4de9-a9f0-f890a99728ef",
                                                                                        "permission_id"=>"8a4f3d17-7b60-4f64-b360-977892c78bcc",
                                                                                        "policy_id"=>"d1b96d4c-11d9-4450-bf3f-d6a387cecbc9"
                            ] ,            [
                                                                            "id"=>"dabf8aa8-edd1-4d5d-a2b1-b27758a39f06",
                                                                                        "created_at"=>"2020-05-17 05:53:01",
                                                                                        "updated_at"=>"2020-05-17 05:53:01",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"c79b3f36-a77a-4de9-a9f0-f890a99728ef",
                                                                                        "permission_id"=>"ce0238d2-5a0d-487e-b323-665b1d81c7e4",
                                                                                        "policy_id"=>"d1b96d4c-11d9-4450-bf3f-d6a387cecbc9"
                            ] ,            [
                                                                            "id"=>"ba063af8-7a46-4397-928c-ea11ed1b8cc8",
                                                                                        "created_at"=>"2020-05-17 05:53:01",
                                                                                        "updated_at"=>"2020-05-17 05:53:01",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"c79b3f36-a77a-4de9-a9f0-f890a99728ef",
                                                                                        "permission_id"=>"24e2709c-4cb9-481c-b3bf-b08d8a62f427",
                                                                                        "policy_id"=>"d1b96d4c-11d9-4450-bf3f-d6a387cecbc9"
                            ] ,            [
                                                                            "id"=>"b91a9ec0-f82a-49d3-b3b7-049e63ba3a7c",
                                                                                        "created_at"=>"2020-05-17 05:53:01",
                                                                                        "updated_at"=>"2020-05-17 05:53:01",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"c79b3f36-a77a-4de9-a9f0-f890a99728ef",
                                                                                        "permission_id"=>"134dab70-f285-42d7-b0ff-7167e2acbe35",
                                                                                        "policy_id"=>"d1b96d4c-11d9-4450-bf3f-d6a387cecbc9"
                            ] ,            [
                                                                            "id"=>"5c8c0de0-cb32-443e-b467-1934b6841afa",
                                                                                        "created_at"=>"2020-05-17 05:46:59",
                                                                                        "updated_at"=>"2020-05-17 05:46:59",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"c79b3f36-a77a-4de9-a9f0-f890a99728ef",
                                                                                        "permission_id"=>"40847dce-06cd-4394-9451-96716753fcfd",
                                                                                        "policy_id"=>"17d879db-f891-432e-8621-758eaf89593f"
                            ] ,            [
                                                                            "id"=>"acf087f3-0407-4010-87b6-41e93e36c481",
                                                                                        "created_at"=>"2020-05-17 05:46:59",
                                                                                        "updated_at"=>"2020-05-17 05:46:59",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"c79b3f36-a77a-4de9-a9f0-f890a99728ef",
                                                                                        "permission_id"=>"6672677a-c0af-45a2-b96e-e2d300ac59b5",
                                                                                        "policy_id"=>"17d879db-f891-432e-8621-758eaf89593f"
                            ] ,            [
                                                                            "id"=>"bbcfae92-6953-4179-920e-960f192ad9cf",
                                                                                        "created_at"=>"2020-05-17 05:46:59",
                                                                                        "updated_at"=>"2020-05-17 05:46:59",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"c79b3f36-a77a-4de9-a9f0-f890a99728ef",
                                                                                        "permission_id"=>"ca2418d8-46c9-493e-be1e-dcc048b9f74b",
                                                                                        "policy_id"=>"17d879db-f891-432e-8621-758eaf89593f"
                            ] ,            [
                                                                            "id"=>"f6754b7f-46a0-4424-8ca7-7d485c322bfc",
                                                                                        "created_at"=>"2020-05-17 05:46:59",
                                                                                        "updated_at"=>"2020-05-17 05:46:59",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"c79b3f36-a77a-4de9-a9f0-f890a99728ef",
                                                                                        "permission_id"=>"4562741d-d316-42d1-b0c9-6f78137e8a40",
                                                                                        "policy_id"=>"17d879db-f891-432e-8621-758eaf89593f"
                            ] ,            [
                                                                            "id"=>"42764bc5-8db0-486b-a184-1a7149640b3b",
                                                                                        "created_at"=>"2020-05-17 05:47:53",
                                                                                        "updated_at"=>"2020-05-17 05:47:53",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"c79b3f36-a77a-4de9-a9f0-f890a99728ef",
                                                                                        "permission_id"=>"36f5d231-9449-4b4a-acf0-cac67b0f440a",
                                                                                        "policy_id"=>"ccb4059f-d21c-4e9a-9a33-ede9a46b3291"
                            ] ,            [
                                                                            "id"=>"99d407b2-d49a-49df-9210-467609b24b52",
                                                                                        "created_at"=>"2020-05-17 05:47:53",
                                                                                        "updated_at"=>"2020-05-17 05:47:53",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"c79b3f36-a77a-4de9-a9f0-f890a99728ef",
                                                                                        "permission_id"=>"844b8eb0-86f0-48b8-a8ca-f2aecf138f28",
                                                                                        "policy_id"=>"ccb4059f-d21c-4e9a-9a33-ede9a46b3291"
                            ] ,            [
                                                                            "id"=>"c37d2350-e9c6-11ea-870d-ad52304d85ea",
                                                                                        "created_at"=>"2020-08-29 07:10:48",
                                                                                        "updated_at"=>"2020-08-29 07:10:48",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"c79b3f36-a77a-4de9-a9f0-f890a99728ef",
                                                                                        "permission_id"=>"c36f9b00-e9c6-11ea-ae16-11860d7ded48",
                                                                                        "policy_id"=>"c359e680-e9c6-11ea-b144-25830ad29c16"
                            ] ,            [
                                                                            "id"=>"c394e620-e9c6-11ea-81b5-85dc1cdff760",
                                                                                        "created_at"=>"2020-08-29 07:10:48",
                                                                                        "updated_at"=>"2020-08-29 07:10:48",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"c79b3f36-a77a-4de9-a9f0-f890a99728ef",
                                                                                        "permission_id"=>"c38b9080-e9c6-11ea-8d81-bb16ba9ca740",
                                                                                        "policy_id"=>"c359e680-e9c6-11ea-b144-25830ad29c16"
                            ] ,            [
                                                                            "id"=>"c3a9b840-e9c6-11ea-8326-4580ddecd469",
                                                                                        "created_at"=>"2020-08-29 07:10:48",
                                                                                        "updated_at"=>"2020-08-29 07:10:48",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"c79b3f36-a77a-4de9-a9f0-f890a99728ef",
                                                                                        "permission_id"=>"c3a05a10-e9c6-11ea-8d1c-7b588be70a14",
                                                                                        "policy_id"=>"c359e680-e9c6-11ea-b144-25830ad29c16"
                            ] ,            [
                                                                            "id"=>"c3be7b60-e9c6-11ea-8410-677a85b9ef21",
                                                                                        "created_at"=>"2020-08-29 07:10:48",
                                                                                        "updated_at"=>"2020-08-29 07:10:48",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"c79b3f36-a77a-4de9-a9f0-f890a99728ef",
                                                                                        "permission_id"=>"c3b53280-e9c6-11ea-a423-8f9b78065ae0",
                                                                                        "policy_id"=>"c359e680-e9c6-11ea-b144-25830ad29c16"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_permission_policy_associations')->where('engine_application_id', 'c79b3f36-a77a-4de9-a9f0-f890a99728ef')->delete();
            }
}
