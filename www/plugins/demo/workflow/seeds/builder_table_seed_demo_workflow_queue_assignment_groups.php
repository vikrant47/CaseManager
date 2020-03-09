<?php namespace Demo\Workflow\Seeds;

use Illuminate\Database\Seeder;
use Schema;
use Db;
use October\Rain\Database\Updates\Migration;
use Demo\Core\Classes\Ifs\Seedable;

class BuilderTableSeedDemoWorkflowQueueAssignmentGroups implements Seedable
{
    public function install()
    {
        Db::table('demo_workflow_queue_assignment_groups')->insert([
            [
                "id" => 3,
                "group_id" => 4,
                "queue_id" => 21,
                "plugin_id" => null
            ],
            [
                "id" => 4,
                "group_id" => 3,
                "queue_id" => 20,
                "plugin_id" => null
            ],
            [
                "id" => 6,
                "group_id" => 4,
                "queue_id" => 1,
                "plugin_id" => null
            ],
            [
                "id" => 7,
                "group_id" => 6,
                "queue_id" => 3,
                "plugin_id" => null
            ],
            [
                "id" => 8,
                "group_id" => 5,
                "queue_id" => 2,
                "plugin_id" => null
            ]
        ]);
    }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
        Db::table('demo_workflow_queue_assignment_groups')->delete();
    }
}
