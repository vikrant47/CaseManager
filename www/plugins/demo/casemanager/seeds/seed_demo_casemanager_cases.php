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
                                                                            "id"=> 23,
                                                                                        "title"=> null,
                                                                                        "description"=> null,
                                                                                        "created_at"=>"2020-05-17 15:20:54",
                                                                                        "updated_at"=>"2020-05-17 15:21:30",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "assigned_to_id"=> 1,
                                                                                        "priority_id"=> 1,
                                                                                        "case_number"=> 2222,
                                                                                        "case_version"=> 545454,
                                                                                        "version"=> 1,
                                                                                        "suspect"=>"wweewe",
                                                                                        "tat_duration"=> 5454545,
                                                                                        "comments"=> ""
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_casemanager_cases')->delete();
            }
}
