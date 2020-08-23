<?php
namespace Demo\Workflow\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Workflow d */
class SeedDemoCoreModels implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_models')->insert([
            [
                                                                            "id"=>"655c489d-961b-458c-b233-ade97b1d2eb4",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue",
                                                                                        "model"=>"Demo\Workflow\Models\Queue",
                                                                                        "controller"=>"Demo\Workflow\Controllers\QueueController",
                                                                                        "plugin_id"=> 11,
                                                                                        "audit"=> false,
                                                                                        "viewable"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\"*\"]",
                                                                                        "description"=> null,
                                                                                        "attach_audited_by"=> 1
                            ] ,            [
                                                                            "id"=>"bca86a91-3f71-49e9-bf51-72b7003c9571",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Item",
                                                                                        "model"=>"Demo\Workflow\Models\QueueItem",
                                                                                        "controller"=>"Demo\Workflow\Controllers\QueueItemController",
                                                                                        "plugin_id"=> 11,
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
                                                                                        "model"=>"Demo\Workflow\Models\QueuePopCriteria",
                                                                                        "controller"=>"Demo\Workflow\Controllers\QueuePopCriteriaController",
                                                                                        "plugin_id"=> 11,
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
                                                                                        "model"=>"Demo\Workflow\Models\QueueRoutingRule",
                                                                                        "controller"=>"Demo\Workflow\Controllers\QueueRoutingRuleController",
                                                                                        "plugin_id"=> 11,
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
                                                                                        "model"=>"Demo\Workflow\Models\Workflow",
                                                                                        "controller"=>"Demo\Workflow\Controllers\WorkflowController",
                                                                                        "plugin_id"=> 11,
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
                                                                                        "model"=>"Demo\Workflow\Models\WorkflowState",
                                                                                        "controller"=>"Demo\Workflow\Controllers\WorkflowStateController",
                                                                                        "plugin_id"=> 11,
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
                                                                                        "model"=>"Demo\Workflow\Models\WorkflowTransition",
                                                                                        "controller"=>"Demo\Workflow\Controllers\WorkflowTransitionController",
                                                                                        "plugin_id"=> 11,
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
                                                                                        "model"=>"Demo\Workflow\Models\Webhook",
                                                                                        "controller"=>"Demo\Workflow\Controllers\WebhookController",
                                                                                        "plugin_id"=> 11,
                                                                                        "audit"=> false,
                                                                                        "viewable"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\"*\"]",
                                                                                        "description"=> null,
                                                                                        "attach_audited_by"=> 1
                            ] ,            [
                                                                            "id"=>"cf9c3c76-767e-4081-9149-3769465c0fc7",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2020-04-12 13:38:42",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Workflow Item",
                                                                                        "model"=>"Demo\Workflow\Models\WorkflowItem",
                                                                                        "controller"=>"Demo\Workflow\Controllers\WorkflowItemController",
                                                                                        "plugin_id"=> 11,
                                                                                        "audit"=> false,
                                                                                        "viewable"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\"id\",\"created_at\",\"updated_at\",\"0\"]",
                                                                                        "description"=> "",
                                                                                        "attach_audited_by"=> 1
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_models')->where('plugin_id', 11)->delete();
            }
}
