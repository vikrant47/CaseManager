<?php namespace Demo\Workflow\Seeds;

use October\Rain\Database\Updates\Seeder;
use Schema;
use October\Rain\Database\Updates\Migration;
use Db;
use Demo\Core\Classes\Ifs\Seedable;

class BuilderTableSeedDemoWorkflowQueues implements Seedable
{
    public function install()
    {
        Db::table('demo_workflow_queues')->insert([
            [
                "id"=> 3,
                "queue_order"=> "simple_queue",
                "script"=> "\$workflowEntity = new Demo\\Casemanager\\Models\\WorkflowEntityl();\r\n\$workflowEntity->workflow = Demo\\Casemanager\\Models\\Workflow::where('code','case-workflow')->get()->first();\r\n\$workflowEntity->entity_id = \$item->id;\r\n\$workflowEntity->entity_type = get_class(\$item);\r\n// throw new \\Error(json_encode(\$workflowEntity->workflow->definition,true));\r\n\$from_state = new Demo\\Casemanager\\Models\\WorkflowState();\r\n\$from_state->id  = \$workflowEntity->workflow->definition[0]['from_state'];\r\n\$workflowEntity->current_state = \$from_state;\r\n\$workflowEntity->assigned_to = \$this->getCurrentUser();\r\n\$workflowEntity->save();",
                "created_at"=> "2019-10-06 10:07:03",
                "updated_at"=> "2020-03-30 14:13:19",
                "created_by_id"=> 1,
                "updated_by_id"=> 1,
                "name"=> "Case Workflow Assignment Queue",
                "description"=> "This queue will assign the case to current user who created the case",
                "item_type"=> "Demo\\Workflow\\Models\\WorkflowItem",
                "input_condition"=> "return \$context->item->item_type === 'Demo\\Casemanager\\Models\\CaseModel';",
                "active"=> 1,
                "redundancy_policy"=> "addNew",
                "virtual"=> 1,
                "event"=> "[\"created\"]",
                "sort_order"=> -1,
                "plugin_id"=> 1,
                "pop_criteria_id"=> 3,
                "routing_rule_id"=> 3
            ],
            [
                "id"=> 1,
                "queue_order"=> "simple_queue",
                "script"=> "",
                "created_at"=> "2019-10-13 03:46:56",
                "updated_at"=> "2020-03-31 14:19:06",
                "created_by_id"=> 1,
                "updated_by_id"=> 1,
                "name"=> "Quality Queue",
                "description"=> "All case in this queue will be assigned to a Quality",
                "item_type"=> "Demo\\Workflow\\Models\\WorkflowItem",
                "input_condition"=> "if(\$context->item->isDirty('current_state_id')){\r\n    \$code = 'quality';\r\n    \$state = \\Demo\\Workflow\\Models\\WorkflowState::where(['code'=>\$code])->first();\r\n    if(empty(\$state)){\r\n        throw new \$context->exception->AppicationException('State not found with code '.\$code);\r\n  ]\r\n    return \$context->item->current_state_id == \$state->id;\r\n}\r\nreturn false;",
                "active"=> 1,
                "redundancy_policy"=> "override",
                "virtual"=> 0,
                "event"=> "[\"updating\"]",
                "sort_order"=> -900,
                "plugin_id"=> 1,
                "pop_criteria_id"=> 3,
                "routing_rule_id"=> 3
            ],
            [
                "id"=> 2,
                "queue_order"=> "simple_queue",
                "script"=> "",
                "created_at"=> "2019-10-13 03:46:56",
                "updated_at"=> "2020-03-31 14:19:12",
                "created_by_id"=> 1,
                "updated_by_id"=> 1,
                "name"=> "Admin Queue",
                "description"=> "All case in this queue will be assigned to a Admin",
                "item_type"=> "Demo\\Workflow\\Models\\WorkflowItem",
                "input_condition"=> "if(\$context->item->isDirty('current_state_id')){\r\n    \$code = 'admin';\r\n    \$state = \\Demo\\Workflow\\Models\\WorkflowState::where(['code'=>\$code])->first();\r\n    if(empty(\$state)){\r\n        throw new \$context->exception->ApplicationException('State not found with code '.\$code);\r\n  ]\r\n    return \$context->item->current_state_id === \$state->id;\r\n}\r\nreturn false;",
                "active"=> 0,
                "redundancy_policy"=> "override",
                "virtual"=> 0,
                "event"=> "[\"updating\"]",
                "sort_order"=> -900,
                "plugin_id"=> 1,
                "pop_criteria_id"=> 3,
                "routing_rule_id"=> 3
            ],
            [
                "id"=> 20,
                "queue_order"=> "simple_queue",
                "script"=> "",
                "created_at"=> "2019-10-13 03:46:56",
                "updated_at"=> "2020-03-31 14:19:16",
                "created_by_id"=> 1,
                "updated_by_id"=> 1,
                "name"=> "Doctor Queue",
                "description"=> "All case in this queue will be assigned to a doctor",
                "item_type"=> "Demo\\Workflow\\Models\\WorkflowItem",
                "input_condition"=> "if(\$context->item->isDirty('current_state_id')){\r\n    \$code = 'doctor';\r\n    \$state = \\Demo\\Workflow\\Models\\WorkflowState::where(['code'=>\$code])->first();\r\n    if(empty(\$state)){\r\n        throw new \$context->exception->ApplicationException('State not found with code '.\$code);\r\n  ]\r\n    return \$context->item->current_state_id == \$state->id;\r\n}\r\nreturn false;",
                "active"=> 1,
                "redundancy_policy"=> "override",
                "virtual"=> 0,
                "event"=> "[\"updating\"]",
                "sort_order"=> -900,
                "plugin_id"=> 1,
                "pop_criteria_id"=> 3,
                "routing_rule_id"=> 3
            ]
        ]);
    }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
        Db::table('demo_workflow_queues')->where('plugin_id', 1)->delete();
    }
}
