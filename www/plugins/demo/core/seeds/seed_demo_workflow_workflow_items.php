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
                            ] ,            [
                                                                            "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "created_at"=>"2020-07-05 14:27:09",
                                                                                        "updated_at"=>"2020-07-05 14:27:09",
                                                                                        "assigned_at"=> null,
                                                                                        "assigned_to_id"=> 1,
                                                                                        "finished_at"=> null,
                                                                                        "plugin_id"=> 10,
                                                                                        "id"=>"9bdae480-becb-11ea-93d8-839f540d3201",
                                                                                        "workflow_id"=>"dd25a3b6-0e8b-4af7-b50d-d9030068b84a",
                                                                                        "record_id"=>"9bcbd910-becb-11ea-8a82-27160d7ae9f3",
                                                                                        "current_state_id"=>"09dfd34e-0db5-49f3-96b2-23831d811a0b"
                            ] ,            [
                                                                            "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "created_at"=>"2020-07-27 04:56:24",
                                                                                        "updated_at"=>"2020-07-27 04:56:35",
                                                                                        "assigned_at"=> null,
                                                                                        "assigned_to_id"=> null,
                                                                                        "finished_at"=> null,
                                                                                        "plugin_id"=> 10,
                                                                                        "id"=>"85300590-cfc5-11ea-97e5-65857e66f280",
                                                                                        "workflow_id"=>"dd25a3b6-0e8b-4af7-b50d-d9030068b84a",
                                                                                        "record_id"=>"8511a1b0-cfc5-11ea-b61f-f3c1964e7cf1",
                                                                                        "current_state_id"=>"16d9ddab-a130-4bbd-8d5c-b3e82fbf00de"
                            ] ,            [
                                                                            "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "created_at"=>"2020-07-05 14:12:27",
                                                                                        "updated_at"=>"2020-08-09 09:13:41",
                                                                                        "assigned_at"=> null,
                                                                                        "assigned_to_id"=> 1,
                                                                                        "finished_at"=> null,
                                                                                        "plugin_id"=> 10,
                                                                                        "id"=>"8dd57680-bec9-11ea-9157-a35faa4a956c",
                                                                                        "workflow_id"=>"dd25a3b6-0e8b-4af7-b50d-d9030068b84a",
                                                                                        "record_id"=>"8dc0d800-bec9-11ea-8024-69f5b89267d0",
                                                                                        "current_state_id"=>"16d9ddab-a130-4bbd-8d5c-b3e82fbf00de"
                            ] ,            [
                                                                            "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "created_at"=>"2020-07-05 14:27:11",
                                                                                        "updated_at"=>"2020-08-10 14:57:43",
                                                                                        "assigned_at"=> null,
                                                                                        "assigned_to_id"=> null,
                                                                                        "finished_at"=> null,
                                                                                        "plugin_id"=> 10,
                                                                                        "id"=>"9cb91bd0-becb-11ea-a623-57a0e0ff0756",
                                                                                        "workflow_id"=>"dd25a3b6-0e8b-4af7-b50d-d9030068b84a",
                                                                                        "record_id"=>"9caa4610-becb-11ea-9b6a-9df544c173f0",
                                                                                        "current_state_id"=>"c5a45023-2d2a-48ca-94b1-3097c0af7d05"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_workflow_workflow_items')->where('plugin_id', 10)->delete();
            }
}
