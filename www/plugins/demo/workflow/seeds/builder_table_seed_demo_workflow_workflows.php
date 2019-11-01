<?php namespace Demo\Workflow\Seeds;

use Illuminate\Database\Seeder;
use Schema;
use October\Rain\Database\Updates\Migration;
use Db;

class BuilderTableCreateDemoWorkflowWorkflows extends Seeder
{
    public function run()
    {
        Db::table('demo_workflow_queues')->insert([
            [
                "id" => 1,
                "created_at" => "2019-10-08 08:17:55",
                "updated_at" => "2019-10-13 06:06:39",
                "active" => 1,
                "name" => "Case Workflow",
                "description" => "Case Workflow",
                "definition" => '[{"from_state":"3","to_state":"4","queue":"21"},{"from_state":"4","to_state":"5","queue":"20"},{"from_state":"5","to_state":"6","queue":"22"}]',
                "created_by_id" => null,
                "updated_by_id" => 1,
                "workflow" => null,
                "code" => "case-workflow"
            ]
        ]);
    }
}