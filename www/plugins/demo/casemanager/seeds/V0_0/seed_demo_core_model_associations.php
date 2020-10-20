<?php
namespace Demo\Casemanager\Seeds\V0_0;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds casemanager d */
class SeedDemoCoreModelAssociations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_model_associations')->insert([
            [
                                                                            "id"=>"516a3880-111a-11eb-9a43-f10e7cd98495",
                                                                                        "created_at"=>"2020-10-18 08:17:09",
                                                                                        "updated_at"=>"2020-10-18 08:17:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "source_model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "target_model"=>"Demo\Workspace\Models\Work",
                                                                                        "foreign_key"=>"work_id",
                                                                                        "cascade"=>"restrict",
                                                                                        "relation"=>"belongs_to",
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "cascade_priority_order"=> 0,
                                                                                        "description"=> "",
                                                                                        "name"=>"Case Belongs To Work",
                                                                                        "active"=> 1
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_model_associations')->where('engine_application_id', 'df07f9b4-26c1-40ca-ba1f-1b77b1692b83')->delete();
            }
}
