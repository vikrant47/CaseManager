<?php

namespace Demo\Core\Seeds;

use Demo\Core\Models\ModelModel;
use Schema;
use Seeder;
use Db;

class BuilderTableSeedDemoCoreModelModel extends Seeder
{
    public function run()
    {
        Db::table('demo_core_models')->insert([
            [
                'id' => 1,
                'name' => 'Models Model',
                'model_type' => 'Demo\Core\Models\Model',
                'plugin_id' => 10,
                'audit' => 0,
                'record_history' => 0,
                'audit_columns' => '["*"]',
                'attach_audited_by' => 1,
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
            ], [
                'id' => 2,
                'name' => 'Custom Field',
                'model_type' => 'Demo\Core\Models\CustomField',
                'plugin_id' => 10,
                'audit' => 0,
                'record_history' => 0,
                'audit_columns' => '["*"]',
                'attach_audited_by' => 1,
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
            ], [
                'id' => 3,
                'name' => 'Form Field',
                'model_type' => 'Demo\Core\Models\FormField',
                'plugin_id' => 10,
                'audit' => 0,
                'record_history' => 0,
                'audit_columns' => '["*"]',
                'attach_audited_by' => 1,
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
            ], [
                'id' => 4,
                'name' => 'Event Handler',
                'model_type' => 'Demo\Core\Models\EventHandler',
                'plugin_id' => 10,
                'audit' => 0,
                'record_history' => 0,
                'audit_columns' => '["*"]',
                'attach_audited_by' => 1,
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
            ], [
                'id' => 5,
                'name' => 'Inbound Api',
                'model_type' => 'Demo\Core\Models\InboundApi',
                'plugin_id' => 10,
                'audit' => 0,
                'record_history' => 0,
                'audit_columns' => '["*"]',
                'attach_audited_by' => 1,
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
            ], [
                'id' => 6,
                'name' => 'Command',
                'model_type' => 'Demo\Core\Models\Command',
                'plugin_id' => 10,
                'audit' => 0,
                'record_history' => 0,
                'audit_columns' => '["*"]',
                'attach_audited_by' => 1,
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
            ], [
                'id' => 7,
                'name' => 'Iframe',
                'model_type' => 'Demo\Core\Models\Iframe',
                'plugin_id' => 10,
                'audit' => 0,
                'record_history' => 0,
                'audit_columns' => '["*"]',
                'attach_audited_by' => 1,
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
            ], [
                'id' => 8,
                'name' => 'Javascript Library',
                'model_type' => 'Demo\Core\Models\JavascriptLibrary',
                'plugin_id' => 10,
                'audit' => 0,
                'record_history' => 0,
                'audit_columns' => '["*"]',
                'attach_audited_by' => 1,
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
            ], [
                'id' => 9,
                'name' => 'Webhook',
                'model_type' => 'Demo\Core\Models\Webhook',
                'plugin_id' => 10,
                'audit' => 0,
                'record_history' => 0,
                'audit_columns' => '["*"]',
                'attach_audited_by' => 1,
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
            ], [
                'id' => 10,
                'name' => 'Model Association',
                'model_type' => 'Demo\Core\Models\ModelAssociation',
                'plugin_id' => 10,
                'audit' => 0,
                'record_history' => 0,
                'audit_columns' => '["*"]',
                'attach_audited_by' => 1,
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
            ], [
                'id' => 60,
                'name' => 'Role',
                'model_type' => 'Demo\Core\Models\Role',
                'plugin_id' => 10,
                'audit' => 0,
                'record_history' => 0,
                'audit_columns' => '["*"]',
                'attach_audited_by' => 1,
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
            ], [
                'id' => 61,
                'name' => 'Permission',
                'model_type' => 'Demo\Core\Models\Permission',
                'plugin_id' => 10,
                'audit' => 0,
                'record_history' => 0,
                'audit_columns' => '["*"]',
                'attach_audited_by' => 1,
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
            ], [
                'id' => 62,
                'name' => 'Security Policy',
                'model_type' => 'Demo\Core\Models\SecurityPolicy',
                'plugin_id' => 10,
                'audit' => 0,
                'record_history' => 0,
                'audit_columns' => '["*"]',
                'attach_audited_by' => 1,
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
            ], [
                'id' => 63,
                'name' => 'Security Policy Association',
                'model_type' => 'Demo\Core\Models\PermissionPolicyAssociation',
                'plugin_id' => 10,
                'audit' => 0,
                'record_history' => 0,
                'audit_columns' => '["*"]',
                'attach_audited_by' => 1,
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
            ], [
                'id' => 64,
                'name' => 'Role Policy Association',
                'model_type' => 'Demo\Core\Models\RolePolicyAssociation',
                'plugin_id' => 10,
                'audit' => 0,
                'record_history' => 0,
                'audit_columns' => '["*"]',
                'attach_audited_by' => 1,
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
            ], [
                'id' => 65,
                'name' => 'User',
                'model_type' => 'Demo\Core\Models\UserModel',
                'plugin_id' => 10,
                'audit' => 0,
                'record_history' => 0,
                'audit_columns' => '["*"]',
                'attach_audited_by' => 1,
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
            ], [
                'id' => 80,
                'name' => 'User',
                'model_type' => 'Demo\Core\Models\UserGroupModel',
                'plugin_id' => 10,
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
}
