<?php namespace Demo\Workflow\Seeds;

use October\Rain\Database\Updates\Seeder;
use Schema;
use October\Rain\Database\Updates\Migration;
use Db;

class BuilderTableSeedDemoWorkflowQueues extends Seeder
{
    public function run()
    {
        Db::table('demo_workflow_queues')->insert([
            [
                "id" => 21,
                "queue_order" => "simple_queue",
                "script" => "",
                "created_at" => "2019-10-13 03:46:56",
                "updated_at" => "2019-10-14 06:29:42",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Quality Queue",
                "description" => "All case in this queue will be assigned to a Quality",
                "item_type" => "Demo\Casemanager\Models\CaseModel",
                "input_condition" => "/**\r\n* This queue will never accept any item using input condition\r\n* Item will be pushed by automatically using workflow.\r\n*/\r\nreturn false;",
                "active" => 1,
                "redundancy_policy" => "override",
                "virtual" => 0,
                "event" => "0",
                "pop_criteria" => "return Illuminate\Support\Facades\DB=>=>table('demo_casemanager_queue_items')\r\n            ->select('demo_casemanager_queue_items.*')\r\n            ->join('demo_casemanager_cases', 'demo_casemanager_queue_items.item_id', '=', 'demo_casemanager_cases.id')\r\n            ->where('demo_casemanager_queue_items.item_type','Demo\Casemanager\Models\CaseModel');",
                "sort_order" => -900
            ],
            [
                "id" => 20,
                "queue_order" => "simple_queue",
                "script" => "",
                "created_at" => "2019-10-13 03:46:56",
                "updated_at" => "2019-10-14 06:29:50",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Doctor Queue",
                "description" => "All case in this queue will be assigned to a doctor",
                "item_type" => "Demo\Casemanager\Models\CaseModel",
                "input_condition" => "/**\r\n* This queue will never accept any item using input condition\r\n* Item will be pushed by automatically using workflow.\r\n*/\r\nreturn false;",
                "active" => 1,
                "redundancy_policy" => "override",
                "virtual" => 0,
                "event" => "0",
                "pop_criteria" => "return Illuminate\Support\Facades\DB=>=>table('demo_casemanager_queue_items')\r\n            ->select('demo_casemanager_queue_items.*')\r\n            ->join('demo_casemanager_cases', 'demo_casemanager_queue_items.item_id', '=', 'demo_casemanager_cases.id')\r\n            ->where('demo_casemanager_queue_items.item_type','Demo\Casemanager\Models\CaseModel');",
                "sort_order" => -900
            ],
            [
                "id" => 3,
                "queue_order" => "simple_queue",
                "script" => "\$workflowItem = new Demo\Casemanager\Models\WorkflowItem();\r\n\$workflowItem->workflow = Demo\Casemanager\Models\Workflow=>=>where('code','case-workflow')->get()->first();\r\n\$workflowItem->item_id = \$item->id;\r\n\$workflowItem->item_type = get_class(\$item);\r\n// throw new \Error(json_encode(\$workflowItem->workflow->definition,true));\r\n\$from_state = new Demo\Casemanager\Models\WorkflowState();\r\n\$from_state->id  = \$workflowItem->workflow->definition[0]['from_state'];\r\n\$workflowItem->current_state = \$from_state;\r\n\$workflowItem->assigned_to = \$this->getCurrentUser();\r\n\$workflowItem->save();",
                "created_at" => "2019-10-06 10:07:03",
                "updated_at" => "2019-10-14 08:38:59",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Case Workflow Assignment Queue",
                "description" => "This queue will assign the case to current user who created the case",
                "item_type" => "Demo\Casemanager\Models\CaseModel",
                "input_condition" => "return true;",
                "active" => 1,
                "redundancy_policy" => "addNew",
                "virtual" => 1,
                "event" => "[\"created\"]",
                "pop_criteria" => "",
                "sort_order" => -1000
            ],
            [
                "id" => 22,
                "queue_order" => "simple_queue",
                "script" => "",
                "created_at" => "2019-10-13 03:46:56",
                "updated_at" => "2019-10-13 10:40:06",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Admin Queue",
                "description" => "All case in this queue will be assigned to a Admin",
                "item_type" => "Demo\Casemanager\Models\CaseModel",
                "input_condition" => "/**\r\n* This queue will never accept any item using input condition\r\n* Item will be pushed by automatically using workflow.\r\n*/\r\nreturn false;",
                "active" => 1,
                "redundancy_policy" => "override",
                "virtual" => 0,
                "event" => "0",
                "pop_criteria" => "return Illuminate\Support\Facades\DB=>=>table('demo_casemanager_queue_items')\r\n            ->select('demo_casemanager_queue_items.*')\r\n            ->join('demo_casemanager_cases', 'demo_casemanager_queue_items.item_id', '=', 'demo_casemanager_cases.id')\r\n            ->where('demo_casemanager_queue_items.item_type','Demo\Casemanager\Models\CaseModel');",
                "sort_order" => -900
            ]
        ]);
    }
}
