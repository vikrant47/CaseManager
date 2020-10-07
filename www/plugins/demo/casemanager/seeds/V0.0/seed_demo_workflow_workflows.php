<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds casemanager d */
class SeedDemoWorkflowWorkflows implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_workflow_workflows')->insert([
            [
                                                                            "id"=>"dd25a3b6-0e8b-4af7-b50d-d9030068b84a",
                                                                                        "created_at"=>"2019-10-08 08:17:55",
                                                                                        "updated_at"=>"2020-10-07 02:04:25",
                                                                                        "active"=> 1,
                                                                                        "name"=>"Case Workflow (P1 should be completed within 5 days)",
                                                                                        "code"=>"case-workflow",
                                                                                        "description"=>"Case Workflow sdsdsd",
                                                                                        "definition"=>"[{\"from_state\":\"09dfd34e-0db5-49f3-96b2-23831d811a0b\",\"to_state\":\"16d9ddab-a130-4bbd-8d5c-b3e82fbf00de\",\"queue\":\"c83b37aa-0fd9-4987-bff7-1a604da1ffde\",\"timeout\":1},{\"from_state\":\"16d9ddab-a130-4bbd-8d5c-b3e82fbf00de\",\"to_state\":\"c5a45023-2d2a-48ca-94b1-3097c0af7d05\",\"queue\":\"c83b37aa-0fd9-4987-bff7-1a604da1ffde\",\"timeout\":2},{\"from_state\":\"c5a45023-2d2a-48ca-94b1-3097c0af7d05\",\"to_state\":\"8c7e9158-b65c-437a-a5d9-4b975f7b6f51\",\"queue\":\"c83b37aa-0fd9-4987-bff7-1a604da1ffde\",\"timeout\":1}]",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "sort_order"=> 0,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "condition"=>"null",
                                                                                        "event"=>"created",
                                                                                        "model_state_field"=>"workflow_state_id",
                                                                                        "priority"=> 1
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_workflow_workflows')->where('engine_application_id', 'df07f9b4-26c1-40ca-ba1f-1b77b1692b83')->delete();
            }
}
