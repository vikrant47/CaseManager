<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Casemanager d */
class SeedDemoWorkflowQueues implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_workflow_queues')->insert([
            [
                                                                            "id"=> 1,
                                                                                        "name"=>"Quality Queue",
                                                                                        "description"=>"All case in this queue will be assigned to a Quality",
                                                                                        "script"=> "",
                                                                                        "active"=> 1,
                                                                                        "virtual"=> 0,
                                                                                        "queue_order"=>"simple_queue",
                                                                                        "sort_order"=> -900,
                                                                                        "input_condition"=>"if(\$context->event==='updating'){\r\n    if(\$context->model->isDirty('current_state_id')){\r\n        return \$context->model->current_state->code === 'quality';\r\n    }\r\n}\r\nreturn false;",
                                                                                        "model"=> "",
                                                                                        "redundancy_policy"=>"override",
                                                                                        "created_at"=>"2019-10-13 03:46:56",
                                                                                        "updated_at"=>"2020-04-06 06:40:54",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "service_channel_id"=> 1,
                                                                                        "pop_criteria_id"=> 3,
                                                                                        "routing_rule_id"=> 3
                            ] ,            [
                                                                            "id"=> 20,
                                                                                        "name"=>"Doctor Queue",
                                                                                        "description"=>"All case in this queue will be assigned to a doctor",
                                                                                        "script"=> "",
                                                                                        "active"=> 1,
                                                                                        "virtual"=> 0,
                                                                                        "queue_order"=>"simple_queue",
                                                                                        "sort_order"=> -900,
                                                                                        "input_condition"=>"if(\$context->event==='updating'){\r\nif(\$context->model->isDirty('current_state_id')){\r\nreturn \$context->model->current_state->code === 'doctor';\r\n}\r\n}\r\nreturn false;",
                                                                                        "model"=> "",
                                                                                        "redundancy_policy"=>"override",
                                                                                        "created_at"=>"2019-10-13 03:46:56",
                                                                                        "updated_at"=>"2020-04-04 13:26:49",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "service_channel_id"=> 1,
                                                                                        "pop_criteria_id"=> 3,
                                                                                        "routing_rule_id"=> 3
                            ] ,            [
                                                                            "id"=> 2,
                                                                                        "name"=>"Admin Queue",
                                                                                        "description"=>"All case in this queue will be assigned to a Admin",
                                                                                        "script"=> "",
                                                                                        "active"=> 0,
                                                                                        "virtual"=> 0,
                                                                                        "queue_order"=>"simple_queue",
                                                                                        "sort_order"=> -900,
                                                                                        "input_condition"=>"if(\$context->event==='updating'){\r\nif(\$context->model->isDirty('current_state_id')){\r\nreturn \$context->model->current_state->code === 'admin';\r\n}\r\n}\r\nreturn false;",
                                                                                        "model"=> "",
                                                                                        "redundancy_policy"=>"override",
                                                                                        "created_at"=>"2019-10-13 03:46:56",
                                                                                        "updated_at"=>"2020-04-04 13:27:00",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "service_channel_id"=> 1,
                                                                                        "pop_criteria_id"=> 3,
                                                                                        "routing_rule_id"=> 3
                            ] ,            [
                                                                            "id"=> 3,
                                                                                        "name"=>"Check IN - Case Workflow Assignment Queue1",
                                                                                        "description"=>"This queue will assign the case to current user who created the case",
                                                                                        "script"=>"\$workflowEntity = new Demo\Casemanager\Models\WorkflowEntityl();\r\n\$workflowEntity->workflow = Demo\Casemanager\Models\Workflow::where('code','case-workflow')->get()->first();\r\n\$workflowEntity->entity_id = \$item->id;\r\n\$workflowEntity->entity_type = get_class(\$item);\r\n// throw new \Error(json_encode(\$workflowEntity->workflow->definition,true));\r\n\$from_state = new Demo\Casemanager\Models\WorkflowState();\r\n\$from_state->id  = \$workflowEntity->workflow->definition[0]['from_state'];\r\n\$workflowEntity->current_state = \$from_state;\r\n\$workflowEntity->assigned_to = \$this->getCurrentUser();\r\n\$workflowEntity->save();",
                                                                                        "active"=> 1,
                                                                                        "virtual"=> 1,
                                                                                        "queue_order"=>"stack",
                                                                                        "sort_order"=> -1,
                                                                                        "input_condition"=>"return \$context->event==='creating';",
                                                                                        "model"=> "",
                                                                                        "redundancy_policy"=>"addNew",
                                                                                        "created_at"=>"2019-10-06 10:07:03",
                                                                                        "updated_at"=>"2020-05-17 14:58:26",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "service_channel_id"=> 1,
                                                                                        "pop_criteria_id"=> 3,
                                                                                        "routing_rule_id"=> 3
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_workflow_queues')->where('plugin_id', 6)->delete();
            }
}
