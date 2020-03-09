<?php

namespace Demo\Report\Seeds;

use Demo\Core\Models\ModelModel;
use Schema;
use Seeder;
use Db;
use Demo\Core\Classes\Ifs\Seedable;

class BuilderTableSeedDemoReportModelAssociation implements Seedable
{
    public function install()
    {
        /*Db::table('demo_core_model_associations')->insert([
        ]);*/
    }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
        Db::table('demo_core_model_associations')->where('plugin_id', 14)->delete();
    }
}
