<?php

namespace Demo\Casemanager\Seeds;

use Demo\Core\Models\ModelModel;
use Schema;
use Seeder;
use Db;
use Demo\Core\Classes\Ifs\Seedable;

class BuilderTableSeedDemoCasemanagerSecurityPolicy implements Seedable
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
        Db::table('demo_core_security_policies')->insert(json_decode('[
  {
    "id": 61,
    "plugin_id": 6,
    "created_at": "2019-12-20 14:15:39",
    "updated_at": "2019-12-20 14:15:39",
    "created_by_id": 1,
    "updated_by_id": 1,
    "name": "Case Model Security Policy",
    "description": "Security Policy for all operations on Case Model"
  },
  {
    "id": 62,
    "plugin_id": 6,
    "created_at": "2019-12-20 14:15:39",
    "updated_at": "2019-12-20 14:15:39",
    "created_by_id": 1,
    "updated_by_id": 1,
    "name": "Case Priority Security Policy",
    "description": "Security Policy for all operations on Case Priority"
  }
]', true));
    }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
        Db::table('demo_core_security_policies')->where('plugin_id', 6)->delete();
    }
}
