<?php
namespace Demo\Casemanager\Seeds\V0_0;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds casemanager d */
class SeedDemoWorkspaceServiceChannels implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_workspace_service_channels')->insert([
            [
                                                                            "id"=>"6aec2f36-3de0-4131-b326-de418cb8549a",
                                                                                        "created_at"=>"2020-04-04 06:03:08",
                                                                                        "updated_at"=>"2020-10-09 03:34:35",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "name"=>"Case Channel",
                                                                                        "description"=> "",
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "priority"=> 1,
                                                                                        "active"=> 1,
                                                                                        "condition"=>"\"{\"condition\":\"AND\",\"rules\":[],\"not\":false,\"valid\":true}\"",
                                                                                        "sort_order"=> 0,
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_workspace_service_channels')->where('engine_application_id', 'df07f9b4-26c1-40ca-ba1f-1b77b1692b83')->delete();
            }
}
