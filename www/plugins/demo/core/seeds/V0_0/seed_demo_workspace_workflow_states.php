<?php
namespace Demo\Core\Seeds\V0_0;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds engine d */
class SeedDemoWorkspaceWorkflowStates implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_workspace_workflow_states')->insert([
            [
                                                                            "id"=>"8c7e9158-b65c-437a-a5d9-4b975f7b6f51",
                                                                                        "created_at"=>"2019-10-12 10:41:30",
                                                                                        "updated_at"=>"2019-10-12 10:41:56",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Finish",
                                                                                        "description"=> "",
                                                                                        "active"=> 1,
                                                                                        "code"=>"finish",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"09dfd34e-0db5-49f3-96b2-23831d811a0b",
                                                                                        "created_at"=>"2019-10-12 10:40:02",
                                                                                        "updated_at"=>"2020-10-09 02:24:10",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Start",
                                                                                        "description"=> "",
                                                                                        "active"=> 1,
                                                                                        "code"=>"start",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_workspace_workflow_states')->where('engine_application_id', 'dc81b635-1d0a-4f3e-83af-13642d56abe4')->delete();
            }
}
