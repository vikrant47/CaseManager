<?php

namespace Demo\Casemanager\Seeds;

use Demo\Core\Models\ModelModel;
use Schema;
use Seeder;
use Db;

class BuilderTableSeedDemoCasemanagerPermission extends Seeder
{
    /*select row_number() OVER () as id,
    model.model_type as model,
    model.plugin_id,
    model.created_at,
    model.updated_at,
    model.created_by_id,
    model.updated_by_id,
    'delete' as operation,
    true as active,
    true as system,
    concat(model.name,' Delete Permission') as name,
    concat(lower(plugin.code),'::',replace(lower(substr(replace(model.model_type,replace(plugin.code,'.','\'),''),2)),'\','.'),'.row.delete') as code
    from demo_core_models model
           join system_plugin_versions plugin on plugin.id = model.plugin_id;


    delete from demo_core_models where plugin_id = 10;
    delete from demo_core_permissions;
    delete from demo_core_model_associations where plugin_id = 10;*/
    public function run()
    {
        Db::table('demo_core_permissions')->insert(json_decode('[]'));
    }
}
