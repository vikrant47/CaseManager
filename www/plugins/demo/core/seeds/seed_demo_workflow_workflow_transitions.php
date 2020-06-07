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
                                                                            "created_at"=>"2020-06-07 04:44:51",
                                                                                        "updated_at"=>"2020-06-07 04:44:51",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "data"=>"[]",
                                                                                        "plugin_id"=> 10,
                                                                                        "column_12"=> null,
                                                                                        "backward_direction"=> false,
                                                                                        "id"=>"9fe89eb0-a879-11ea-b469-d71f540b14f4",
                                                                                        "workflow_item_id"=>"92bf27c0-a879-11ea-962d-0566fd1e639d",
                                                                                        "from_state_id"=>"09dfd34e-0db5-49f3-96b2-23831d811a0b",
                                                                                        "to_state_id"=>"16d9ddab-a130-4bbd-8d5c-b3e82fbf00de"
                            ] ,            [
                                                                            "created_at"=>"2020-06-07 06:24:47",
                                                                                        "updated_at"=>"2020-06-07 06:24:47",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "data"=>"[]",
                                                                                        "plugin_id"=> 10,
                                                                                        "column_12"=> null,
                                                                                        "backward_direction"=> false,
                                                                                        "id"=>"95767220-a887-11ea-a56c-814cd3580c8a",
                                                                                        "workflow_item_id"=>"5ea7cb80-a885-11ea-a545-edfd74facbf1",
                                                                                        "from_state_id"=>"09dfd34e-0db5-49f3-96b2-23831d811a0b",
                                                                                        "to_state_id"=>"16d9ddab-a130-4bbd-8d5c-b3e82fbf00de"
                            ] ,            [
                                                                            "created_at"=>"2020-06-07 06:26:50",
                                                                                        "updated_at"=>"2020-06-07 06:26:50",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "data"=>"[]",
                                                                                        "plugin_id"=> 10,
                                                                                        "column_12"=> null,
                                                                                        "backward_direction"=> false,
                                                                                        "id"=>"deef5430-a887-11ea-a291-43a32169ba8d",
                                                                                        "workflow_item_id"=>"d2a8cc00-a887-11ea-b2e9-9f07e3360ea6",
                                                                                        "from_state_id"=>"09dfd34e-0db5-49f3-96b2-23831d811a0b",
                                                                                        "to_state_id"=>"16d9ddab-a130-4bbd-8d5c-b3e82fbf00de"
                            ] ,            [
                                                                            "created_at"=>"2020-06-07 06:27:51",
                                                                                        "updated_at"=>"2020-06-07 06:27:51",
                                                                                        "created_by_id"=> 2,
                                                                                        "updated_by_id"=> 2,
                                                                                        "data"=>"[]",
                                                                                        "plugin_id"=> 10,
                                                                                        "column_12"=> null,
                                                                                        "backward_direction"=> false,
                                                                                        "id"=>"0361f110-a888-11ea-8998-835e84f75d8d",
                                                                                        "workflow_item_id"=>"d2a8cc00-a887-11ea-b2e9-9f07e3360ea6",
                                                                                        "from_state_id"=>"16d9ddab-a130-4bbd-8d5c-b3e82fbf00de",
                                                                                        "to_state_id"=>"c5a45023-2d2a-48ca-94b1-3097c0af7d05"
                            ] ,            [
                                                                            "created_at"=>"2020-06-07 06:28:36",
                                                                                        "updated_at"=>"2020-06-07 06:28:36",
                                                                                        "created_by_id"=> 2,
                                                                                        "updated_by_id"=> 2,
                                                                                        "data"=>"[]",
                                                                                        "plugin_id"=> 10,
                                                                                        "column_12"=> null,
                                                                                        "backward_direction"=> false,
                                                                                        "id"=>"1e038630-a888-11ea-b665-b77a92b641bb",
                                                                                        "workflow_item_id"=>"d2a8cc00-a887-11ea-b2e9-9f07e3360ea6",
                                                                                        "from_state_id"=>"c5a45023-2d2a-48ca-94b1-3097c0af7d05",
                                                                                        "to_state_id"=>"bfc699c2-db96-4358-85e3-9956a4c815a4"
                            ] ,            [
                                                                            "created_at"=>"2020-06-07 06:52:46",
                                                                                        "updated_at"=>"2020-06-07 06:52:46",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "data"=>"[]",
                                                                                        "plugin_id"=> 10,
                                                                                        "column_12"=> null,
                                                                                        "backward_direction"=> false,
                                                                                        "id"=>"7e7a94a0-a88b-11ea-b6b3-1346cc4c0e34",
                                                                                        "workflow_item_id"=>"4895ad20-a88b-11ea-857c-df4c041a8840",
                                                                                        "from_state_id"=>"09dfd34e-0db5-49f3-96b2-23831d811a0b",
                                                                                        "to_state_id"=>"16d9ddab-a130-4bbd-8d5c-b3e82fbf00de"
                            ] ,            [
                                                                            "created_at"=>"2020-06-07 06:56:02",
                                                                                        "updated_at"=>"2020-06-07 06:56:02",
                                                                                        "created_by_id"=> 2,
                                                                                        "updated_by_id"=> 2,
                                                                                        "data"=>"[]",
                                                                                        "plugin_id"=> 10,
                                                                                        "column_12"=> null,
                                                                                        "backward_direction"=> false,
                                                                                        "id"=>"f35613b0-a88b-11ea-a5ad-83279e990b95",
                                                                                        "workflow_item_id"=>"4895ad20-a88b-11ea-857c-df4c041a8840",
                                                                                        "from_state_id"=>"16d9ddab-a130-4bbd-8d5c-b3e82fbf00de",
                                                                                        "to_state_id"=>"c5a45023-2d2a-48ca-94b1-3097c0af7d05"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_workflow_workflow_transitions')->where('plugin_id', 10)->delete();
            }
}
