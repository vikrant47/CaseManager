<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Casemanager d */
class SeedDemoWorkflowQueues implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_workflow_queues')->insert([
            [
                                                            'id'=>'20',
                                                                                                    'queue_order'=>'0',
                                                                                                    'script'=>'false',
                                                                        'created_at'=>'2019-10-13 03:46:56',
                                                                        'updated_at'=>'2020-04-04 13:26:49',
                                                                        'created_by_id'=>'1',
                                                                        'updated_by_id'=>'1',
                                                                                                    'name'=>'0',
                                                                                                    'description'=>'0',
                                                                                                    'input_condition'=>'0',
                                                                        'active'=>'1',
                                                                                                    'redundancy_policy'=>'0',
                                                                                                    'virtual'=>'false',
                                                                        'sort_order'=>'-900',
                                                                        'plugin_id'=>'6',
                                                                        'pop_criteria_id'=>'3',
                                                                        'routing_rule_id'=>'3',
                                                                        'service_channel_id'=>'1'
                            ] ,            [
                                                            'id'=>'2',
                                                                                                    'queue_order'=>'0',
                                                                                                    'script'=>'false',
                                                                        'created_at'=>'2019-10-13 03:46:56',
                                                                        'updated_at'=>'2020-04-04 13:27:00',
                                                                        'created_by_id'=>'1',
                                                                        'updated_by_id'=>'1',
                                                                                                    'name'=>'0',
                                                                                                    'description'=>'0',
                                                                                                    'input_condition'=>'0',
                                                                                                    'active'=>'false',
                                                                                                    'redundancy_policy'=>'0',
                                                                                                    'virtual'=>'false',
                                                                        'sort_order'=>'-900',
                                                                        'plugin_id'=>'6',
                                                                        'pop_criteria_id'=>'3',
                                                                        'routing_rule_id'=>'3',
                                                                        'service_channel_id'=>'1'
                            ] ,            [
                                                            'id'=>'3',
                                                                                                    'queue_order'=>'0',
                                                                                                    'script'=>'0',
                                                                        'created_at'=>'2019-10-06 10:07:03',
                                                                        'updated_at'=>'2020-04-04 08:56:55',
                                                                        'created_by_id'=>'1',
                                                                        'updated_by_id'=>'1',
                                                                                                    'name'=>'0',
                                                                                                    'description'=>'0',
                                                                                                    'input_condition'=>'0',
                                                                        'active'=>'1',
                                                                                                    'redundancy_policy'=>'0',
                                                                        'virtual'=>'1',
                                                                        'sort_order'=>'-1',
                                                                        'plugin_id'=>'6',
                                                                        'pop_criteria_id'=>'3',
                                                                        'routing_rule_id'=>'3',
                                                                        'service_channel_id'=>'1'
                            ] ,            [
                                                            'id'=>'1',
                                                                                                    'queue_order'=>'0',
                                                                                                    'script'=>'false',
                                                                        'created_at'=>'2019-10-13 03:46:56',
                                                                        'updated_at'=>'2020-04-04 13:27:07',
                                                                        'created_by_id'=>'1',
                                                                        'updated_by_id'=>'1',
                                                                                                    'name'=>'0',
                                                                                                    'description'=>'0',
                                                                                                    'input_condition'=>'0',
                                                                        'active'=>'1',
                                                                                                    'redundancy_policy'=>'0',
                                                                                                    'virtual'=>'false',
                                                                        'sort_order'=>'-900',
                                                                        'plugin_id'=>'6',
                                                                        'pop_criteria_id'=>'3',
                                                                        'routing_rule_id'=>'3',
                                                                        'service_channel_id'=>'1'
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_workflow_queues')->where('plugin_id', 6)->delete();
            }
}
