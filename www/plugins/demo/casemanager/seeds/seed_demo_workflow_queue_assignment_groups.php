<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Casemanager d */
class SeedDemoWorkflowQueueAssignmentGroups implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_workflow_queue_assignment_groups')->insert([
            [
                                                                            "id"=> 4,
                                                                                        "created_at"=>"2019-12-01 07:42:56",
                                                                                        "updated_at"=>"2019-12-08 08:02:10",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "group_id"=> 3,
                                                                                        "queue_id"=> 20,
                                                                                        "sort_order"=> 1,
                                                                                        "plugin_id"=> 6
                            ] ,            [
                                                                            "id"=> 8,
                                                                                        "created_at"=>"2019-12-01 07:42:56",
                                                                                        "updated_at"=>"2019-12-08 08:02:10",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "group_id"=> 5,
                                                                                        "queue_id"=> 2,
                                                                                        "sort_order"=> 2,
                                                                                        "plugin_id"=> 6
                            ] ,            [
                                                                            "id"=> 3,
                                                                                        "created_at"=>"2019-12-01 07:42:56",
                                                                                        "updated_at"=>"2019-12-08 08:02:10",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "group_id"=> 4,
                                                                                        "queue_id"=> 21,
                                                                                        "sort_order"=> 3,
                                                                                        "plugin_id"=> 6
                            ] ,            [
                                                                            "id"=> 6,
                                                                                        "created_at"=>"2019-12-01 07:42:56",
                                                                                        "updated_at"=>"2019-12-08 08:02:10",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "group_id"=> 4,
                                                                                        "queue_id"=> 1,
                                                                                        "sort_order"=> 4,
                                                                                        "plugin_id"=> 6
                            ] ,            [
                                                                            "id"=> 2,
                                                                                        "created_at"=>"2020-05-17 15:06:26",
                                                                                        "updated_at"=>"2020-05-17 15:06:26",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "group_id"=> 3,
                                                                                        "queue_id"=> 3,
                                                                                        "sort_order"=> 100,
                                                                                        "plugin_id"=> 6
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_workflow_queue_assignment_groups')->where('plugin_id', 6)->delete();
            }
}
