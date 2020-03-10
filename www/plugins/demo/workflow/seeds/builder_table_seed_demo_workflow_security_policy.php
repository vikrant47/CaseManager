<?php

namespace Demo\Workflow\Seeds;

use Demo\Core\Models\ModelModel;
use Schema;
use Seeder;
use Db;
use Demo\Core\Classes\Ifs\Seedable;

class BuilderTableSeedDemoWorkflowSecurityPolicy implements Seedable
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
                "id" => 111,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Queue Security Policy",
                "description" => "Security Policy for all operations on Queue",
                "plugin_id" => 11
            ],
            [
                "id" => 112,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Queue Item Security Policy",
                "description" => "Security Policy for all operations on Queue Item",
                "plugin_id" => 11
            ],
            [
                "id" => 113,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Queue Pop Criteria Security Policy",
                "description" => "Security Policy for all operations on Queue Pop Criteria",
                "plugin_id" => 11
            ],
            [
                "id" => 114,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Queue Routing Rule Security Policy",
                "description" => "Security Policy for all operations on Queue Routing Rule",
                "plugin_id" => 11
            ],
            [
                "id" => 115,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Report Security Policy",
                "description" => "Security Policy for all operations on Report",
                "plugin_id" => 11
            ],
            [
                "id" => 116,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Report Item Security Policy",
                "description" => "Security Policy for all operations on Report Item",
                "plugin_id" => 11
            ],
            [
                "id" => 117,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Report State Security Policy",
                "description" => "Security Policy for all operations on Report State",
                "plugin_id" => 11
            ],
            [
                "id" => 118,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Report Transition Security Policy",
                "description" => "Security Policy for all operations on Report Transition",
                "plugin_id" => 11
            ],
            [
                "id" => 120,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Queue Security Policy",
                "description" => "Security Policy for all operations on Queue",
                "plugin_id" => 11
            ],
            [
                "id" => 121,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Queue Item Security Policy",
                "description" => "Security Policy for all operations on Queue Item",
                "plugin_id" => 11
            ],
            [
                "id" => 122,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Queue Pop Criteria Security Policy",
                "description" => "Security Policy for all operations on Queue Pop Criteria",
                "plugin_id" => 11
            ],
            [
                "id" => 123,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Queue Routing Rule Security Policy",
                "description" => "Security Policy for all operations on Queue Routing Rule",
                "plugin_id" => 11
            ],
            [
                "id" => 124,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Report Security Policy",
                "description" => "Security Policy for all operations on Report",
                "plugin_id" => 11
            ],
            [
                "id" => 125,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Report Item Security Policy",
                "description" => "Security Policy for all operations on Report Item",
                "plugin_id" => 11
            ],
            [
                "id" => 126,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Report State Security Policy",
                "description" => "Security Policy for all operations on Report State",
                "plugin_id" => 11
            ]
        ]);
    }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
        Db::table('demo_core_security_policies')->where('plugin_id', 11)->delete();
    }
}
