<?php

namespace Demo\Casemanager\Seeds;

use Demo\Core\Models\ModelModel;
use Schema;
use Seeder;
use Db;

class BuilderTableSeedDemoCasemanagerSecurityPolicy extends Seeder
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
    public function run()
    {
        // Db::table('demo_core_security_policies')->insert();
    }
}
