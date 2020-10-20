<?php
namespace Demo\Casemanager\Seeds\V0_0;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds casemanager d */
class SeedDemoWorkspaceWorkflows implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_workspace_workflows')->insert([
            [
                                                                            "id"=>"ec3eed60-1031-11eb-b6d3-e3a41e584492",
                                                                                        "created_at"=>"2020-10-17 04:33:36",
                                                                                        "updated_at"=>"2020-10-17 04:37:32",
                                                                                        "active"=> 1,
                                                                                        "name"=>"Only P1 Cases",
                                                                                        "description"=> "",
                                                                                        "definition"=>"[{\"from_state\":\"09dfd34e-0db5-49f3-96b2-23831d811a0b\",\"to_state\":\"16d9ddab-a130-4bbd-8d5c-b3e82fbf00de\",\"queue\":\"c83b37aa-0fd9-4987-bff7-1a604da1ffde\",\"transition_ttl\":-1},{\"from_state\":\"16d9ddab-a130-4bbd-8d5c-b3e82fbf00de\",\"to_state\":\"c5a45023-2d2a-48ca-94b1-3097c0af7d05\",\"queue\":\"85cd4fd8-16a9-482a-b47f-ff7bae2b79d3\",\"transition_ttl\":-1},{\"from_state\":\"c5a45023-2d2a-48ca-94b1-3097c0af7d05\",\"to_state\":\"8c7e9158-b65c-437a-a5d9-4b975f7b6f51\",\"queue\":\"85cd4fd8-16a9-482a-b47f-ff7bae2b79d3\",\"transition_ttl\":-1}]",
                                                                                        "priority"=> 1,
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "sort_order"=> 1,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "condition"=>"{\"condition\":\"AND\",\"rules\":[{\"id\":\"priority_id\",\"field\":\"priority_id\",\"type\":\"relation\",\"input\":\"select\",\"operator\":\"equal\",\"value\":\"4e54bbc0-0337-11eb-a34b-4f9f239ba7b3\",\"displayValue\":\"P1\"}],\"not\":false,\"valid\":true}",
                                                                                        "auto_publish"=> false,
                                                                                        "model_state_field"=>"workflow_state_id",
                                                                                        "service_channel_id"=>"6aec2f36-3de0-4131-b326-de418cb8549a"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_workspace_workflows')->where('engine_application_id', 'df07f9b4-26c1-40ca-ba1f-1b77b1692b83')->delete();
            }
}
