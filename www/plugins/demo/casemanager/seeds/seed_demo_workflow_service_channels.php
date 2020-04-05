<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Casemanager d */
class SeedDemoWorkflowServiceChannels implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_workflow_service_channels')->insert([
            [
                                                            'id'=>'1',
                                                                        'created_at'=>'2020-04-04 06:03:08',
                                                                        'updated_at'=>'2020-04-04 07:22:51',
                                                                        'created_by_id'=>'1',
                                                                        'updated_by_id'=>'1',
                                                                        'plugin_id'=>'6',
                                                                                                    'name'=>'0',
                                                                                                    'description'=>'false',
                                                                                                    'model'=>'0',
                                                                        'inbox_order'=>'1',
                                                                        'active'=>'1',
                                                                                                    'assigned_to_field'=>'0',
                                                                        'assignment_capacity'=>'-1',
                                                                                                    'condition'=>'0',
                                                                                                    'event'=>'0'
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_workflow_service_channels')->where('plugin_id', 6)->delete();
            }
}
