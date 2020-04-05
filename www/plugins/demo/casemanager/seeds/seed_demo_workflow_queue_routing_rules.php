<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
/**Auto generated using cmd _: php artisan core:run-seeds Demo.Casemanager d */
class SeedDemoWorkflowQueueRoutingRules implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_workflow_queue_routing_rules')->insert([
            [
                                                'id'=>'3',
                                                            'created_at'=>'2019-11-16 14:33:18',
                                                            'updated_at'=>'2020-04-04 07:28:11',
                                                            'created_by_id'=>'1',
                                                            'updated_by_id'=>'1',
                                                            'script'=>'\$model = \$context->model; \n \n  if(empty(\$model)){\n \n     throw new \$context->exception->ApplicationException(\'No item left to assign\');\n \n }\n \n return \$context->currentUser;',
                                                            'name'=>'Route to current User',
                                                            'description'=>'Route to current User',
                                                            'plugin_id'=>'6'
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_workflow_queue_routing_rules')->where('plugin_id', 6)->delete();
            }
}
