<?php

namespace Demo\Core\Seeds;

use Schema;
use Seeder;

class BuilderTableSeedDemoCoreRole extends Seeder
{
    public function run()
    {
        Db::table('demo_core_user_role_associations')->insert([
            'id' => 1,
            'role_id' => 1,
            'user_id' => 1,
            'created_at' => '2019-12-20 14:15:39',
            'updated_at' => '2019-12-20 14:15:39',
            'created_by_id' => 1,
            'updated_by_id' => 1,
            'plugin_id' => 10,
        ]);
    }
}
