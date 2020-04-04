<?php

namespace Demo\CaseManager\Seeds;

use Schema;
use Seeder;
use Db;
use Demo\Core\Classes\Ifs\Seedable;

class BuilderTableSeedDemoCaseManagerModelModel implements Seedable
{
    public function install()
    {
        Db::table('demo_core_models')->insert([
            [
                'id' => 41,
                'name' => 'Case Model',
                'model_type' => 'Demo\Casemanager\Models\CaseModel',
                'plugin_id' => 6,
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
                'model_type' => 'Demo\Casemanager\Models\CasePriority',
                'plugin_id' => 6,
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

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
        Db::table('demo_core_models')->where('plugin_id', 6)->delete();
    }
}
