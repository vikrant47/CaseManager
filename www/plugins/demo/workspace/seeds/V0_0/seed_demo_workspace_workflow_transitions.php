<?php
namespace Demo\Workspace\Seeds\V0_0;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds workspace d */
class SeedDemoWorkspaceWorkflowTransitions implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_workspace_workflow_transitions')->insert([
            [
                                                                            "id"=>"56e529e0-1284-11eb-a9f9-cdd54f6a582c",
                                                                                        "created_at"=>"2020-10-20 03:28:36",
                                                                                        "updated_at"=>"2020-10-20 03:28:36",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "backward_direction"=> false,
                                                                                        "work_id"=>"50f85db0-1284-11eb-9948-3bb582b174ff",
                                                                                        "from_state_id"=>"09dfd34e-0db5-49f3-96b2-23831d811a0b",
                                                                                        "to_state_id"=>"16d9ddab-a130-4bbd-8d5c-b3e82fbf00de",
                                                                                        "data"=> null,
                                                                                        "workflow_id"=>"ec3eed60-1031-11eb-b6d3-e3a41e584492",
                                                                                        "configured_queue_id"=>"c83b37aa-0fd9-4987-bff7-1a604da1ffde"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_workspace_workflow_transitions')->delete();
            }
}
