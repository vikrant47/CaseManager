<?php

namespace Demo\Notification\Seeds;

use Demo\Notification\Models\ModelModel;
use Schema;
use Seeder;
use Db;

class BuilderTableSeedDemoNotificationModelModel extends Seeder
{
    public function run()
    {
        Db::table('demo_core_models')->insert([
            [
                'id' => 51,
                'name' => 'Case Model',
                'model_type' => 'Demo\Notification\Models\NotificationChannel',
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
                'id' => 52,
                'name' => 'Case Priority',
                'model_type' => 'Demo\Notification\Models\Notification',
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
                'id' => 53,
                'name' => 'Case Priority',
                'model_type' => 'Demo\Notification\Models\NotificationSubscriber',
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
