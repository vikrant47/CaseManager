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
                                                                            "id"=>"94414de0-bec9-11ea-8070-3d0dc703cbb4",
                                                                                        "created_at"=>"2020-07-05 14:12:37",
                                                                                        "updated_at"=>"2020-07-05 14:12:37",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "backward_direction"=> false,
                                                                                        "workflow_item_id"=>"8dd57680-bec9-11ea-9157-a35faa4a956c",
                                                                                        "from_state_id"=>"09dfd34e-0db5-49f3-96b2-23831d811a0b",
                                                                                        "to_state_id"=>"16d9ddab-a130-4bbd-8d5c-b3e82fbf00de",
                                                                                        "data"=>"[]",
                                                                                        "engine_application_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"8c2473f0-cfc5-11ea-9b6b-9b251ee63d0a",
                                                                                        "created_at"=>"2020-07-27 04:56:35",
                                                                                        "updated_at"=>"2020-07-27 04:56:35",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "backward_direction"=> false,
                                                                                        "workflow_item_id"=>"85300590-cfc5-11ea-97e5-65857e66f280",
                                                                                        "from_state_id"=>"09dfd34e-0db5-49f3-96b2-23831d811a0b",
                                                                                        "to_state_id"=>"16d9ddab-a130-4bbd-8d5c-b3e82fbf00de",
                                                                                        "data"=>"[]",
                                                                                        "engine_application_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"b9dca100-da20-11ea-ab74-339b1b5a868b",
                                                                                        "created_at"=>"2020-08-09 09:14:28",
                                                                                        "updated_at"=>"2020-08-09 09:14:28",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "backward_direction"=> false,
                                                                                        "workflow_item_id"=>"9cb91bd0-becb-11ea-a623-57a0e0ff0756",
                                                                                        "from_state_id"=>"09dfd34e-0db5-49f3-96b2-23831d811a0b",
                                                                                        "to_state_id"=>"16d9ddab-a130-4bbd-8d5c-b3e82fbf00de",
                                                                                        "data"=>"[]",
                                                                                        "engine_application_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"d85b9fa0-db19-11ea-b528-2520ae19beed",
                                                                                        "created_at"=>"2020-08-10 14:57:43",
                                                                                        "updated_at"=>"2020-08-10 14:57:43",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "backward_direction"=> false,
                                                                                        "workflow_item_id"=>"9cb91bd0-becb-11ea-a623-57a0e0ff0756",
                                                                                        "from_state_id"=>"16d9ddab-a130-4bbd-8d5c-b3e82fbf00de",
                                                                                        "to_state_id"=>"c5a45023-2d2a-48ca-94b1-3097c0af7d05",
                                                                                        "data"=>"[]",
                                                                                        "engine_application_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_workflow_workflow_transitions')->where('engine_application_id', 'dc81b635-1d0a-4f3e-83af-13642d56abe4')->delete();
            }
}
