<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Casemanager d */
class SeedDemoCasemanagerCases implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_casemanager_cases')->insert([
            [
                                                                            "title"=> null,
                                                                                        "description"=> null,
                                                                                        "created_at"=>"2020-07-05 14:27:09",
                                                                                        "updated_at"=>"2020-07-05 14:27:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "assigned_to_id"=> 1,
                                                                                        "case_number"=> 5454,
                                                                                        "case_version"=> "",
                                                                                        "version"=> 1,
                                                                                        "suspect"=> 54545,
                                                                                        "tat_duration"=> 3171796028,
                                                                                        "comments"=> "",
                                                                                        "id"=>"9bcbd910-becb-11ea-8a82-27160d7ae9f3",
                                                                                        "priority_id"=> null,
                                                                                        "workflow_state_id"=>"09dfd34e-0db5-49f3-96b2-23831d811a0b",
                                                                                        "queue_id"=> null
                            ] ,            [
                                                                            "title"=> null,
                                                                                        "description"=> null,
                                                                                        "created_at"=>"2020-07-27 04:56:23",
                                                                                        "updated_at"=>"2020-07-27 04:56:35",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "assigned_to_id"=> null,
                                                                                        "case_number"=> 4555,
                                                                                        "case_version"=> "",
                                                                                        "version"=> 2,
                                                                                        "suspect"=> 5555,
                                                                                        "tat_duration"=> 3173662583,
                                                                                        "comments"=> "",
                                                                                        "id"=>"8511a1b0-cfc5-11ea-b61f-f3c1964e7cf1",
                                                                                        "priority_id"=> null,
                                                                                        "workflow_state_id"=>"16d9ddab-a130-4bbd-8d5c-b3e82fbf00de",
                                                                                        "queue_id"=> null
                            ] ,            [
                                                                            "title"=> null,
                                                                                        "description"=> null,
                                                                                        "created_at"=>"2020-07-05 14:12:26",
                                                                                        "updated_at"=>"2020-08-09 09:13:41",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "assigned_to_id"=> 1,
                                                                                        "case_number"=> 54545,
                                                                                        "case_version"=> 54545,
                                                                                        "version"=> 4,
                                                                                        "suspect"=> 64,
                                                                                        "tat_duration"=> 3171795146,
                                                                                        "comments"=> "",
                                                                                        "id"=>"8dc0d800-bec9-11ea-8024-69f5b89267d0",
                                                                                        "priority_id"=> null,
                                                                                        "workflow_state_id"=>"16d9ddab-a130-4bbd-8d5c-b3e82fbf00de",
                                                                                        "queue_id"=>"c83b37aa-0fd9-4987-bff7-1a604da1ffde"
                            ] ,            [
                                                                            "title"=> null,
                                                                                        "description"=> null,
                                                                                        "created_at"=>"2020-07-05 14:27:10",
                                                                                        "updated_at"=>"2020-08-09 09:14:27",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "assigned_to_id"=> null,
                                                                                        "case_number"=> 5454,
                                                                                        "case_version"=> "",
                                                                                        "version"=> 2,
                                                                                        "suspect"=> 54545,
                                                                                        "tat_duration"=> 3171796030,
                                                                                        "comments"=> "",
                                                                                        "id"=>"9caa4610-becb-11ea-9b6a-9df544c173f0",
                                                                                        "priority_id"=> null,
                                                                                        "workflow_state_id"=>"16d9ddab-a130-4bbd-8d5c-b3e82fbf00de",
                                                                                        "queue_id"=> null
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_casemanager_cases')->delete();
            }
}
