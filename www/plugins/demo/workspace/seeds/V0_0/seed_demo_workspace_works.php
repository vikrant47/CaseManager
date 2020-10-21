<?php
namespace Demo\Workspace\Seeds\V0_0;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds workspace d */
class SeedDemoWorkspaceWorks implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_workspace_works')->insert([
            [
                                                                            "id"=>"50f85db0-1284-11eb-9948-3bb582b174ff",
                                                                                        "created_at"=>"2020-10-20 03:28:26",
                                                                                        "updated_at"=>"2020-10-20 03:28:36",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "record_id"=>"50f30cd0-1284-11eb-aca1-e33fe7157c22",
                                                                                        "workflow_id"=>"ec3eed60-1031-11eb-b6d3-e3a41e584492",
                                                                                        "service_channel_id"=>"6aec2f36-3de0-4131-b326-de418cb8549a",
                                                                                        "assigned_to_id"=> null,
                                                                                        "priority"=> 1,
                                                                                        "workflow_state_id"=>"16d9ddab-a130-4bbd-8d5c-b3e82fbf00de",
                                                                                        "status"=>"waiting",
                                                                                        "completed_at"=> null,
                                                                                        "context"=> null
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_workspace_works')->delete();
            }
}
