<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds casemanager d */
class SeedDemoWorkflowServiceChannels implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_workflow_service_channels')->insert([
            [
                                                                            "id"=>"6aec2f36-3de0-4131-b326-de418cb8549a",
                                                                                        "created_at"=>"2020-04-04 06:03:08",
                                                                                        "updated_at"=>"2020-10-04 06:38:31",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "name"=>"Case Channel",
                                                                                        "event"=>"[\"creating\"]",
                                                                                        "description"=> "",
                                                                                        "model"=>"Demo\Workflow\Models\WorkflowItem",
                                                                                        "priority"=> 1,
                                                                                        "active"=> 1,
                                                                                        "condition"=>"{\r\n  \"condition\": \"AND\",\r\n  \"rules\": [\r\n    {\r\n      \"id\": \"model\",\r\n      \"field\": \"model\",\r\n      \"type\": \"relation\",\r\n      \"input\": \"select\",\r\n      \"operator\": \"equal\",\r\n      \"value\": \"Demo\\Casemanager\\Models\\CaseModel\",\r\n      \"displayValue\": \"Case Model\"\r\n    }\r\n  ],\r\n  \"not\": false,\r\n  \"valid\": true\r\n}"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_workflow_service_channels')->where('engine_application_id', 'df07f9b4-26c1-40ca-ba1f-1b77b1692b83')->delete();
            }
}
