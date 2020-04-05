<?php

namespace Demo\Core\Seeds;

use Schema;
use Seeder;
use Db;
use Demo\Core\Classes\Ifs\Seedable;

class BuilderTableSeedDemoCoreRole implements Seedable
{
    public function install()
    {
        Db::table('demo_core_roles')->insert([
            'id' => 1,
            'name' => 'Administrator',
            'code' => 'admin',
            'description' => 'Admin of the platform',
            'created_at' => '2019-12-20 14:15:39',
            'updated_at' => '2019-12-20 14:15:39',
            'created_by_id' => 1,
            'updated_by_id' => 1,
            'plugin_id' => 10,
        ], [
            'id' => 2,
            'name' => 'Everyone',
            'code' => 'everyone',
            'description' => 'Every User will have this role by default.',
            'created_at' => '2019-12-20 14:15:39',
            'updated_at' => '2019-12-20 14:15:39',
            'created_by_id' => 1,
            'updated_by_id' => 1,
            'plugin_id' => 10,
        ], [
            "id" => 3,
            "created_at" => "2020-04-04 14:10:36",
            "updated_at" => "2020-04-04 14:10:36",
            "created_by_id" => 1,
            "updated_by_id" => 1,
            "plugin_id" => 6,
            "code" => "agent",
            "name" => "Agent",
            "description" => ""
        ]);
    }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
        Db::table('demo_core_roles')->where('plugin_id', 10)->delete();
    }
}
