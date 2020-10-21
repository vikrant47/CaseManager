<?php
namespace Demo\Casemanager\Seeds\V0_0;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds casemanager d */
class SeedDemoCasemanagerCases implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_casemanager_cases')->insert([
            [
                                                                            "id"=>"50f30cd0-1284-11eb-aca1-e33fe7157c22",
                                                                                        "title"=> null,
                                                                                        "description"=> null,
                                                                                        "created_at"=>"2020-10-20 03:28:26",
                                                                                        "updated_at"=>"2020-10-20 03:28:36",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "assigned_to_id"=> null,
                                                                                        "priority_id"=>"4e54bbc0-0337-11eb-a34b-4f9f239ba7b3",
                                                                                        "case_number"=> 78,
                                                                                        "case_version"=> 543,
                                                                                        "version"=> 1,
                                                                                        "suspect"=> 876,
                                                                                        "ttl"=> null,
                                                                                        "comments"=> "",
                                                                                        "workflow_state_id"=>"16d9ddab-a130-4bbd-8d5c-b3e82fbf00de",
                                                                                        "queue_id"=> null,
                                                                                        "work_id"=>"50f85db0-1284-11eb-9948-3bb582b174ff"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_casemanager_cases')->delete();
            }
}
