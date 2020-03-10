<?php namespace Demo\Workflow\Seeds;

use Illuminate\Database\Seeder;
use Schema;
use October\Rain\Database\Updates\Migration;
use Demo\Core\Classes\Ifs\Seedable;

class BuilderTableSeedDemoWorkflowWorkflowItems implements Seedable
{
    public function install()
    {

    }
    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
        // Db::table('demo_core_security_policies')->where('plugin_id', 10)->delete();
    }
}
