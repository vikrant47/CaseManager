<?php

namespace Demo\Casemanager\Seeds;

use Demo\Core\Classes\Helpers\JSON;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Classes\Ifs\Seedable;
use Demo\Core\Models\ModelModel;
use Schema;
use Seeder;
use Db;

class BuilderTableSeedDemoCasemanagerPermission implements Seedable
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
    concat(lower(plugin.code],'::',replace(lower(substr(replace(model.model_type,replace(plugin.code,'.','\'],''],2)],'\','.'],'.row.delete') as code
    from demo_core_models model
           join system_plugin_versions plugin on plugin.id = model.plugin_id;


    delete from demo_core_models where plugin_id = 10;
    delete from demo_core_permissions;
    delete from demo_core_model_associations where plugin_id = 10;*/
    public function install()
    {


        Db::table('demo_core_permissions')->insert([

                [
                    'id' => 81,
                    'model' => 'Demo\\Casemanager\\Models\\CaseModel',
                    'plugin_id' => 6,
                    'created_at' => '2019-12-20 14:15:39',
                    'updated_at' => '2019-12-20 14:15:39',
                    'created_by_id' => 1,
                    'updated_by_id' => 1,
                    'operation' => 'read',
                    'active' => true,
                    'system' => true,
                    'name' => 'Case Model Read Permission',
                    'code' => 'demo.casemanager::models.casemodel.row.read',
                ],
                [
                    'id' => 82,
                    'model' => 'Demo\\Casemanager\\Models\\CasePriority',
                    'plugin_id' => 6,
                    'created_at' => '2019-12-20 14:15:39',
                    'updated_at' => '2019-12-20 14:15:39',
                    'created_by_id' => 1,
                    'updated_by_id' => 1,
                    'operation' => 'read',
                    'active' => true,
                    'system' => true,
                    'name' => 'Case Priority Read Permission',
                    'code' => 'demo.casemanager::models.casepriority.row.read',
                ],

                [
                    'id' => 83,
                    'model' => 'Demo\\Casemanager\\Models\\CaseModel',
                    'plugin_id' => 6,
                    'created_at' => '2019-12-20 14:15:39',
                    'updated_at' => '2019-12-20 14:15:39',
                    'created_by_id' => 1,
                    'updated_by_id' => 1,
                    'operation' => 'write',
                    'active' => true,
                    'system' => true,
                    'name' => 'Case Model Write Permission',
                    'code' => 'demo.casemanager::models.casemodel.row.write',
                ],

                [
                    'id' => 84,
                    'model' => 'Demo\\Casemanager\\Models\\CasePriority',
                    'plugin_id' => 6,
                    'created_at' => '2019-12-20 14:15:39',
                    'updated_at' => '2019-12-20 14:15:39',
                    'created_by_id' => 1,
                    'updated_by_id' => 1,
                    'operation' => 'write',
                    'active' => true,
                    'system' => true,
                    'name' => 'Case Priority Write Permission',
                    'code' => 'demo.casemanager::models.casepriority.row.write',
                ],

                [
                    'id' => 85,
                    'model' => 'Demo\\Casemanager\\Models\\CaseModel',
                    'plugin_id' => 6,
                    'created_at' => '2019-12-20 14:15:39',
                    'updated_at' => '2019-12-20 14:15:39',
                    'created_by_id' => 1,
                    'updated_by_id' => 1,
                    'operation' => 'create',
                    'active' => true,
                    'system' => true,
                    'name' => 'Case Model Create Permission',
                    'code' => 'demo.casemanager::models.casemodel.row.create',
                ],

                [
                    'id' => 86,
                    'model' => 'Demo\\Casemanager\\Models\\CasePriority',
                    'plugin_id' => 6,
                    'created_at' => '2019-12-20 14:15:39',
                    'updated_at' => '2019-12-20 14:15:39',
                    'created_by_id' => 1,
                    'updated_by_id' => 1,
                    'operation' => 'create',
                    'active' => true,
                    'system' => true,
                    'name' => 'Case Priority Create Permission',
                    'code' => 'demo.casemanager::models.casepriority.row.create',
                ],

                [
                    'id' => 87,
                    'model' => 'Demo\\Casemanager\\Models\\CaseModel',
                    'plugin_id' => 6,
                    'created_at' => '2019-12-20 14:15:39',
                    'updated_at' => '2019-12-20 14:15:39',
                    'created_by_id' => 1,
                    'updated_by_id' => 1,
                    'operation' => 'delete',
                    'active' => true,
                    'system' => true,
                    'name' => 'Case Model Delete Permission',
                    'code' => 'demo.casemanager::models.casemodel.row.delete',
                ],

                [
                    'id' => 88,
                    'model' => 'Demo\\Casemanager\\Models\\CasePriority',
                    'plugin_id' => 6,
                    'created_at' => '2019-12-20 14:15:39',
                    'updated_at' => '2019-12-20 14:15:39',
                    'created_by_id' => 1,
                    'updated_by_id' => 1,
                    'operation' => 'delete',
                    'active' => true,
                    'system' => true,
                    'name' => 'Case Priority Delete Permission',
                    'code' => 'demo.casemanager::models.casepriority.row.delete',
                ]
            ]
        );
    }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
        Db::table('demo_core_permissions')->where('plugin_id', 6)->delete();
    }
}
