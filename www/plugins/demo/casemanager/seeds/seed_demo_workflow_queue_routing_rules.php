<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Casemanager d */
class SeedDemoWorkflowQueueRoutingRules implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_workflow_queue_routing_rules')->insert([
            [
                                                                            "created_at"=>"2019-11-16 14:33:18",
                                                                                        "updated_at"=>"2020-04-04 07:28:11",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "script"=>"\$model = \$context->model; \r\nif(empty(\$model)){\r\nthrow new \$context->exception->ApplicationException('No item left to assign');\r\n}\r\nreturn \$context->currentUser;",
                                                                                        "name"=>"Route to current User",
                                                                                        "description"=>"Route to current User",
                                                                                        "plugin_id"=> 6,
                                                                                        "id"=>"0e0ccad0-13fe-447e-a476-966159910a54"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_workflow_queue_routing_rules')->where('plugin_id', 6)->delete();
            }
}
