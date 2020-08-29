<?php
namespace Demo\Core\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Core d */
class SeedDemoWorkflowWorkflowStates implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_workflow_workflow_states')->insert([
            [
                                                                            "id"=>"09dfd34e-0db5-49f3-96b2-23831d811a0b",
                                                                                        "created_at"=>"2019-10-12 10:40:02",
                                                                                        "updated_at"=>"2019-10-12 10:40:02",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Start",
                                                                                        "description"=> "",
                                                                                        "active"=> 1,
                                                                                        "code"=>"start",
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"8c7e9158-b65c-437a-a5d9-4b975f7b6f51",
                                                                                        "created_at"=>"2019-10-12 10:41:30",
                                                                                        "updated_at"=>"2019-10-12 10:41:56",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Finish",
                                                                                        "description"=> "",
                                                                                        "active"=> 1,
                                                                                        "code"=>"finish",
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_workflow_workflow_states')->where('plugin_id', 10)->delete();
            }
}
