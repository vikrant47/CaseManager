<?php
namespace Demo\Workspace\Seeds\V0_0;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds workspace d */
class SeedDemoCoreModelAssociations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_model_associations')->insert([
            [
                                                                            "id"=>"6fe2adab-7928-4ba1-8ab2-9084b5402b18",
                                                                                        "created_at"=>"2019-12-21 11:25:39",
                                                                                        "updated_at"=>"2019-12-21 11:25:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "source_model"=>"Demo\Workspace\Models\Task",
                                                                                        "target_model"=>"Demo\Workspace\Models\Queue",
                                                                                        "foreign_key"=>"queue_id",
                                                                                        "cascade"=>"delete",
                                                                                        "relation"=>"belongs_to",
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "cascade_priority_order"=> 0,
                                                                                        "description"=> "",
                                                                                        "name"=>"Task Belongs To a Queue",
                                                                                        "active"=> 1
                            ] ,            [
                                                                            "id"=>"6e0bc7ae-fd91-4847-8b41-0ab6162153d5",
                                                                                        "created_at"=>"2019-12-21 11:25:39",
                                                                                        "updated_at"=>"2019-12-21 11:25:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "source_model"=>"Demo\Workspace\Models\Queue",
                                                                                        "target_model"=>"Demo\Workspace\Models\QueueRoutingRule",
                                                                                        "foreign_key"=>"routing_rule_id",
                                                                                        "cascade"=>"restrict",
                                                                                        "relation"=>"belongs_to",
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "cascade_priority_order"=> 0,
                                                                                        "description"=> "",
                                                                                        "name"=>"Queue belongs to a Routing Rule",
                                                                                        "active"=> 1
                            ] ,            [
                                                                            "id"=>"c29b6d3c-e548-42e3-baee-707228ceb2a5",
                                                                                        "created_at"=>"2019-12-21 11:25:39",
                                                                                        "updated_at"=>"2019-12-21 11:25:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "source_model"=>"Demo\Workspace\Models\Queue",
                                                                                        "target_model"=>"Demo\Workspace\Models\Model",
                                                                                        "foreign_key"=>"model",
                                                                                        "cascade"=>"restrict",
                                                                                        "relation"=>"belongs_to",
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "cascade_priority_order"=> 0,
                                                                                        "description"=> "",
                                                                                        "name"=>"Queue belongs To a Model",
                                                                                        "active"=> 1
                            ] ,            [
                                                                            "id"=>"8b249641-e989-45f2-933b-9aece616278c",
                                                                                        "created_at"=>"2019-12-21 11:25:39",
                                                                                        "updated_at"=>"2019-12-21 11:25:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "source_model"=>"Demo\Workspace\Models\Work",
                                                                                        "target_model"=>"Demo\Workspace\Models\Workflow",
                                                                                        "foreign_key"=>"workflow_id",
                                                                                        "cascade"=>"restrict",
                                                                                        "relation"=>"belongs_to",
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "cascade_priority_order"=> 0,
                                                                                        "description"=> "",
                                                                                        "name"=>"Workflo Item belongs to a Workflow",
                                                                                        "active"=> 1
                            ] ,            [
                                                                            "id"=>"0c65d193-b870-4f68-be2f-7d40deb5df1b",
                                                                                        "created_at"=>"2019-12-21 11:25:39",
                                                                                        "updated_at"=>"2019-12-21 11:25:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "source_model"=>"Demo\Workspace\Models\WorkflowTransition",
                                                                                        "target_model"=>"Demo\Workspace\Models\Work",
                                                                                        "foreign_key"=>"work",
                                                                                        "cascade"=>"delete",
                                                                                        "relation"=>"belongs_to",
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "cascade_priority_order"=> 0,
                                                                                        "description"=> "",
                                                                                        "name"=>"Workflow Transition belongs to a work",
                                                                                        "active"=> 1
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_model_associations')->where('engine_application_id', '8374144e-94a5-470d-8d9e-4cbad05102ad')->delete();
            }
}
