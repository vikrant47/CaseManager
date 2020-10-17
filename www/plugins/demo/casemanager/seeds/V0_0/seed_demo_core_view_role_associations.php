<?php
namespace Demo\Casemanager\Seeds\V0_0;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds casemanager d */
class SeedDemoCoreViewRoleAssociations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_view_role_associations')->insert([
            [
                                                                            "id"=>"2c134a90-a880-11ea-9a91-a559200a3700",
                                                                                        "created_at"=>"2020-06-07 05:31:43",
                                                                                        "updated_at"=>"2020-06-07 05:31:43",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"fa00326d-63d6-4d51-84ee-9567cd8bf986",
                                                                                        "model"=>"Demo\Core\Models\FormAction",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83"
                            ] ,            [
                                                                            "id"=>"400eff70-a880-11ea-87e8-0992d922c70c",
                                                                                        "created_at"=>"2020-06-07 05:32:17",
                                                                                        "updated_at"=>"2020-06-07 05:32:17",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"27909423-8ed9-4465-801c-c0f081f286fc",
                                                                                        "model"=>"Demo\Core\Models\FormAction",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83"
                            ] ,            [
                                                                            "id"=>"f3084400-da22-11ea-a6be-dbf5a5e0e97b",
                                                                                        "created_at"=>"2020-08-09 09:30:22",
                                                                                        "updated_at"=>"2020-08-09 09:30:22",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"4f95d22e-7293-4495-81f8-ee194bac2c8b",
                                                                                        "model"=>"Demo\Core\Models\ListAction",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354",
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83"
                            ] ,            [
                                                                            "id"=>"f30a2310-da22-11ea-811f-012f998e24e8",
                                                                                        "created_at"=>"2020-08-09 09:30:22",
                                                                                        "updated_at"=>"2020-08-09 09:30:22",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"4f95d22e-7293-4495-81f8-ee194bac2c8b",
                                                                                        "model"=>"Demo\Core\Models\ListAction",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83"
                            ] ,            [
                                                                            "id"=>"4ba0eda0-ae04-11ea-a21d-ed3a60d00a8e",
                                                                                        "created_at"=>"2020-06-14 06:00:06",
                                                                                        "updated_at"=>"2020-06-14 06:00:06",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"6f85afbb-3858-4387-b4ce-9f70cf19ed20",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83"
                            ] ,            [
                                                                            "id"=>"f05e64c0-b2bf-11ea-872f-f77d0bd20adc",
                                                                                        "created_at"=>"2020-06-20 06:33:22",
                                                                                        "updated_at"=>"2020-06-20 06:33:22",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"81d30c41-fd09-4757-a6f9-e92463faf8bc",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83"
                            ] ,            [
                                                                            "id"=>"7e321b10-c4fb-11ea-b7b0-fb8dabdebb2d",
                                                                                        "created_at"=>"2020-07-13 11:25:02",
                                                                                        "updated_at"=>"2020-07-13 11:25:02",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"c3984be1-820c-4cc8-a675-742815313468",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83"
                            ] ,            [
                                                                            "id"=>"a52952a0-cf50-11ea-b0f3-33eb05cd13b0",
                                                                                        "created_at"=>"2020-07-26 14:59:46",
                                                                                        "updated_at"=>"2020-07-26 14:59:46",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"d965a574-969f-40cf-a735-524cdacfe676",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354",
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83"
                            ] ,            [
                                                                            "id"=>"a533a010-cf50-11ea-a421-675c1ebfce28",
                                                                                        "created_at"=>"2020-07-26 14:59:46",
                                                                                        "updated_at"=>"2020-07-26 14:59:46",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"7ffd7ee5-deb5-41af-876f-6bac700a35be",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354",
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83"
                            ] ,            [
                                                                            "id"=>"a5356640-cf50-11ea-a564-a9165a563f69",
                                                                                        "created_at"=>"2020-07-26 14:59:46",
                                                                                        "updated_at"=>"2020-07-26 14:59:46",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"c3984be1-820c-4cc8-a675-742815313468",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354",
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83"
                            ] ,            [
                                                                            "id"=>"a5376b80-cf50-11ea-bcc6-07e1047ce49a",
                                                                                        "created_at"=>"2020-07-26 14:59:46",
                                                                                        "updated_at"=>"2020-07-26 14:59:46",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"6f85afbb-3858-4387-b4ce-9f70cf19ed20",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354",
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83"
                            ] ,            [
                                                                            "id"=>"a53e8520-cf50-11ea-9f38-654cfb64b129",
                                                                                        "created_at"=>"2020-07-26 14:59:46",
                                                                                        "updated_at"=>"2020-07-26 14:59:46",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"7fc66991-e2ac-4d1f-9aec-282d485287eb",
                                                                                        "model"=>"Demo\Core\Models\ListAction",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354",
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83"
                            ] ,            [
                                                                            "id"=>"a5483f80-cf50-11ea-b43c-83913b7a47ca",
                                                                                        "created_at"=>"2020-07-26 14:59:46",
                                                                                        "updated_at"=>"2020-07-26 14:59:46",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"54e73d14-1a67-4327-91a7-3e5b1aa49a90",
                                                                                        "model"=>"Demo\Core\Models\FormAction",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354",
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83"
                            ] ,            [
                                                                            "id"=>"a54bad00-cf50-11ea-a3ba-854fee095500",
                                                                                        "created_at"=>"2020-07-26 14:59:46",
                                                                                        "updated_at"=>"2020-07-26 14:59:46",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"0625b4f7-ab22-48ba-9eb2-e748cad64eab",
                                                                                        "model"=>"Demo\Core\Models\FormAction",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354",
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83"
                            ] ,            [
                                                                            "id"=>"a54dcde0-cf50-11ea-b05b-8958360d9e54",
                                                                                        "created_at"=>"2020-07-26 14:59:46",
                                                                                        "updated_at"=>"2020-07-26 14:59:46",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"fa00326d-63d6-4d51-84ee-9567cd8bf986",
                                                                                        "model"=>"Demo\Core\Models\FormAction",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354",
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83"
                            ] ,            [
                                                                            "id"=>"a5504840-cf50-11ea-8a96-551b5fd1c669",
                                                                                        "created_at"=>"2020-07-26 14:59:46",
                                                                                        "updated_at"=>"2020-07-26 14:59:46",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"74aa9c40-9618-4fc2-890f-35d98a81b875",
                                                                                        "model"=>"Demo\Core\Models\FormAction",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354",
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83"
                            ] ,            [
                                                                            "id"=>"a5529880-cf50-11ea-bb05-f51f562d9c7a",
                                                                                        "created_at"=>"2020-07-26 14:59:46",
                                                                                        "updated_at"=>"2020-07-26 14:59:46",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"60f9be27-c475-462f-a146-40588aa0bc91",
                                                                                        "model"=>"Demo\Core\Models\FormAction",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354",
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83"
                            ] ,            [
                                                                            "id"=>"a5564bd0-cf50-11ea-991d-ff884bd810d7",
                                                                                        "created_at"=>"2020-07-26 14:59:46",
                                                                                        "updated_at"=>"2020-07-26 14:59:46",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"c916ac69-bfd1-4ccc-8b75-2d8160831de6",
                                                                                        "model"=>"Demo\Core\Models\FormAction",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354",
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83"
                            ] ,            [
                                                                            "id"=>"a559d540-cf50-11ea-b194-27035d27371a",
                                                                                        "created_at"=>"2020-07-26 14:59:46",
                                                                                        "updated_at"=>"2020-07-26 14:59:46",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"eaa211e4-d899-413b-b6ef-64339b3b3626",
                                                                                        "model"=>"Demo\Core\Models\FormAction",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354",
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83"
                            ] ,            [
                                                                            "id"=>"a55bce80-cf50-11ea-8533-ab8a0765edda",
                                                                                        "created_at"=>"2020-07-26 14:59:46",
                                                                                        "updated_at"=>"2020-07-26 14:59:46",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"27909423-8ed9-4465-801c-c0f081f286fc",
                                                                                        "model"=>"Demo\Core\Models\FormAction",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354",
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83"
                            ] ,            [
                                                                            "id"=>"65e9a460-02d4-11eb-a657-f12582be633a",
                                                                                        "created_at"=>"2020-09-30 04:21:23",
                                                                                        "updated_at"=>"2020-09-30 04:21:23",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"01f868fa-2ac6-42c1-b5e0-030df343dd31",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354",
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83"
                            ] ,            [
                                                                            "id"=>"65ea07c0-02d4-11eb-a06f-89a13c6b8f10",
                                                                                        "created_at"=>"2020-09-30 04:21:23",
                                                                                        "updated_at"=>"2020-09-30 04:21:23",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"01f868fa-2ac6-42c1-b5e0-030df343dd31",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_view_role_associations')->where('engine_application_id', 'df07f9b4-26c1-40ca-ba1f-1b77b1692b83')->delete();
            }
}
