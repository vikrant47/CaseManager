<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Casemanager d */
class SeedDemoWorkflowQueueAssignmentGroups implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_workflow_queue_assignment_groups')->insert([
            [
                                                                            "created_at"=>"2019-12-01 07:42:56",
                                                                                        "updated_at"=>"2019-12-08 08:02:10",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "group_id"=> 3,
                                                                                        "sort_order"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "id"=>"52d49b7f-25d9-4b8b-b2a1-9000cf786a75",
                                                                                        "queue_id"=>"85cd4fd8-16a9-482a-b47f-ff7bae2b79d3"
                            ] ,            [
                                                                            "created_at"=>"2019-12-01 07:42:56",
                                                                                        "updated_at"=>"2019-12-08 08:02:10",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "group_id"=> 4,
                                                                                        "sort_order"=> 3,
                                                                                        "plugin_id"=> 6,
                                                                                        "id"=>"49b78145-0bc7-4f10-82ff-c3be8b87867d",
                                                                                        "queue_id"=> null
                            ] ,            [
                                                                            "created_at"=>"2020-05-31 12:54:22",
                                                                                        "updated_at"=>"2020-05-31 12:54:22",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "group_id"=> 1,
                                                                                        "sort_order"=> 100,
                                                                                        "plugin_id"=> 6,
                                                                                        "id"=>"98ea3b1f-954d-4199-9dc7-74516bad65ee",
                                                                                        "queue_id"=>"6d9b966c-96ae-4377-88bb-bd68c64ae5bd"
                            ] ,            [
                                                                            "created_at"=>"2020-06-07 04:13:30",
                                                                                        "updated_at"=>"2020-06-07 04:13:30",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "group_id"=> 3,
                                                                                        "sort_order"=> 100,
                                                                                        "plugin_id"=> 6,
                                                                                        "id"=>"3e9183c0-a875-11ea-9502-05990bea0014",
                                                                                        "queue_id"=>"b875f437-6cb0-4fe6-8cdf-a7ab3b92a369"
                            ] ,            [
                                                                            "created_at"=>"2020-06-07 05:48:38",
                                                                                        "updated_at"=>"2020-06-07 05:48:38",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "group_id"=> 2,
                                                                                        "sort_order"=> 100,
                                                                                        "plugin_id"=> 6,
                                                                                        "id"=>"88bf4020-a882-11ea-a4b6-d99aa93534a8",
                                                                                        "queue_id"=>"c83b37aa-0fd9-4987-bff7-1a604da1ffde"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_workflow_queue_assignment_groups')->where('plugin_id', 6)->delete();
            }
}
