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
                                                                                        "created_at"=>"2020-06-20 09:18:04",
                                                                                        "updated_at"=>"2020-06-20 09:18:15",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "assigned_to_id"=> null,
                                                                                        "case_number"=> 7015,
                                                                                        "case_version"=> 54545,
                                                                                        "version"=> 3,
                                                                                        "suspect"=> 5454,
                                                                                        "tat_duration"=> 3170481484,
                                                                                        "comments"=> "",
                                                                                        "id"=>"f2628130-b2d6-11ea-9857-af73e7931f92",
                                                                                        "priority_id"=> null,
                                                                                        "workflow_state_id"=>"16d9ddab-a130-4bbd-8d5c-b3e82fbf00de",
                                                                                        "queue_id"=>"c83b37aa-0fd9-4987-bff7-1a604da1ffde"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_casemanager_cases')->delete();
            }
}
