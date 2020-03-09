<?php namespace Demo\Workflow\Seeds;

use October\Rain\Database\Updates\Seeder;
use Schema;
use October\Rain\Database\Updates\Migration;
use Db;
use Demo\Core\Classes\Ifs\Seedable;

class BuilderTableSeedDemoWorkflowQueuePopCriteria implements Seedable
{
    public function install()
    {
        Db::table('demo_workflow_queue_pop_criterias')->insert([
            [
                "id" => 3,
                "created_at" => "2019-11-16 13:07:42",
                "updated_at" => "2019-11-23 16:32:02",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Simple Pop Criteria",
                "description" => "This will pop any random item from queue",
                "script" => "return \$query->where('demo_workflow_queue_items.item_type','Demo\\Workflow\\Models\\WorkflowItem');",
                "plugin_id" => 6
            ]
        ]);
    }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
        Db::table('demo_workflow_queue_pop_criterias')->where('plugin_id', 6)->delete();
    }
}
