<?php

namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Casemanager d */
class SeedDemoWorkflowWorkflows implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
        Db::table('demo_workflow_workflows')->insert([
            [
                'id' => '1',
                'created_at' => '2019-10-08 08:17:55',
                'updated_at' => '2020-04-04 07:18:49',
                'active' => '1',
                'name' => '0',
                'description' => '0',
                'definition' => '0',
                'created_by_id' => null,
                'updated_by_id' => '1',
                'workflow' => 'false',
                'code' => '0',
                'plugin_id' => '6',
                'event' => '0',
                'model' => '0',
                'input_condition' => '0',
                'sort_order' => 'false'
            ]]);
    }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
        Db::table('demo_workflow_workflows')->where('plugin_id', 6)->delete();
    }
}
