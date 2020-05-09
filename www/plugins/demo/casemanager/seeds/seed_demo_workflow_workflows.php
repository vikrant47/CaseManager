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
                                                                            "id"=> 1,
                                                                                        "created_at"=>"2019-10-08 08:17:55",
                                                                                        "updated_at"=>"2020-05-09 06:43:30",
                                                                                        "active"=> 1,
                                                                                        "name"=>"Case Workflow",
                                                                                        "code"=>"case-workflow",
                                                                                        "description"=>"Case Workflow sdsdsd",
                                                                                        "definition"=>"[{\"from_state\":\"3\",\"to_state\":\"4\"},{\"from_state\":\"4\",\"to_state\":\"5\"},{\"from_state\":\"5\",\"to_state\":\"1\"},{\"from_state\":\"1\",\"to_state\":\"6\"}]",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "sort_order"=> 0,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "input_condition"=>"return true;",
                                                                                        "event"=>"created"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_workflow_workflows')->where('plugin_id', 6)->delete();
            }
}
