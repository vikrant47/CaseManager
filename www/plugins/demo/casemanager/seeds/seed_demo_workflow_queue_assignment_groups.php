<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
/**Auto generated using cmd _: php artisan core:run-seeds Demo.Casemanager d */
class SeedDemoWorkflowQueueAssignmentGroups implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_workflow_queue_assignment_groups')->insert([
            [
                                                'id'=>'4',
                                                            'group_id'=>'3',
                                                            'queue_id'=>'20',
                                                            'plugin_id'=>'6'
                            ] ,            [
                                                'id'=>'8',
                                                            'group_id'=>'5',
                                                            'queue_id'=>'2',
                                                            'plugin_id'=>'6'
                            ] ,            [
                                                'id'=>'3',
                                                            'group_id'=>'4',
                                                            'queue_id'=>'21',
                                                            'plugin_id'=>'6'
                            ] ,            [
                                                'id'=>'6',
                                                            'group_id'=>'4',
                                                            'queue_id'=>'1',
                                                            'plugin_id'=>'6'
                            ] ,            [
                                                'id'=>'7',
                                                            'group_id'=>'6',
                                                            'queue_id'=>'3',
                                                            'plugin_id'=>'6'
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_workflow_queue_assignment_groups')->where('plugin_id', 6)->delete();
            }
}
