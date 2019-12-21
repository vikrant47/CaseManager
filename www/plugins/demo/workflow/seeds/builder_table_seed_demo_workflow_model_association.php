<?php

namespace Demo\Workflow\Seeds;

use Demo\Core\Models\ModelModel;
use Schema;
use Seeder;
use Db;

class BuilderTableSeedDemoWorkflowModelAssociation extends Seeder
{
    public function run()
    {
        Db::table('demo_core_model_associations')->insert([
            [
                "id"=> 30,
                "created_at"=> "2019-12-21 11:25:39",
                "updated_at"=> "2019-12-21 11:25:39",
                "created_by_id"=> 1,
                "updated_by_id"=> 1,
                "source_model"=> "Demo\\Workflow\\Models\\QueueItem",
                "target_model"=> "Demo\\Workflow\\Models\\Queue",
                "foreign_key"=> "queue_id",
                "cascade"=> "delete",
                "plugin_id"=> 14,
                "description"=> "",
                "name"=> "Queue Item Belongs To a Queue",
                "active"=> 1,
                "relation"=> "belongs_to"
            ],
            [
                "id"=> 31,
                "created_at"=> "2019-12-21 11:25:39",
                "updated_at"=> "2019-12-21 11:25:39",
                "created_by_id"=> 1,
                "updated_by_id"=> 1,
                "source_model"=> "Demo\\Workflow\\Models\\Queue",
                "target_model"=> "Demo\\Workflow\\Models\\QueueRoutingRule",
                "foreign_key"=> "routing_rule_id",
                "cascade"=> "restrict",
                "plugin_id"=> 14,
                "description"=> "",
                "name"=> "Queue belongs to a Routing Rule",
                "active"=> 1,
                "relation"=> "belongs_to"
            ],
            [
                "id"=> 32,
                "created_at"=> "2019-12-21 11:25:39",
                "updated_at"=> "2019-12-21 11:25:39",
                "created_by_id"=> 1,
                "updated_by_id"=> 1,
                "source_model"=> "Demo\\Workflow\\Models\\Queue",
                "target_model"=> "Demo\\Workflow\\Models\\Model",
                "foreign_key"=> "model",
                "cascade"=> "restrict",
                "plugin_id"=> 14,
                "description"=> "",
                "name"=> "Queue belongs To a Model",
                "active"=> 1,
                "relation"=> "belongs_to"
            ],
            [
                "id"=> 33,
                "created_at"=> "2019-12-21 11:25:39",
                "updated_at"=> "2019-12-21 11:25:39",
                "created_by_id"=> 1,
                "updated_by_id"=> 1,
                "source_model"=> "Demo\\Workflow\\Models\\QueuePopCriteria",
                "target_model"=> "Demo\\Workflow\\Models\\Queue",
                "foreign_key"=> "pop_criteria_id",
                "cascade"=> "delete",
                "plugin_id"=> 14,
                "description"=> "",
                "name"=> "Queue Belongs To a Pop Criteria",
                "active"=> 1,
                "relation"=> "belongs_to"
            ],
            [
                "id"=> 34,
                "created_at"=> "2019-12-21 11:25:39",
                "updated_at"=> "2019-12-21 11:25:39",
                "created_by_id"=> 1,
                "updated_by_id"=> 1,
                "source_model"=> "Demo\\Workflow\\Models\\WorkflowItem",
                "target_model"=> "Demo\\Workflow\\Models\\Workflow",
                "foreign_key"=> "workflow_id",
                "cascade"=> "restrict",
                "plugin_id"=> 14,
                "description"=> "",
                "name"=> "Workflo Item belongs to a Workflow",
                "active"=> 1,
                "relation"=> "belongs_to"
            ],
            [
                "id"=> 35,
                "created_at"=> "2019-12-21 11:25:39",
                "updated_at"=> "2019-12-21 11:25:39",
                "created_by_id"=> 1,
                "updated_by_id"=> 1,
                "source_model"=> "Demo\\Workflow\\Models\\WorkflowTransition",
                "target_model"=> "Demo\\Workflow\\Models\\WorkflowItem",
                "foreign_key"=> "workflow_item",
                "cascade"=> "delete",
                "plugin_id"=> 14,
                "description"=> "",
                "name"=> "Workflow Transition belongs to a WorkflowItem",
                "active"=> 1,
                "relation"=> "belongs_to"
            ]
        ]);
    }
}
