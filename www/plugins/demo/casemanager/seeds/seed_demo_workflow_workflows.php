<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Casemanager d */
class SeedDemoWorkflowWorkflows implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_workflow_workflows')->insert([
            [
                                                                            "created_at"=>"2019-10-08 08:17:55",
                                                                                        "updated_at"=>"2020-06-07 06:50:20",
                                                                                        "active"=> 1,
                                                                                        "name"=>"Case Workflow",
                                                                                        "code"=>"case-workflow",
                                                                                        "description"=>"Case Workflow sdsdsd",
                                                                                        "definition"=>"[{\"from_state\":\"09dfd34e-0db5-49f3-96b2-23831d811a0b\",\"to_state\":\"16d9ddab-a130-4bbd-8d5c-b3e82fbf00de\"},{\"from_state\":\"16d9ddab-a130-4bbd-8d5c-b3e82fbf00de\",\"to_state\":\"c5a45023-2d2a-48ca-94b1-3097c0af7d05\"},{\"from_state\":\"c5a45023-2d2a-48ca-94b1-3097c0af7d05\",\"to_state\":\"8c7e9158-b65c-437a-a5d9-4b975f7b6f51\"}]",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "sort_order"=> 0,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "input_condition"=>"return true;",
                                                                                        "event"=>"created",
                                                                                        "id"=>"dd25a3b6-0e8b-4af7-b50d-d9030068b84a"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_workflow_workflows')->where('plugin_id', 6)->delete();
            }
}
