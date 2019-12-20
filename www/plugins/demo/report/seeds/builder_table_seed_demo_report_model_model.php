<?php

namespace Demo\Report\Seeds;

use Demo\Report\Models\ModelModel;
use Schema;
use Seeder;
use Db;

class BuilderTableSeedDemoReportModelModel extends Seeder
{
    public function run()
    {
        Db::table('demo_core_models')->insert([
            [
                'id' => 10,
                'name' => 'Widget',
                'model_type' => 'Demo\Report\Models\Widget',
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
                'id' => 11,
                'name' => 'Dashboard',
                'model_type' => 'Demo\Report\Models\Dashboard',
                'plugin_id' => 11,
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
