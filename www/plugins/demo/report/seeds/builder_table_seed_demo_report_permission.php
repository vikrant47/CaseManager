<?php

namespace Demo\Report\Seeds;

use Demo\Core\Classes\Helpers\JSON;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Classes\Ifs\Seedable;
use Demo\Core\Models\ModelModel;
use Schema;
use Seeder;
use Db;

class BuilderTableSeedDemoReportPermission implements Seedable
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
                "id" => 241,
                "model" => "Demo\Report\Models\Widget",
                "plugin_id" => 14,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "operation" => "read",
                "active" => true,
                "system" => true,
                "name" => "Widget Read Permission",
                "code" => "demo.report::models.widget.row.read"
            ],
            [
                "id" => 242,
                "model" => "Demo\Report\Models\Dashboard",
                "plugin_id" => 14,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "operation" => "write",
                "active" => true,
                "system" => true,
                "name" => "Dashboard Write Permission",
                "code" => "demo.report::models.dashboard.row.write"
            ],
            [
                "id" => 243,
                "model" => "Demo\Report\Models\Dashboard",
                "plugin_id" => 14,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "operation" => "read",
                "active" => true,
                "system" => true,
                "name" => "Dashboard Read Permission",
                "code" => "demo.report::models.dashboard.row.read"
            ],
            [
                "id" => 244,
                "model" => "Demo\Report\Models\Widget",
                "plugin_id" => 14,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "operation" => "delete",
                "active" => true,
                "system" => true,
                "name" => "Widget Delete Permission",
                "code" => "demo.report::models.widget.row.delete"
            ],
            [
                "id" => 245,
                "model" => "Demo\Report\Models\Widget",
                "plugin_id" => 14,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "operation" => "create",
                "active" => true,
                "system" => true,
                "name" => "Widget Create Permission",
                "code" => "demo.report::models.widget.row.create"
            ],
            [
                "id" => 246,
                "model" => "Demo\Report\Models\Dashboard",
                "plugin_id" => 14,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "operation" => "delete",
                "active" => true,
                "system" => true,
                "name" => "Dashboard Delete Permission",
                "code" => "demo.report::models.dashboard.row.delete"
            ],
            [
                "id" => 247,
                "model" => "Demo\Report\Models\Dashboard",
                "plugin_id" => 14,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "operation" => "create",
                "active" => true,
                "system" => true,
                "name" => "Dashboard Create Permission",
                "code" => "demo.report::models.dashboard.row.create"
            ],
            [
                "id" => 248,
                "model" => "Demo\Report\Models\Widget",
                "plugin_id" => 14,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "operation" => "write",
                "active" => true,
                "system" => true,
                "name" => "Widget Write Permission",
                "code" => "demo.report::models.widget.row.write"
            ]
        ]);
    }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
        Db::table('demo_core_permissions')->where('plugin_id', 14)->delete();
    }
}
