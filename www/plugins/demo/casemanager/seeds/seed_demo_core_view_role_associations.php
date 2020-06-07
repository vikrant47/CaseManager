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
                                                                                        "id"=>"2c0ee560-a880-11ea-abb7-e54d3556257c",
                                                                                        "record_id"=>"fa00326d-63d6-4d51-84ee-9567cd8bf986",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354"
                            ] ,            [
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
                                                                                        "id"=>"400d3670-a880-11ea-9614-fdd407903e9c",
                                                                                        "record_id"=>"27909423-8ed9-4465-801c-c0f081f286fc",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354"
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
                                                                            "created_at"=>"2020-06-07 05:44:45",
                                                                                        "updated_at"=>"2020-06-07 05:44:45",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\ListAction",
                                                                                        "id"=>"fe0316f0-a881-11ea-9296-91b45c3109d9",
                                                                                        "record_id"=>"4f95d22e-7293-4495-81f8-ee194bac2c8b",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354"
                            ] ,            [
                                                                            "created_at"=>"2020-06-07 05:44:45",
                                                                                        "updated_at"=>"2020-06-07 05:44:45",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\ListAction",
                                                                                        "id"=>"fe04f2c0-a881-11ea-92bc-e5a4865dc722",
                                                                                        "record_id"=>"4f95d22e-7293-4495-81f8-ee194bac2c8b",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357"
                            ] ,            [
                                                                            "created_at"=>"2020-06-07 06:06:12",
                                                                                        "updated_at"=>"2020-06-07 06:06:12",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "id"=>"fcea6880-a884-11ea-9ed7-d70509c75c76",
                                                                                        "record_id"=>"c3984be1-820c-4cc8-a675-742815313468",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354"
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
                                                                            "created_at"=>"2020-06-07 06:06:24",
                                                                                        "updated_at"=>"2020-06-07 06:06:24",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "id"=>"0462a1c0-a885-11ea-9fb3-c5c359171e61",
                                                                                        "record_id"=>"6f85afbb-3858-4387-b4ce-9f70cf19ed20",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354"
                            ] ,            [
                                                                            "created_at"=>"2020-06-07 06:06:24",
                                                                                        "updated_at"=>"2020-06-07 06:06:24",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "id"=>"04643150-a885-11ea-a5c1-d17f28825d99",
                                                                                        "record_id"=>"6f85afbb-3858-4387-b4ce-9f70cf19ed20",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357"
                            ] ,            [
                                                                            "created_at"=>"2020-06-07 06:06:40",
                                                                                        "updated_at"=>"2020-06-07 06:06:40",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "id"=>"0dcb1220-a885-11ea-a77e-4990311612d4",
                                                                                        "record_id"=>"01f868fa-2ac6-42c1-b5e0-030df343dd31",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354"
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
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_view_role_associations')->where('plugin_id', 6)->delete();
            }
}
