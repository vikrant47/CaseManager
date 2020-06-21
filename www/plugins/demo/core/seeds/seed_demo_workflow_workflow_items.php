<?php
namespace Demo\Core\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Core d */
class SeedDemoWorkflowWorkflowItems implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_workflow_workflow_items')->insert([
            [
                                                                            "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "created_at"=>"2020-06-14 06:45:44",
                                                                                        "updated_at"=>"2020-06-14 09:21:18",
                                                                                        "assigned_at"=> null,
                                                                                        "assigned_to_id"=> null,
                                                                                        "finished_at"=> null,
                                                                                        "plugin_id"=> 10,
                                                                                        "id"=>"abab1080-ae0a-11ea-a560-9be5a4bca4e2",
                                                                                        "workflow_id"=>"dd25a3b6-0e8b-4af7-b50d-d9030068b84a",
                                                                                        "record_id"=>"ab979270-ae0a-11ea-8a21-bd39412de736",
                                                                                        "current_state_id"=>"16d9ddab-a130-4bbd-8d5c-b3e82fbf00de"
                            ] ,            [
                                                                            "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "created_at"=>"2020-06-20 09:18:05",
                                                                                        "updated_at"=>"2020-06-20 09:18:15",
                                                                                        "assigned_at"=> null,
                                                                                        "assigned_to_id"=> null,
                                                                                        "finished_at"=> null,
                                                                                        "plugin_id"=> 10,
                                                                                        "id"=>"f27b8800-b2d6-11ea-896a-4f4de426e27e",
                                                                                        "workflow_id"=>"dd25a3b6-0e8b-4af7-b50d-d9030068b84a",
                                                                                        "record_id"=>"f2628130-b2d6-11ea-9857-af73e7931f92",
                                                                                        "current_state_id"=>"16d9ddab-a130-4bbd-8d5c-b3e82fbf00de"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_workflow_workflow_items')->where('plugin_id', 10)->delete();
            }
}
