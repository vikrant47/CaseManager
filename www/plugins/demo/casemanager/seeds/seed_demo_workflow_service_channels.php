<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Casemanager d */
class SeedDemoWorkflowServiceChannels implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_workflow_service_channels')->insert([
            [
                                                                            "id"=>"6aec2f36-3de0-4131-b326-de418cb8549a",
                                                                                        "created_at"=>"2020-04-04 06:03:08",
                                                                                        "updated_at"=>"2020-04-04 07:22:51",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> "df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "name"=>"Case Assignment Channel",
                                                                                        "event"=>"[\"creating\",\"updating\"]",
                                                                                        "description"=> "",
                                                                                        "model"=>"Demo\Workflow\Models\WorkflowItem",
                                                                                        "inbox_order"=> 1,
                                                                                        "active"=> 1,
                                                                                        "assigned_to_field"=>"assigned_to_id",
                                                                                        "assignment_capacity"=> -1,
                                                                                        "condition"=>"return strtolower(\$context->model->model) === 'demo\casemanager\models\casemodel';"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_workflow_service_channels')->where('plugin_id', 6)->delete();
            }
}
