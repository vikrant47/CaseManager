<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds casemanager d */
class SeedDemoWorkflowQueuePopCriterias implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_workflow_queue_pop_criterias')->insert([
            [
                                                                            "id"=>"b9aadb51-d325-48d2-a903-c2e12fbbad34",
                                                                                        "created_at"=>"2019-11-16 13:07:42",
                                                                                        "updated_at"=>"2020-04-06 16:22:31",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Simple Pop Criteria",
                                                                                        "description"=>"This will pop any random item from queue",
                                                                                        "script"=>"return \$context->query->where('demo_workflow_queue_items.model','Demo\Workflow\Models\WorkflowItem');",
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_workflow_queue_pop_criterias')->where('engine_application_id', 'df07f9b4-26c1-40ca-ba1f-1b77b1692b83')->delete();
            }
}
