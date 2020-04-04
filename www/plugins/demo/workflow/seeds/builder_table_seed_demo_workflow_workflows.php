<?php namespace Demo\Workflow\Seeds;

use Illuminate\Database\Seeder;
use Schema;
use October\Rain\Database\Updates\Migration;
use Db;
use Demo\Core\Classes\Ifs\Seedable;

class BuilderTableSeedDemoWorkflowWorkflows implements Seedable
{
    public function install()
    {
        Db::table('demo_workflow_workflows')->insert([
            [
                "id" => 1,
                "created_at" => "2019-10-08 08:17:55",
                "updated_at" => "2020-03-15 14:40:45",
                "active" => 1,
                "name" => "Case Workflow",
                "description" => "Case Workflow",
                "definition" => '[{"from_state":"3","to_state":"4"},{"from_state":"4","to_state":"5"},{"from_state":"5","to_state":"6"}]',
                "created_by_id" => null,
                "updated_by_id" => 1,
                "workflow" => null,
                "code" => "case-workflow",
                "plugin_id" => 11,
                "event" => "created",
                "model" => "Demo\Casemanager\Models\CaseModel",
                "input_condition" => "return true;",
                "sort_order" => 0
            ]
        ]);
    }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
        Db::table('demo_workflow_workflows')->where('plugin_id', 11)->delete();
    }
}