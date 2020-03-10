<?php

namespace Demo\Workflow\Seeds;

use Demo\Core\Classes\Helpers\JSON;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Classes\Ifs\Seedable;
use Demo\Core\Models\ModelModel;
use Schema;
use Seeder;
use Db;

class BuilderTableSeedDemoWorkflowPermission implements Seedable
{
    /*select row_number() OVER () as id,
    model.model_type as model,
    model.plugin_id,
    model.created_at,
    model.updated_at,
    model.created_by_id,
    model.updated_by_id,
    'delete' as operation,
    true as active,
    true as system,
    concat(model.name,' Delete Permission') as name,
    concat(lower(plugin.code],'::',replace(lower(substr(replace(model.model_type,replace(plugin.code,'.','\'],''],2)],'\','.'],'.row.delete') as code
    from demo_core_models model
           join system_plugin_versions plugin on plugin.id = model.plugin_id;*/
    public function install()
    {


        Db::table('demo_core_permissions')->insert([
                [
                    "id" => 211,
                    "model" => "Demo\Workflow\Models\Queue",
                    "plugin_id" => 11,
                    "created_at" => "2019-12-20 14:15:39",
                    "updated_at" => "2019-12-20 14:15:39",
                    "created_by_id" => 1,
                    "updated_by_id" => 1,
                    "operation" => "read",
                    "active" => true,
                    "system" => true,
                    "name" => "Queue Read Permission",
                    "code" => "demo.workflow::models.queue.row.read"
                ],
                [
                    "id" => 212,
                    "model" => "Demo\Workflow\Models\QueueItem",
                    "plugin_id" => 11,
                    "created_at" => "2019-12-20 14:15:39",
                    "updated_at" => "2019-12-20 14:15:39",
                    "created_by_id" => 1,
                    "updated_by_id" => 1,
                    "operation" => "write",
                    "active" => true,
                    "system" => true,
                    "name" => "Queue Item Write Permission",
                    "code" => "demo.workflow::models.queueitem.row.write"
                ],
                [
                    "id" => 213,
                    "model" => "Demo\Workflow\Models\QueueItem",
                    "plugin_id" => 11,
                    "created_at" => "2019-12-20 14:15:39",
                    "updated_at" => "2019-12-20 14:15:39",
                    "created_by_id" => 1,
                    "updated_by_id" => 1,
                    "operation" => "create",
                    "active" => true,
                    "system" => true,
                    "name" => "Queue Item Create Permission",
                    "code" => "demo.workflow::models.queueitem.row.create"
                ],
                [
                    "id" => 214,
                    "model" => "Demo\Workflow\Models\QueuePopCriteria",
                    "plugin_id" => 11,
                    "created_at" => "2019-12-20 14:15:39",
                    "updated_at" => "2019-12-20 14:15:39",
                    "created_by_id" => 1,
                    "updated_by_id" => 1,
                    "operation" => "create",
                    "active" => true,
                    "system" => true,
                    "name" => "Queue Pop Criteria Create Permission",
                    "code" => "demo.workflow::models.queuepopcriteria.row.create"
                ],
                [
                    "id" => 215,
                    "model" => "Demo\Workflow\Models\WorkflowState",
                    "plugin_id" => 11,
                    "created_at" => "2019-12-20 14:15:39",
                    "updated_at" => "2019-12-20 14:15:39",
                    "created_by_id" => 1,
                    "updated_by_id" => 1,
                    "operation" => "read",
                    "active" => true,
                    "system" => true,
                    "name" => "Workflow State Read Permission",
                    "code" => "demo.workflow::models.workflowstate.row.read"
                ],
                [
                    "id" => 216,
                    "model" => "Demo\Workflow\Models\Workflow",
                    "plugin_id" => 11,
                    "created_at" => "2019-12-20 14:15:39",
                    "updated_at" => "2019-12-20 14:15:39",
                    "created_by_id" => 1,
                    "updated_by_id" => 1,
                    "operation" => "create",
                    "active" => true,
                    "system" => true,
                    "name" => "Workflow Create Permission",
                    "code" => "demo.workflow::models.workflow.row.create"
                ],
                [
                    "id" => 250,
                    "model" => "Demo\Workflow\Models\WorkflowItem",
                    "plugin_id" => 11,
                    "created_at" => "2019-12-20 14:15:39",
                    "updated_at" => "2019-12-20 14:15:39",
                    "created_by_id" => 1,
                    "updated_by_id" => 1,
                    "operation" => "create",
                    "active" => true,
                    "system" => true,
                    "name" => "Workflow Item Create Permission",
                    "code" => "demo.workflow::models.workflowitem.row.create"
                ],
                [
                    "id" => 217,
                    "model" => "Demo\Workflow\Models\WorkflowTransition",
                    "plugin_id" => 11,
                    "created_at" => "2019-12-20 14:15:39",
                    "updated_at" => "2019-12-20 14:15:39",
                    "created_by_id" => 1,
                    "updated_by_id" => 1,
                    "operation" => "delete",
                    "active" => true,
                    "system" => true,
                    "name" => "Workflow Transition Delete Permission",
                    "code" => "demo.workflow::models.workflowtransition.row.delete"
                ],
                [
                    "id" => 251,
                    "model" => "Demo\Workflow\Models\QueueRoutingRule",
                    "plugin_id" => 11,
                    "created_at" => "2019-12-20 14:15:39",
                    "updated_at" => "2019-12-20 14:15:39",
                    "created_by_id" => 1,
                    "updated_by_id" => 1,
                    "operation" => "write",
                    "active" => true,
                    "system" => true,
                    "name" => "Queue Routing Rule Write Permission",
                    "code" => "demo.workflow::models.queueroutingrule.row.write"
                ],
                [
                    "id" => 218,
                    "model" => "Demo\Workflow\Models\QueueRoutingRule",
                    "plugin_id" => 11,
                    "created_at" => "2019-12-20 14:15:39",
                    "updated_at" => "2019-12-20 14:15:39",
                    "created_by_id" => 1,
                    "updated_by_id" => 1,
                    "operation" => "read",
                    "active" => true,
                    "system" => true,
                    "name" => "Queue Routing Rule Read Permission",
                    "code" => "demo.workflow::models.queueroutingrule.row.read"
                ],
                [
                    "id" => 253,
                    "model" => "Demo\Workflow\Models\WorkflowItem",
                    "plugin_id" => 11,
                    "created_at" => "2019-12-20 14:15:39",
                    "updated_at" => "2019-12-20 14:15:39",
                    "created_by_id" => 1,
                    "updated_by_id" => 1,
                    "operation" => "write",
                    "active" => true,
                    "system" => true,
                    "name" => "Workflow Item Write Permission",
                    "code" => "demo.workflow::models.workflowitem.row.write"
                ],
                [
                    "id" => 219,
                    "model" => "Demo\Workflow\Models\WorkflowTransition",
                    "plugin_id" => 11,
                    "created_at" => "2019-12-20 14:15:39",
                    "updated_at" => "2019-12-20 14:15:39",
                    "created_by_id" => 1,
                    "updated_by_id" => 1,
                    "operation" => "create",
                    "active" => true,
                    "system" => true,
                    "name" => "Workflow Transition Create Permission",
                    "code" => "demo.workflow::models.workflowtransition.row.create"
                ],
                [
                    "id" => 220,
                    "model" => "Demo\Workflow\Models\Queue",
                    "plugin_id" => 11,
                    "created_at" => "2019-12-20 14:15:39",
                    "updated_at" => "2019-12-20 14:15:39",
                    "created_by_id" => 1,
                    "updated_by_id" => 1,
                    "operation" => "delete",
                    "active" => true,
                    "system" => true,
                    "name" => "Queue Delete Permission",
                    "code" => "demo.workflow::models.queue.row.delete"
                ],
                [
                    "id" => 221,
                    "model" => "Demo\Workflow\Models\Workflow",
                    "plugin_id" => 11,
                    "created_at" => "2019-12-20 14:15:39",
                    "updated_at" => "2019-12-20 14:15:39",
                    "created_by_id" => 1,
                    "updated_by_id" => 1,
                    "operation" => "read",
                    "active" => true,
                    "system" => true,
                    "name" => "Workflow Read Permission",
                    "code" => "demo.workflow::models.workflow.row.read"
                ],
                [
                    "id" => 222,
                    "model" => "Demo\Workflow\Models\WorkflowState",
                    "plugin_id" => 11,
                    "created_at" => "2019-12-20 14:15:39",
                    "updated_at" => "2019-12-20 14:15:39",
                    "created_by_id" => 1,
                    "updated_by_id" => 1,
                    "operation" => "write",
                    "active" => true,
                    "system" => true,
                    "name" => "Workflow State Write Permission",
                    "code" => "demo.workflow::models.workflowstate.row.write"
                ],
                [
                    "id" => 223,
                    "model" => "Demo\Workflow\Models\WorkflowTransition",
                    "plugin_id" => 11,
                    "created_at" => "2019-12-20 14:15:39",
                    "updated_at" => "2019-12-20 14:15:39",
                    "created_by_id" => 1,
                    "updated_by_id" => 1,
                    "operation" => "write",
                    "active" => true,
                    "system" => true,
                    "name" => "Workflow Transition Write Permission",
                    "code" => "demo.workflow::models.workflowtransition.row.write"
                ],
                [
                    "id" => 224,
                    "model" => "Demo\Workflow\Models\Workflow",
                    "plugin_id" => 11,
                    "created_at" => "2019-12-20 14:15:39",
                    "updated_at" => "2019-12-20 14:15:39",
                    "created_by_id" => 1,
                    "updated_by_id" => 1,
                    "operation" => "write",
                    "active" => true,
                    "system" => true,
                    "name" => "Workflow Write Permission",
                    "code" => "demo.workflow::models.workflow.row.write"
                ],
                [
                    "id" => 225,
                    "model" => "Demo\Workflow\Models\Queue",
                    "plugin_id" => 11,
                    "created_at" => "2019-12-20 14:15:39",
                    "updated_at" => "2019-12-20 14:15:39",
                    "created_by_id" => 1,
                    "updated_by_id" => 1,
                    "operation" => "create",
                    "active" => true,
                    "system" => true,
                    "name" => "Queue Create Permission",
                    "code" => "demo.workflow::models.queue.row.create"
                ],
                [
                    "id" => 226,
                    "model" => "Demo\Workflow\Models\Workflow",
                    "plugin_id" => 11,
                    "created_at" => "2019-12-20 14:15:39",
                    "updated_at" => "2019-12-20 14:15:39",
                    "created_by_id" => 1,
                    "updated_by_id" => 1,
                    "operation" => "delete",
                    "active" => true,
                    "system" => true,
                    "name" => "Workflow Delete Permission",
                    "code" => "demo.workflow::models.workflow.row.delete"
                ],
                [
                    "id" => 227,
                    "model" => "Demo\Workflow\Models\Queue",
                    "plugin_id" => 11,
                    "created_at" => "2019-12-20 14:15:39",
                    "updated_at" => "2019-12-20 14:15:39",
                    "created_by_id" => 1,
                    "updated_by_id" => 1,
                    "operation" => "write",
                    "active" => true,
                    "system" => true,
                    "name" => "Queue Write Permission",
                    "code" => "demo.workflow::models.queue.row.write"
                ],
                [
                    "id" => 228,
                    "model" => "Demo\Workflow\Models\QueueItem",
                    "plugin_id" => 11,
                    "created_at" => "2019-12-20 14:15:39",
                    "updated_at" => "2019-12-20 14:15:39",
                    "created_by_id" => 1,
                    "updated_by_id" => 1,
                    "operation" => "delete",
                    "active" => true,
                    "system" => true,
                    "name" => "Queue Item Delete Permission",
                    "code" => "demo.workflow::models.queueitem.row.delete"
                ],
                [
                    "id" => 229,
                    "model" => "Demo\Workflow\Models\WorkflowItem",
                    "plugin_id" => 11,
                    "created_at" => "2019-12-20 14:15:39",
                    "updated_at" => "2019-12-20 14:15:39",
                    "created_by_id" => 1,
                    "updated_by_id" => 1,
                    "operation" => "read",
                    "active" => true,
                    "system" => true,
                    "name" => "Workflow Item Read Permission",
                    "code" => "demo.workflow::models.workflowitem.row.read"
                ],
                [
                    "id" => 230,
                    "model" => "Demo\Workflow\Models\WorkflowState",
                    "plugin_id" => 11,
                    "created_at" => "2019-12-20 14:15:39",
                    "updated_at" => "2019-12-20 14:15:39",
                    "created_by_id" => 1,
                    "updated_by_id" => 1,
                    "operation" => "delete",
                    "active" => true,
                    "system" => true,
                    "name" => "Workflow State Delete Permission",
                    "code" => "demo.workflow::models.workflowstate.row.delete"
                ],
                [
                    "id" => 231,
                    "model" => "Demo\Workflow\Models\QueuePopCriteria",
                    "plugin_id" => 11,
                    "created_at" => "2019-12-20 14:15:39",
                    "updated_at" => "2019-12-20 14:15:39",
                    "created_by_id" => 1,
                    "updated_by_id" => 1,
                    "operation" => "read",
                    "active" => true,
                    "system" => true,
                    "name" => "Queue Pop Criteria Read Permission",
                    "code" => "demo.workflow::models.queuepopcriteria.row.read"
                ],
                [
                    "id" => 232,
                    "model" => "Demo\Workflow\Models\QueuePopCriteria",
                    "plugin_id" => 11,
                    "created_at" => "2019-12-20 14:15:39",
                    "updated_at" => "2019-12-20 14:15:39",
                    "created_by_id" => 1,
                    "updated_by_id" => 1,
                    "operation" => "write",
                    "active" => true,
                    "system" => true,
                    "name" => "Queue Pop Criteria Write Permission",
                    "code" => "demo.workflow::models.queuepopcriteria.row.write"
                ],
                [
                    "id" => 233,
                    "model" => "Demo\Workflow\Models\WorkflowTransition",
                    "plugin_id" => 11,
                    "created_at" => "2019-12-20 14:15:39",
                    "updated_at" => "2019-12-20 14:15:39",
                    "created_by_id" => 1,
                    "updated_by_id" => 1,
                    "operation" => "read",
                    "active" => true,
                    "system" => true,
                    "name" => "Workflow Transition Read Permission",
                    "code" => "demo.workflow::models.workflowtransition.row.read"
                ],
                [
                    "id" => 234,
                    "model" => "Demo\Workflow\Models\WorkflowItem",
                    "plugin_id" => 11,
                    "created_at" => "2019-12-20 14:15:39",
                    "updated_at" => "2019-12-20 14:15:39",
                    "created_by_id" => 1,
                    "updated_by_id" => 1,
                    "operation" => "delete",
                    "active" => true,
                    "system" => true,
                    "name" => "Workflow Item Delete Permission",
                    "code" => "demo.workflow::models.workflowitem.row.delete"
                ],
                [
                    "id" => 235,
                    "model" => "Demo\Workflow\Models\QueuePopCriteria",
                    "plugin_id" => 11,
                    "created_at" => "2019-12-20 14:15:39",
                    "updated_at" => "2019-12-20 14:15:39",
                    "created_by_id" => 1,
                    "updated_by_id" => 1,
                    "operation" => "delete",
                    "active" => true,
                    "system" => true,
                    "name" => "Queue Pop Criteria Delete Permission",
                    "code" => "demo.workflow::models.queuepopcriteria.row.delete"
                ],
                [
                    "id" => 236,
                    "model" => "Demo\Workflow\Models\QueueRoutingRule",
                    "plugin_id" => 11,
                    "created_at" => "2019-12-20 14:15:39",
                    "updated_at" => "2019-12-20 14:15:39",
                    "created_by_id" => 1,
                    "updated_by_id" => 1,
                    "operation" => "create",
                    "active" => true,
                    "system" => true,
                    "name" => "Queue Routing Rule Create Permission",
                    "code" => "demo.workflow::models.queueroutingrule.row.create"
                ],
                [
                    "id" => 237,
                    "model" => "Demo\Workflow\Models\QueueRoutingRule",
                    "plugin_id" => 11,
                    "created_at" => "2019-12-20 14:15:39",
                    "updated_at" => "2019-12-20 14:15:39",
                    "created_by_id" => 1,
                    "updated_by_id" => 1,
                    "operation" => "delete",
                    "active" => true,
                    "system" => true,
                    "name" => "Queue Routing Rule Delete Permission",
                    "code" => "demo.workflow::models.queueroutingrule.row.delete"
                ],
                [
                    "id" => 238,
                    "model" => "Demo\Workflow\Models\WorkflowState",
                    "plugin_id" => 11,
                    "created_at" => "2019-12-20 14:15:39",
                    "updated_at" => "2019-12-20 14:15:39",
                    "created_by_id" => 1,
                    "updated_by_id" => 1,
                    "operation" => "create",
                    "active" => true,
                    "system" => true,
                    "name" => "Workflow State Create Permission",
                    "code" => "demo.workflow::models.workflowstate.row.create"
                ],
                [
                    "id" => 239,
                    "model" => "Demo\Workflow\Models\QueueItem",
                    "plugin_id" => 11,
                    "created_at" => "2019-12-20 14:15:39",
                    "updated_at" => "2019-12-20 14:15:39",
                    "created_by_id" => 1,
                    "updated_by_id" => 1,
                    "operation" => "read",
                    "active" => true,
                    "system" => true,
                    "name" => "Queue Item Read Permission",
                    "code" => "demo.workflow::models.queueitem.row.read"
                ]
            ]


        );
    }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
        Db::table('demo_core_permissions')->where('plugin_id', 11)->delete();
    }
}
