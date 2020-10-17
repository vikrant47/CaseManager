<?php
namespace Demo\Casemanager\Seeds\V0_0;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds casemanager d */
class SeedDemoWorkspaceQueueAssignmentGroups implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_workspace_queue_assignment_groups')->insert([
            [
                                                                            "id"=>"52d49b7f-25d9-4b8b-b2a1-9000cf786a75",
                                                                                        "created_at"=>"2019-12-01 07:42:56",
                                                                                        "updated_at"=>"2019-12-08 08:02:10",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "group_id"=> 3,
                                                                                        "queue_id"=>"85cd4fd8-16a9-482a-b47f-ff7bae2b79d3",
                                                                                        "sort_order"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83"
                            ] ,            [
                                                                            "id"=>"98ea3b1f-954d-4199-9dc7-74516bad65ee",
                                                                                        "created_at"=>"2020-05-31 12:54:22",
                                                                                        "updated_at"=>"2020-05-31 12:54:22",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "group_id"=> 1,
                                                                                        "queue_id"=>"6d9b966c-96ae-4377-88bb-bd68c64ae5bd",
                                                                                        "sort_order"=> 100,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83"
                            ] ,            [
                                                                            "id"=>"3e9183c0-a875-11ea-9502-05990bea0014",
                                                                                        "created_at"=>"2020-06-07 04:13:30",
                                                                                        "updated_at"=>"2020-06-07 04:13:30",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "group_id"=> 3,
                                                                                        "queue_id"=>"b875f437-6cb0-4fe6-8cdf-a7ab3b92a369",
                                                                                        "sort_order"=> 100,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_workspace_queue_assignment_groups')->where('engine_application_id', 'df07f9b4-26c1-40ca-ba1f-1b77b1692b83')->delete();
            }
}
