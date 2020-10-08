<?php
namespace Demo\Workflow\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds workflow d */
class SeedDemoCoreFormFields implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_form_fields')->insert([
            [
                                                                            "id"=>"8c227c70-08b0-11eb-907d-d372511f3955",
                                                                                        "created_at"=>"2020-10-07 15:19:52",
                                                                                        "updated_at"=>"2020-10-07 15:23:11",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "field_id"=>"2bde4950-085c-11eb-a301-f530102ab6a2",
                                                                                        "form"=>"\$/demo/core/models/coreuser/fields.yaml",
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "controls"=>"{\r\n  \"fields\": {\r\n    \"work_profile\": {\r\n      \"oc.fieldName\": \"work_profile\",\r\n      \"name\": \"work_profile\",\r\n      \"label\": \"Work Profile\",\r\n      \"oc.comment\": \"Select the Work Profile for user\",\r\n      \"span\": \"auto\",\r\n      \"type\": \"relation\",\r\n      \"association\": {\r\n        \"alias\": \"work_profile\",\r\n        \"type\": \"belongsTo\",\r\n        \"key\": \"demo_workflow_work_profile_id\",\r\n        \"model\": \"Demo\\Workflow\\Models\\WorkProfile\"\r\n      }\r\n    }\r\n  }\r\n}",
                                                                                        "description"=>"<p>This field is pushed by workflow application</p>",
                                                                                        "active"=> 1,
                                                                                        "virtual"=> false
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_form_fields')->where('engine_application_id', '8374144e-94a5-470d-8d9e-4cbad05102ad')->delete();
            }
}
