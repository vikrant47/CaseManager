<?php namespace Demo\Workflow\Seeds;

use October\Rain\Database\Updates\Seeder;
use Schema;
use October\Rain\Database\Updates\Migration;
use Db;

class BuilderTableSeedDemoQueueRoutingRules extends Seeder
{
    public function run()
    {
        Db::table('demo_workflow_queues_routing_rules')->insert([
            "id" => 3,
            "created_at" => "2019-11-16 14:33:18",
            "updated_at" => "2019-11-24 03:58:03",
            "created_by_id" => 1,
            "updated_by_id" => 1,
            "script" => "\$item = \$context->item; \r\n if(empty(\$item)){\r\n    throw new \$context->exception->ApplicationException('No item left to assign');\r\n}\r\n\$item->assigned_to = \$context->currentUser;\r\n\$item->save();\r\nreturn \$context->currentUser;",
            "name" => "Route to current User",
            "description" => "Route to current User",
            "plugin_id" => 1
        ]);
    }
}
