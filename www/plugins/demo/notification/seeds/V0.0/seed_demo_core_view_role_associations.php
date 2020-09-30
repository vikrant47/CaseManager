<?php
namespace Demo\Notification\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds notification d */
class SeedDemoCoreViewRoleAssociations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_view_role_associations')->insert([
            [
                                                                            "id"=>"1809fdc0-f88d-11ea-8758-2dd416bb43ed",
                                                                                        "created_at"=>"2020-09-17 02:25:46",
                                                                                        "updated_at"=>"2020-09-17 02:25:46",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"9ab44ba4-d108-437f-8025-b999fcffa10c",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"c79b3f36-a77a-4de9-a9f0-f890a99728ef"
                            ] ,            [
                                                                            "id"=>"19ecaf80-02d7-11eb-9446-4be612aa320f",
                                                                                        "created_at"=>"2020-09-30 04:40:44",
                                                                                        "updated_at"=>"2020-09-30 04:40:44",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"43098bfd-5bf8-4979-a9b4-1fb837f327f3",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"c79b3f36-a77a-4de9-a9f0-f890a99728ef"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_view_role_associations')->where('engine_application_id', 'c79b3f36-a77a-4de9-a9f0-f890a99728ef')->delete();
            }
}
