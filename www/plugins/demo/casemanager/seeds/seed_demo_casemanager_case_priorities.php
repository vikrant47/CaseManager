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
                                                                            "id"=> 1,
                                                                                        "created_at"=>"2020-04-27 11:07:15",
                                                                                        "updated_at"=>"2020-04-27 11:07:15",
                                                                                        "name"=>"Normal",
                                                                                        "active"=> 1,
                                                                                        "description"=> "",
                                                                                        "duration"=> 2155,
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_casemanager_case_priorities')->delete();
            }
}
