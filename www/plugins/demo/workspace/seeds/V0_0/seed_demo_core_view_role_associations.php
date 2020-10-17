<?php
namespace Demo\Workspace\Seeds\V0_0;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds workflow d */
class SeedDemoCoreViewRoleAssociations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_view_role_associations')->insert([
            [
                                                                            "id"=>"428bc2b0-084c-11eb-9e8a-0334846384c5",
                                                                                        "created_at"=>"2020-10-07 03:21:59",
                                                                                        "updated_at"=>"2020-10-07 03:21:59",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"bcd5d88e-e08f-47e0-a377-5761c8cc3754",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"615474e0-084d-11eb-b7d6-ff6a5a4bf945",
                                                                                        "created_at"=>"2020-10-07 03:30:00",
                                                                                        "updated_at"=>"2020-10-07 03:30:00",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"2b9c5851-39a1-4c32-9bb9-b51958fdeee8",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"26a99480-02d3-11eb-bc4b-052282e390f2",
                                                                                        "created_at"=>"2020-09-30 04:12:27",
                                                                                        "updated_at"=>"2020-09-30 04:12:27",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"1167df07-11a5-467e-af94-28257f1bf241",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"1cf05060-02d4-11eb-9c42-5bbcd39d0e0a",
                                                                                        "created_at"=>"2020-09-30 04:19:20",
                                                                                        "updated_at"=>"2020-09-30 04:19:20",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"492e6fda-26f4-4115-aff6-b771a7220e46",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"ded99770-0580-11eb-a73f-1fbf0b632f62",
                                                                                        "created_at"=>"2020-10-03 14:01:01",
                                                                                        "updated_at"=>"2020-10-03 14:01:01",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"1f280b8a-9dbd-4b58-a295-59c0740b315d",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_view_role_associations')->where('engine_application_id', '8374144e-94a5-470d-8d9e-4cbad05102ad')->delete();
            }
}
