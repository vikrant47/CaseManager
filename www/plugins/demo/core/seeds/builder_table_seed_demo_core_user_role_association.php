<?php

namespace Demo\Core\Seeds;

use Schema;
use Seeder;
use Db;
use Demo\Core\Classes\Ifs\Seedable;

class BuilderTableSeedDemoCoreUserRoleAssociation implements Seedable
{
    public function install()
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
        ], [
            'id' => 2,
            'role_id' => 3,
            'user_id' => 6,
            'created_at' => '2019-12-20 14:15:39',
            'updated_at' => '2019-12-20 14:15:39',
            'created_by_id' => 1,
            'updated_by_id' => 1,
            'plugin_id' => 10,
        ], [
            'id' => 3,
            'role_id' => 3,
            'user_id' => 3,
            'created_at' => '2019-12-20 14:15:39',
            'updated_at' => '2019-12-20 14:15:39',
            'created_by_id' => 1,
            'updated_by_id' => 1,
            'plugin_id' => 10,
        ]);
    }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
        Db::table('demo_core_user_role_associations')->where('plugin_id', 10)->delete();
    }
}
