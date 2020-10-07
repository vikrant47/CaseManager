<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds casemanager d */
class SeedDemoWorkflowQueues implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_workflow_queues')->insert([
            [
                                                                            "id"=>"85cd4fd8-16a9-482a-b47f-ff7bae2b79d3",
                                                                                        "name"=>"Doctor Queue",
                                                                                        "description"=>"All case in this queue will be assigned to a doctor",
                                                                                        "active"=> 1,
                                                                                        "priority"=> -900,
                                                                                        "model"=> "",
                                                                                        "created_at"=>"2019-10-13 03:46:56",
                                                                                        "updated_at"=>"2020-04-04 13:26:49",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "routing_rule_id"=>"0e0ccad0-13fe-447e-a476-966159910a54",
                                                                                        "age_priority"=> 1
                            ] ,            [
                                                                            "id"=>"b875f437-6cb0-4fe6-8cdf-a7ab3b92a369",
                                                                                        "name"=>"Check IN - Case Workflow Assignment Queue1",
                                                                                        "description"=>"This queue will assign the case to current user who created the case",
                                                                                        "active"=> 1,
                                                                                        "priority"=> -1,
                                                                                        "model"=> "",
                                                                                        "created_at"=>"2019-10-06 10:07:03",
                                                                                        "updated_at"=>"2020-06-07 04:13:30",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "routing_rule_id"=>"0e0ccad0-13fe-447e-a476-966159910a54",
                                                                                        "age_priority"=> 1
                            ] ,            [
                                                                            "id"=>"6d9b966c-96ae-4377-88bb-bd68c64ae5bd",
                                                                                        "name"=>"Admin Queue",
                                                                                        "description"=>"All case in this queue will be assigned to a Admin",
                                                                                        "active"=> 1,
                                                                                        "priority"=> -900,
                                                                                        "model"=> "",
                                                                                        "created_at"=>"2019-10-13 03:46:56",
                                                                                        "updated_at"=>"2020-05-31 12:54:23",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "routing_rule_id"=>"0e0ccad0-13fe-447e-a476-966159910a54",
                                                                                        "age_priority"=> 1
                            ] ,            [
                                                                            "id"=>"c83b37aa-0fd9-4987-bff7-1a604da1ffde",
                                                                                        "name"=>"Quality Queue",
                                                                                        "description"=>"<p>All case in this queue will be assigned to a Quality</p>",
                                                                                        "active"=> 1,
                                                                                        "priority"=> 10,
                                                                                        "model"=> "",
                                                                                        "created_at"=>"2019-10-13 03:46:56",
                                                                                        "updated_at"=>"2020-10-07 02:47:58",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "routing_rule_id"=>"0e0ccad0-13fe-447e-a476-966159910a54",
                                                                                        "age_priority"=> 1
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_workflow_queues')->where('engine_application_id', 'df07f9b4-26c1-40ca-ba1f-1b77b1692b83')->delete();
            }
}
