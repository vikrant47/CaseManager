<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Casemanager d */
class SeedDemoCoreViewRoleAssociations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_view_role_associations')->insert([
            [
                                                                            "created_at"=>"2020-06-07 05:31:43",
                                                                                        "updated_at"=>"2020-06-07 05:31:43",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\FormAction",
                                                                                        "id"=>"2c134a90-a880-11ea-9a91-a559200a3700",
                                                                                        "record_id"=>"fa00326d-63d6-4d51-84ee-9567cd8bf986",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357"
                            ] ,            [
                                                                            "created_at"=>"2020-06-07 05:32:17",
                                                                                        "updated_at"=>"2020-06-07 05:32:17",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\FormAction",
                                                                                        "id"=>"400eff70-a880-11ea-87e8-0992d922c70c",
                                                                                        "record_id"=>"27909423-8ed9-4465-801c-c0f081f286fc",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357"
                            ] ,            [
                                                                            "created_at"=>"2020-06-07 06:06:12",
                                                                                        "updated_at"=>"2020-06-07 06:06:12",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "id"=>"fcebe540-a884-11ea-b4fd-6bd235501abb",
                                                                                        "record_id"=>"c3984be1-820c-4cc8-a675-742815313468",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357"
                            ] ,            [
                                                                            "created_at"=>"2020-06-07 06:06:40",
                                                                                        "updated_at"=>"2020-06-07 06:06:40",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "id"=>"0dcdefa0-a885-11ea-af05-49a1b65feffa",
                                                                                        "record_id"=>"01f868fa-2ac6-42c1-b5e0-030df343dd31",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357"
                            ] ,            [
                                                                            "created_at"=>"2020-06-07 13:24:04",
                                                                                        "updated_at"=>"2020-06-07 13:24:04",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "id"=>"2891b220-a8c2-11ea-b9aa-95484a1a69c2",
                                                                                        "record_id"=>"d965a574-969f-40cf-a735-524cdacfe676",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354"
                            ] ,            [
                                                                            "created_at"=>"2020-06-07 13:24:04",
                                                                                        "updated_at"=>"2020-06-07 13:24:04",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "id"=>"28934c50-a8c2-11ea-bc4e-dfb02a9f9d8b",
                                                                                        "record_id"=>"fdf384c5-bdb6-4294-81a4-af302b12b332",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354"
                            ] ,            [
                                                                            "created_at"=>"2020-06-07 13:24:04",
                                                                                        "updated_at"=>"2020-06-07 13:24:04",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "id"=>"289485d0-a8c2-11ea-b2eb-8908a7c2000f",
                                                                                        "record_id"=>"c3984be1-820c-4cc8-a675-742815313468",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354"
                            ] ,            [
                                                                            "created_at"=>"2020-06-07 13:24:04",
                                                                                        "updated_at"=>"2020-06-07 13:24:04",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "id"=>"2895f770-a8c2-11ea-a4e9-dda1052b7670",
                                                                                        "record_id"=>"01f868fa-2ac6-42c1-b5e0-030df343dd31",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354"
                            ] ,            [
                                                                            "created_at"=>"2020-06-07 13:24:04",
                                                                                        "updated_at"=>"2020-06-07 13:24:04",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "id"=>"28976b30-a8c2-11ea-a065-9fef9822f404",
                                                                                        "record_id"=>"3280cd3c-8a95-4683-b661-7846bc9fdf03",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354"
                            ] ,            [
                                                                            "created_at"=>"2020-06-07 13:24:04",
                                                                                        "updated_at"=>"2020-06-07 13:24:04",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "id"=>"2898a5c0-a8c2-11ea-8eec-05d3ddb23398",
                                                                                        "record_id"=>"7ffd7ee5-deb5-41af-876f-6bac700a35be",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354"
                            ] ,            [
                                                                            "created_at"=>"2020-06-07 13:24:04",
                                                                                        "updated_at"=>"2020-06-07 13:24:04",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\FormAction",
                                                                                        "id"=>"289f7120-a8c2-11ea-b4f8-7bd2972e4bf9",
                                                                                        "record_id"=>"54e73d14-1a67-4327-91a7-3e5b1aa49a90",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354"
                            ] ,            [
                                                                            "created_at"=>"2020-06-07 13:24:04",
                                                                                        "updated_at"=>"2020-06-07 13:24:04",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\FormAction",
                                                                                        "id"=>"28a0a8b0-a8c2-11ea-a2e3-23f3e5ce7dc6",
                                                                                        "record_id"=>"0625b4f7-ab22-48ba-9eb2-e748cad64eab",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354"
                            ] ,            [
                                                                            "created_at"=>"2020-06-07 13:24:04",
                                                                                        "updated_at"=>"2020-06-07 13:24:04",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\FormAction",
                                                                                        "id"=>"28a21f10-a8c2-11ea-8e6d-050b8c2db76b",
                                                                                        "record_id"=>"fa00326d-63d6-4d51-84ee-9567cd8bf986",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354"
                            ] ,            [
                                                                            "created_at"=>"2020-06-07 13:24:04",
                                                                                        "updated_at"=>"2020-06-07 13:24:04",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\FormAction",
                                                                                        "id"=>"28a35720-a8c2-11ea-b027-8f2b7e0eef92",
                                                                                        "record_id"=>"74aa9c40-9618-4fc2-890f-35d98a81b875",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354"
                            ] ,            [
                                                                            "created_at"=>"2020-06-07 13:24:04",
                                                                                        "updated_at"=>"2020-06-07 13:24:04",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\FormAction",
                                                                                        "id"=>"28a4e7c0-a8c2-11ea-aeee-9785aed28735",
                                                                                        "record_id"=>"60f9be27-c475-462f-a146-40588aa0bc91",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354"
                            ] ,            [
                                                                            "created_at"=>"2020-06-07 13:24:04",
                                                                                        "updated_at"=>"2020-06-07 13:24:04",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\FormAction",
                                                                                        "id"=>"28a62f10-a8c2-11ea-8840-f5dfc0972067",
                                                                                        "record_id"=>"c916ac69-bfd1-4ccc-8b75-2d8160831de6",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354"
                            ] ,            [
                                                                            "created_at"=>"2020-06-07 13:24:04",
                                                                                        "updated_at"=>"2020-06-07 13:24:04",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\FormAction",
                                                                                        "id"=>"28a784a0-a8c2-11ea-99a6-6de2ee7c06c6",
                                                                                        "record_id"=>"eaa211e4-d899-413b-b6ef-64339b3b3626",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354"
                            ] ,            [
                                                                            "created_at"=>"2020-06-07 13:24:04",
                                                                                        "updated_at"=>"2020-06-07 13:24:04",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\FormAction",
                                                                                        "id"=>"28a8b9e0-a8c2-11ea-8b45-4f0352468a84",
                                                                                        "record_id"=>"27909423-8ed9-4465-801c-c0f081f286fc",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354"
                            ] ,            [
                                                                            "created_at"=>"2020-06-14 06:00:05",
                                                                                        "updated_at"=>"2020-06-14 06:00:05",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "id"=>"4b959dd0-ae04-11ea-9164-3fe3652dc825",
                                                                                        "record_id"=>"6f85afbb-3858-4387-b4ce-9f70cf19ed20",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354"
                            ] ,            [
                                                                            "created_at"=>"2020-06-14 06:00:06",
                                                                                        "updated_at"=>"2020-06-14 06:00:06",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "id"=>"4ba0eda0-ae04-11ea-a21d-ed3a60d00a8e",
                                                                                        "record_id"=>"6f85afbb-3858-4387-b4ce-9f70cf19ed20",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357"
                            ] ,            [
                                                                            "created_at"=>"2020-06-20 06:33:22",
                                                                                        "updated_at"=>"2020-06-20 06:33:22",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "id"=>"f05e64c0-b2bf-11ea-872f-f77d0bd20adc",
                                                                                        "record_id"=>"81d30c41-fd09-4757-a6f9-e92463faf8bc",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357"
                            ] ,            [
                                                                            "created_at"=>"2020-06-21 05:03:28",
                                                                                        "updated_at"=>"2020-06-21 05:03:28",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\ListAction",
                                                                                        "id"=>"8b68e750-b37c-11ea-b6aa-d7c3f5f65064",
                                                                                        "record_id"=>"4f95d22e-7293-4495-81f8-ee194bac2c8b",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354"
                            ] ,            [
                                                                            "created_at"=>"2020-06-21 05:03:28",
                                                                                        "updated_at"=>"2020-06-21 05:03:28",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\ListAction",
                                                                                        "id"=>"8b6aa960-b37c-11ea-ac23-31835be01a17",
                                                                                        "record_id"=>"4f95d22e-7293-4495-81f8-ee194bac2c8b",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_view_role_associations')->where('plugin_id', 6)->delete();
            }
}
