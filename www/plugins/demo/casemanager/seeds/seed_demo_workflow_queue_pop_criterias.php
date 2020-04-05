<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Casemanager d */
class SeedDemoWorkflowQueuePopCriterias implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_workflow_queue_pop_criterias')->insert([
            [
                                                            'id'=>'3',
                                                                        'created_at'=>'2019-11-16 13:07:42',
                                                                        'updated_at'=>'2020-04-04 07:27:01',
                                                                        'created_by_id'=>'1',
                                                                        'updated_by_id'=>'1',
                                                                                                    'name'=>'0',
                                                                                                    'description'=>'0',
                                                                                                    'script'=>'0',
                                                                        'plugin_id'=>'6'
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_workflow_queue_pop_criterias')->where('plugin_id', 6)->delete();
            }
}
