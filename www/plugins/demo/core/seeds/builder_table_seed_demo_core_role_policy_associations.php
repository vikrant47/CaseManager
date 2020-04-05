<?php

namespace Demo\Core\Seeds;

use Schema;
use Seeder;
use Db;
use Demo\Core\Classes\Ifs\Seedable;

class BuilderTableSeedDemoCoreRolePolicyAssociations implements Seedable
{
    public function install()
    {
        Db::table('demo_core_role_policy_associations')->insert([
            'role_id' => 3,
            'policy_id' => 61,
            'plugin_id' => 10,
            'created_at' => '2019-12-20 14:15:39',
            'updated_at' => '2019-12-20 14:15:39',
            'created_by_id' => 1,
            'updated_by_id' => 1,
        ]);
    }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
        Db::table('demo_core_user_role_associations')->where('plugin_id', 10)->delete();
    }
}
