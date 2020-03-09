<?php namespace Demo\Workflow\Seeds;

use Illuminate\Database\Seeder;
use Schema;
use October\Rain\Database\Updates\Migration;
use Demo\Core\Classes\Ifs\Seedable;

class BuilderTableCreateDemoWorkflowWorkflowStates implements Seedable
{
    public function install()
    {
        Db::table('demo_workflow_states')->insert([
            [
                "id" => 3,
                "created_at" => "2019-10-12 10:40:02",
                "updated_at" => "2019-10-12 10:40:02",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Start",
                "description" => "",
                "active" => 1,
                "code" => "start",
                "plugin_id" => null
            ],
            [
                "id" => 4,
                "created_at" => "2019-10-12 10:41:09",
                "updated_at" => "2019-10-12 10:41:09",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Quality",
                "description" => "",
                "active" => 1,
                "code" => "quality",
                "plugin_id" => null
            ],
            [
                "id" => 5,
                "created_at" => "2019-10-12 10:41:21",
                "updated_at" => "2019-10-12 10:41:21",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Doctor",
                "description" => "",
                "active" => 1,
                "code" => "doctor",
                "plugin_id" => null
            ],
            [
                "id" => 6,
                "created_at" => "2019-10-12 10:41:30",
                "updated_at" => "2019-10-12 10:41:56",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Finish",
                "description" => "",
                "active" => 1,
                "code" => "finish",
                "plugin_id" => null
            ]
        ]);

    }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
        Db::table('demo_workflow_states')->where('plugin_id', 10)->delete();
    }
}