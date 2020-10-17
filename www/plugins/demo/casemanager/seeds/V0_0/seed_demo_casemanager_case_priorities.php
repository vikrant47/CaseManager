<?php
namespace Demo\Casemanager\Seeds\V0_0;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds casemanager d */
class SeedDemoCasemanagerCasePriorities implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_casemanager_case_priorities')->insert([
            [
                                                                            "id"=>"4e54bbc0-0337-11eb-a34b-4f9f239ba7b3",
                                                                                        "created_at"=>"2020-09-30 16:09:23",
                                                                                        "updated_at"=>"2020-09-30 16:09:23",
                                                                                        "name"=>"P1",
                                                                                        "active"=> 1,
                                                                                        "description"=>"Priority one cases",
                                                                                        "value"=> 10,
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_casemanager_case_priorities')->delete();
            }
}
