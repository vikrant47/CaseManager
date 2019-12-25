<?php

namespace Demo\CaseManager\Seeds;

use Demo\CaseManager\Models\ModelModel;
use Schema;
use Seeder;
use Db;

class BuilderTableSeedDemoCaseManagerModelModel extends Seeder
{
    public function run()
    {
        Db::table('demo_core_models')->insert([
            [
                'id' => 41,
                'name' => 'Case Model',
                'model_type' => 'Demo\CaseManager\Models\CaseModel',
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
                'id' => 42,
                'name' => 'Case Priority',
                'model_type' => 'Demo\CaseManager\Models\CasePriority',
                'plugin_id' => 10,
                'audit' => 0,
                'record_history' => 0,
                'audit_columns' => '["*"]',
                'attach_audited_by' => 1,
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
            ]
        ]);
    }
}
