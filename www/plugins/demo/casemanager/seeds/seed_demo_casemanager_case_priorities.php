<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Casemanager d */
class SeedDemoCasemanagerCasePriorities implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_casemanager_case_priorities')->insert([
            [
                                                                            "created_at"=>"2020-04-27 11:07:15",
                                                                                        "updated_at"=>"2020-04-27 11:07:15",
                                                                                        "name"=>"Normal",
                                                                                        "active"=> 1,
                                                                                        "description"=> "",
                                                                                        "duration"=> 2155,
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "id"=>"1bf6101c-7662-425a-bd1e-ef71d3b934d6"
                            ] ,            [
                                                                            "created_at"=>"2020-04-27 11:12:45",
                                                                                        "updated_at"=>"2020-04-27 11:12:45",
                                                                                        "name"=>"High",
                                                                                        "active"=> 1,
                                                                                        "description"=> 54,
                                                                                        "duration"=> 5,
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "id"=>"41e1a52e-e0d6-4cd4-96cc-00aec660b510"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_casemanager_case_priorities')->delete();
            }
}
