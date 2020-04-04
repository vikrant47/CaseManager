<?php namespace Demo\Workflow\Seeds;

use October\Rain\Database\Updates\Seeder;
use Schema;
use October\Rain\Database\Updates\Migration;
use Db;
use Demo\Core\Classes\Ifs\Seedable;

class BuilderTableSeedDemoWorkflowQueueRoutingRules implements Seedable
{
    public function install()
    {
        Db::table('demo_workflow_queue_routing_rules')->insert([
            [
                "id" => 3,
                "created_at" => "2019-11-16 14:33:18",
                "updated_at" => "2019-11-24 03:58:03",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "script" => "\$model = \$context->model;\n if(empty(\$model)){\nthrow new \$context->exception->ApplicationException('No item left to assign');\n}\nreturn \$context->currentUser;",
                "name" => "Route to current User",
                "description" => "Route to current User",
                "plugin_id" => 1
            ]
        ]);
    }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
        Db::table('demo_workflow_queue_routing_rules')->where('plugin_id', 11)->delete();
    }
}
