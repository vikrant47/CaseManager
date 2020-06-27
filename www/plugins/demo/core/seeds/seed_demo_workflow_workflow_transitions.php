<?php
namespace Demo\Core\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Core d */
class SeedDemoWorkflowWorkflowTransitions implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_workflow_workflow_transitions')->insert([
            [
                                                                            "created_at"=>"2020-06-20 09:18:15",
                                                                                        "updated_at"=>"2020-06-20 09:18:15",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "data"=>"[]",
                                                                                        "plugin_id"=> 10,
                                                                                        "column_12"=> null,
                                                                                        "backward_direction"=> false,
                                                                                        "id"=>"f89fb340-b2d6-11ea-ac6d-75439eb82025",
                                                                                        "workflow_item_id"=>"f27b8800-b2d6-11ea-896a-4f4de426e27e",
                                                                                        "from_state_id"=>"09dfd34e-0db5-49f3-96b2-23831d811a0b",
                                                                                        "to_state_id"=>"16d9ddab-a130-4bbd-8d5c-b3e82fbf00de"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_workflow_workflow_transitions')->where('plugin_id', 10)->delete();
            }
}
