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
                                                                            "created_at"=>"2020-07-05 14:12:37",
                                                                                        "updated_at"=>"2020-07-05 14:12:37",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "data"=>"[]",
                                                                                        "plugin_id"=> 10,
                                                                                        "column_12"=> null,
                                                                                        "backward_direction"=> false,
                                                                                        "id"=>"94414de0-bec9-11ea-8070-3d0dc703cbb4",
                                                                                        "workflow_item_id"=>"8dd57680-bec9-11ea-9157-a35faa4a956c",
                                                                                        "from_state_id"=>"09dfd34e-0db5-49f3-96b2-23831d811a0b",
                                                                                        "to_state_id"=>"16d9ddab-a130-4bbd-8d5c-b3e82fbf00de"
                            ] ,            [
                                                                            "created_at"=>"2020-07-27 04:56:35",
                                                                                        "updated_at"=>"2020-07-27 04:56:35",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "data"=>"[]",
                                                                                        "plugin_id"=> 10,
                                                                                        "column_12"=> null,
                                                                                        "backward_direction"=> false,
                                                                                        "id"=>"8c2473f0-cfc5-11ea-9b6b-9b251ee63d0a",
                                                                                        "workflow_item_id"=>"85300590-cfc5-11ea-97e5-65857e66f280",
                                                                                        "from_state_id"=>"09dfd34e-0db5-49f3-96b2-23831d811a0b",
                                                                                        "to_state_id"=>"16d9ddab-a130-4bbd-8d5c-b3e82fbf00de"
                            ] ,            [
                                                                            "created_at"=>"2020-08-09 09:14:28",
                                                                                        "updated_at"=>"2020-08-09 09:14:28",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "data"=>"[]",
                                                                                        "plugin_id"=> 10,
                                                                                        "column_12"=> null,
                                                                                        "backward_direction"=> false,
                                                                                        "id"=>"b9dca100-da20-11ea-ab74-339b1b5a868b",
                                                                                        "workflow_item_id"=>"9cb91bd0-becb-11ea-a623-57a0e0ff0756",
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
