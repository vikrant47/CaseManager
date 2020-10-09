<?php
namespace Demo\Workflow\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds workflow d */
class SeedDemoCoreCustomFields implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_custom_fields')->insert([
            [
                                                                            "id"=>"2bde4950-085c-11eb-a301-f530102ab6a2",
                                                                                        "created_at"=>"2020-10-07 05:15:58",
                                                                                        "updated_at"=>"2020-10-07 05:15:58",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Workflow Profile",
                                                                                        "description"=> "",
                                                                                        "type"=>"string",
                                                                                        "model"=>"Demo\Core\Models\CoreUser",
                                                                                        "length"=> 255,
                                                                                        "unsigned"=> false,
                                                                                        "allow_null"=> 1,
                                                                                        "default"=> "",
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "code"=>"demo_workflow_work_profile_id"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_custom_fields')->where('engine_application_id', '8374144e-94a5-470d-8d9e-4cbad05102ad')->delete();
            }
}
