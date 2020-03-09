<?php

namespace Demo\Workflow\Seeds;

use Demo\Workflow\Models\ModelModel;
use Schema;
use Seeder;
use Db;
use Demo\Core\Classes\Ifs\Seedable;

class BuilderTableSeedDemoWorkflowModelModel implements Seedable
{
    public function install()
    {
        Db::table('demo_core_models')->insert([
            [
                'id' => 13,
                'name' => 'Queue',
                'model_type' => 'Demo\Workflow\Models\Queue',
                'plugin_id' => 11,
                'audit' => 0,
                'record_history' => 0,
                'audit_columns' => '["*"]',
                'attach_audited_by' => 1,
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
            ], [
                'id' => 14,
                'name' => 'Queue Item',
                'model_type' => 'Demo\Workflow\Models\QueueItem',
                'plugin_id' => 11,
                'audit' => 0,
                'record_history' => 0,
                'audit_columns' => '["*"]',
                'attach_audited_by' => 1,
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
            ], [
                'id' => 15,
                'name' => 'Queue Pop Criteria',
                'model_type' => 'Demo\Workflow\Models\QueuePopCriteria',
                'plugin_id' => 11,
                'audit' => 0,
                'record_history' => 0,
                'audit_columns' => '["*"]',
                'attach_audited_by' => 1,
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
            ], [
                'id' => 16,
                'name' => 'Queue Routing Rule',
                'model_type' => 'Demo\Workflow\Models\QueueRoutingRule',
                'plugin_id' => 11,
                'audit' => 0,
                'record_history' => 0,
                'audit_columns' => '["*"]',
                'attach_audited_by' => 1,
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
            ], [
                'id' => 17,
                'name' => 'Workflow',
                'model_type' => 'Demo\Workflow\Models\Workflow',
                'plugin_id' => 11,
                'audit' => 0,
                'record_history' => 0,
                'audit_columns' => '["*"]',
                'attach_audited_by' => 1,
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
            ], [
                'id' => 18,
                'name' => 'Workflow Item',
                'model_type' => 'Demo\Workflow\Models\WorkflowItem',
                'plugin_id' => 11,
                'audit' => 0,
                'record_history' => 0,
                'audit_columns' => '["*"]',
                'attach_audited_by' => 1,
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
            ], [
                'id' => 19,
                'name' => 'Workflow State',
                'model_type' => 'Demo\Workflow\Models\WorkflowState',
                'plugin_id' => 11,
                'audit' => 0,
                'record_history' => 0,
                'audit_columns' => '["*"]',
                'attach_audited_by' => 1,
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
            ], [
                'id' => 20,
                'name' => 'Workflow Transition',
                'model_type' => 'Demo\Workflow\Models\WorkflowTransition',
                'plugin_id' => 11,
                'audit' => 0,
                'record_history' => 0,
                'audit_columns' => '["*"]',
                'attach_audited_by' => 1,
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
            ], [
                'id' => 21,
                'name' => 'Webhook',
                'model_type' => 'Demo\Workflow\Models\Webhook',
                'plugin_id' => 11,
                'audit' => 0,
                'record_history' => 0,
                'audit_columns' => '["*"]',
                'attach_audited_by' => 1,
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
            ],
        ]);
    }
    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
        Db::table('demo_core_models')->where('plugin_id', 11)->delete();
    }
}
