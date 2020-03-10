<?php

namespace Demo\Report\Seeds;

use Demo\Core\Models\ModelModel;
use Schema;
use Seeder;
use Db;
use Demo\Core\Classes\Ifs\Seedable;

class BuilderTableSeedDemoReportSecurityPolicy implements Seedable
{
    /*select row_number() OVER () as id,
           model.plugin_id,
           model.created_at,
           model.updated_at,
           model.created_by_id,
           model.updated_by_id,
           concat(model.name,' Security Policy') as name,
           concat('Security Policy for all operations on ',model.name) as description
    from demo_core_models model
           join system_plugin_versions plugin on plugin.id = model.plugin_id;*/
    public function install()
    {
        Db::table('demo_core_security_policies')->insert([
            [
                "id" => 141,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Widget Security Policy",
                "description" => "Security Policy for all operations on Widget",
                "plugin_id" => 14
            ],
            [
                "id" => 142,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-28 14:43:57",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Dashboard Security Policy",
                "description" => "Security Policy for all operations on Dashboard",
                "plugin_id" => 14
            ]
        ]);
    }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
        Db::table('demo_core_security_policies')->where('plugin_id', 14)->delete();
    }
}
