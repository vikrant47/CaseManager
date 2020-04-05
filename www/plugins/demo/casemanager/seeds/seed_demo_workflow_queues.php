<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
/**Auto generated using cmd _: php artisan core:run-seeds Demo.Casemanager d */
class SeedDemoWorkflowQueues implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_workflow_queues')->insert([
            [
                                                'id'=>'20',
                                                            'queue_order'=>'simple_queue',
                                                            'script'=>'',
                                                            'created_at'=>'2019-10-13 03:46:56',
                                                            'updated_at'=>'2020-04-04 13:26:49',
                                                            'created_by_id'=>'1',
                                                            'updated_by_id'=>'1',
                                                            'name'=>'Doctor Queue',
                                                            'description'=>'All case in this queue will be assigned to a doctor',
                                                            'input_condition'=>'if(\$context->event===\'updating\'){\n \n     if(\$context->model->isDirty(\'current_state_id\')){\n \n         return \$context->model->current_state->code === \'doctor\';\n \n     }\n \n }\n \n return false;',
                                                            'active'=>'1',
                                                            'redundancy_policy'=>'override',
                                                            'virtual'=>'0',
                                                            'sort_order'=>'-900',
                                                            'plugin_id'=>'6',
                                                            'pop_criteria_id'=>'3',
                                                            'routing_rule_id'=>'3',
                                                            'service_channel_id'=>'1'
                            ] ,            [
                                                'id'=>'2',
                                                            'queue_order'=>'simple_queue',
                                                            'script'=>'',
                                                            'created_at'=>'2019-10-13 03:46:56',
                                                            'updated_at'=>'2020-04-04 13:27:00',
                                                            'created_by_id'=>'1',
                                                            'updated_by_id'=>'1',
                                                            'name'=>'Admin Queue',
                                                            'description'=>'All case in this queue will be assigned to a Admin',
                                                            'input_condition'=>'if(\$context->event===\'updating\'){\n \n     if(\$context->model->isDirty(\'current_state_id\')){\n \n         return \$context->model->current_state->code === \'admin\';\n \n     }\n \n }\n \n return false;',
                                                            'active'=>'0',
                                                            'redundancy_policy'=>'override',
                                                            'virtual'=>'0',
                                                            'sort_order'=>'-900',
                                                            'plugin_id'=>'6',
                                                            'pop_criteria_id'=>'3',
                                                            'routing_rule_id'=>'3',
                                                            'service_channel_id'=>'1'
                            ] ,            [
                                                'id'=>'3',
                                                            'queue_order'=>'simple_queue',
                                                            'script'=>'\$workflowEntity = new Demo\Casemanager\Models\WorkflowEntityl();\n \n \$workflowEntity->workflow = Demo\Casemanager\Models\Workflow::where(\'code\',\'case-workflow\')->get()->first();\n \n \$workflowEntity->entity_id = \$item->id;\n \n \$workflowEntity->entity_type = get_class(\$item);\n \n // throw new \Error(json_encode(\$workflowEntity->workflow->definition,true));\n \n \$from_state = new Demo\Casemanager\Models\WorkflowState();\n \n \$from_state->id  = \$workflowEntity->workflow->definition[0][\'from_state\'];\n \n \$workflowEntity->current_state = \$from_state;\n \n \$workflowEntity->assigned_to = \$this->getCurrentUser();\n \n \$workflowEntity->save();',
                                                            'created_at'=>'2019-10-06 10:07:03',
                                                            'updated_at'=>'2020-04-04 08:56:55',
                                                            'created_by_id'=>'1',
                                                            'updated_by_id'=>'1',
                                                            'name'=>'Case Workflow Assignment Queue',
                                                            'description'=>'This queue will assign the case to current user who created the case',
                                                            'input_condition'=>'return \$context->event===\'creating\';',
                                                            'active'=>'1',
                                                            'redundancy_policy'=>'addNew',
                                                            'virtual'=>'1',
                                                            'sort_order'=>'-1',
                                                            'plugin_id'=>'6',
                                                            'pop_criteria_id'=>'3',
                                                            'routing_rule_id'=>'3',
                                                            'service_channel_id'=>'1'
                            ] ,            [
                                                'id'=>'1',
                                                            'queue_order'=>'simple_queue',
                                                            'script'=>'',
                                                            'created_at'=>'2019-10-13 03:46:56',
                                                            'updated_at'=>'2020-04-04 13:27:07',
                                                            'created_by_id'=>'1',
                                                            'updated_by_id'=>'1',
                                                            'name'=>'Quality Queue',
                                                            'description'=>'All case in this queue will be assigned to a Quality',
                                                            'input_condition'=>'if(\$context->event===\'updating\'){\n \n     if(\$context->model->isDirty(\'current_state_id\')){\n \n         return \$context->model->current_state->code === \'quality\';\n \n     }\n \n }\n \n return false;',
                                                            'active'=>'1',
                                                            'redundancy_policy'=>'override',
                                                            'virtual'=>'0',
                                                            'sort_order'=>'-900',
                                                            'plugin_id'=>'6',
                                                            'pop_criteria_id'=>'3',
                                                            'routing_rule_id'=>'3',
                                                            'service_channel_id'=>'1'
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_workflow_queues')->where('plugin_id', 6)->delete();
            }
}
