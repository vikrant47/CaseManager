<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds casemanager d */
class SeedDemoWorkflowWorkflowStates implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_workflow_workflow_states')->insert([
            [
                                                                            "id"=>"c5a45023-2d2a-48ca-94b1-3097c0af7d05",
                                                                                        "created_at"=>"2019-10-12 10:41:21",
                                                                                        "updated_at"=>"2019-10-12 10:41:21",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Doctor",
                                                                                        "description"=> "",
                                                                                        "active"=> 1,
                                                                                        "code"=>"doctor",
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83"
                            ] ,            [
                                                                            "id"=>"16d9ddab-a130-4bbd-8d5c-b3e82fbf00de",
                                                                                        "created_at"=>"2019-10-12 10:41:09",
                                                                                        "updated_at"=>"2019-10-12 10:41:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Quality",
                                                                                        "description"=> "",
                                                                                        "active"=> 1,
                                                                                        "code"=>"quality",
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83"
                            ] ,            [
                                                                            "id"=>"bfc699c2-db96-4358-85e3-9956a4c815a4",
                                                                                        "created_at"=>"2020-05-04 13:36:46",
                                                                                        "updated_at"=>"2020-05-04 13:36:46",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Before Finish",
                                                                                        "description"=> "",
                                                                                        "active"=> 1,
                                                                                        "code"=>"before-finish",
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_workflow_workflow_states')->where('engine_application_id', 'df07f9b4-26c1-40ca-ba1f-1b77b1692b83')->delete();
            }
}
