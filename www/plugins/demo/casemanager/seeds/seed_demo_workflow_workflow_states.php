<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Casemanager d */
class SeedDemoWorkflowWorkflowStates implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_workflow_workflow_states')->insert([
            [
                                                                            "id"=> 5,
                                                                                        "created_at"=>"2019-10-12 10:41:21",
                                                                                        "updated_at"=>"2019-10-12 10:41:21",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Doctor",
                                                                                        "description"=> "",
                                                                                        "active"=> 1,
                                                                                        "code"=>"doctor",
                                                                                        "plugin_id"=> 6
                            ] ,            [
                                                                            "id"=> 4,
                                                                                        "created_at"=>"2019-10-12 10:41:09",
                                                                                        "updated_at"=>"2019-10-12 10:41:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Quality",
                                                                                        "description"=> "",
                                                                                        "active"=> 1,
                                                                                        "code"=>"quality",
                                                                                        "plugin_id"=> 6
                            ] ,            [
                                                                            "id"=> 1,
                                                                                        "created_at"=>"2020-05-04 13:36:46",
                                                                                        "updated_at"=>"2020-05-04 13:36:46",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Before Finish",
                                                                                        "description"=> "",
                                                                                        "active"=> 1,
                                                                                        "code"=>"before-finish",
                                                                                        "plugin_id"=> 6
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_workflow_workflow_states')->where('plugin_id', 6)->delete();
            }
}
