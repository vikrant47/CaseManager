<?php
namespace Demo\Workspace\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds workflow d */
class SeedDemoCoreModels implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_models')->insert([
            [
                                                                            "id"=>"e9f77000-0784-11eb-9634-45f73bce36cc",
                                                                                        "created_at"=>"2020-10-06 03:35:00",
                                                                                        "updated_at"=>"2020-10-06 03:36:30",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Work",
                                                                                        "model"=>"Demo\Workspace\Models\Work",
                                                                                        "controller"=>"Demo\Workspace\Controllers\WorkController",
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "audit"=> false,
                                                                                        "viewable"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\"*\"]",
                                                                                        "description"=> "",
                                                                                        "attach_audited_by"=> false
                            ] ,            [
                                                                            "id"=>"28a10280-084d-11eb-ad89-01de43c8d0e4",
                                                                                        "created_at"=>"2020-10-07 03:28:25",
                                                                                        "updated_at"=>"2020-10-07 03:28:25",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Work Profile",
                                                                                        "model"=>"Demo\Workspace\Models\WorkProfile",
                                                                                        "controller"=>"Demo\Workspace\Controllers\WorkProfileController",
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "audit"=> false,
                                                                                        "viewable"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"*",
                                                                                        "description"=> "",
                                                                                        "attach_audited_by"=> false
                            ] ,            [
                                                                            "id"=>"655c489d-961b-458c-b233-ade97b1d2eb4",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue",
                                                                                        "model"=>"Demo\Workspace\Models\Queue",
                                                                                        "controller"=>"Demo\Workspace\Controllers\QueueController",
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "audit"=> false,
                                                                                        "viewable"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\"*\"]",
                                                                                        "description"=> null,
                                                                                        "attach_audited_by"=> 1
                            ] ,            [
                                                                            "id"=>"1a2a24f6-af44-4098-84b8-78f6975e81e9",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Pop Criteria",
                                                                                        "model"=>"Demo\Workspace\Models\QueuePopCriteria",
                                                                                        "controller"=>"Demo\Workspace\Controllers\QueuePopCriteriaController",
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "audit"=> false,
                                                                                        "viewable"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\"*\"]",
                                                                                        "description"=> null,
                                                                                        "attach_audited_by"=> 1
                            ] ,            [
                                                                            "id"=>"b1981076-db8e-4ed4-a1a0-2d33cda164cd",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Routing Rule",
                                                                                        "model"=>"Demo\Workspace\Models\QueueRoutingRule",
                                                                                        "controller"=>"Demo\Workspace\Controllers\QueueRoutingRuleController",
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "audit"=> false,
                                                                                        "viewable"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\"*\"]",
                                                                                        "description"=> null,
                                                                                        "attach_audited_by"=> 1
                            ] ,            [
                                                                            "id"=>"71f9fe3e-a9e1-4496-949c-ea9dda1487b4",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Workflow",
                                                                                        "model"=>"Demo\Workspace\Models\Workflow",
                                                                                        "controller"=>"Demo\Workspace\Controllers\WorkflowController",
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "audit"=> false,
                                                                                        "viewable"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\"*\"]",
                                                                                        "description"=> null,
                                                                                        "attach_audited_by"=> 1
                            ] ,            [
                                                                            "id"=>"e630f3f9-0603-4a58-a87e-b6fb1cb757eb",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Workflow State",
                                                                                        "model"=>"Demo\Workspace\Models\WorkflowState",
                                                                                        "controller"=>"Demo\Workspace\Controllers\WorkflowStateController",
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "audit"=> false,
                                                                                        "viewable"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\"*\"]",
                                                                                        "description"=> null,
                                                                                        "attach_audited_by"=> 1
                            ] ,            [
                                                                            "id"=>"02d0e29d-8263-4967-9f37-3010276a622b",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Workflow Transition",
                                                                                        "model"=>"Demo\Workspace\Models\WorkflowTransition",
                                                                                        "controller"=>"Demo\Workspace\Controllers\WorkflowTransitionController",
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "audit"=> false,
                                                                                        "viewable"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\"*\"]",
                                                                                        "description"=> null,
                                                                                        "attach_audited_by"=> 1
                            ] ,            [
                                                                            "id"=>"54f28a49-43ca-48c1-a864-b6fb9e1cc76a",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Webhook",
                                                                                        "model"=>"Demo\Workspace\Models\Webhook",
                                                                                        "controller"=>"Demo\Workspace\Controllers\WebhookController",
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "audit"=> false,
                                                                                        "viewable"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\"*\"]",
                                                                                        "description"=> null,
                                                                                        "attach_audited_by"=> 1
                            ] ,            [
                                                                            "id"=>"bca86a91-3f71-49e9-bf51-72b7003c9571",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2020-10-04 06:53:23",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Task",
                                                                                        "model"=>"Demo\Workspace\Models\Task",
                                                                                        "controller"=>"Demo\Workspace\Controllers\TaskController",
                                                                                        "engine_application_id"=>"8374144e-94a5-470d-8d9e-4cbad05102ad",
                                                                                        "audit"=> false,
                                                                                        "viewable"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\"*\"]",
                                                                                        "description"=> "",
                                                                                        "attach_audited_by"=> 1
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_models')->where('engine_application_id', '8374144e-94a5-470d-8d9e-4cbad05102ad')->delete();
            }
}
