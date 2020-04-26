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
                                                                            "id"=> 113,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue",
                                                                                        "model"=>"Demo\Workflow\Models\Queue",
                                                                                        "controller"=>"Demo\Workflow\Controllers\QueueController",
                                                                                        "plugin_id"=> 11,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\"*\"]",
                                                                                        "description"=> null,
                                                                                        "attach_audited_by"=> 1,
                                                                                        "viewable"=> false
                            ] ,            [
                                                                            "id"=> 114,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Item",
                                                                                        "model"=>"Demo\Workflow\Models\QueueItem",
                                                                                        "controller"=>"Demo\Workflow\Controllers\QueueItemController",
                                                                                        "plugin_id"=> 11,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\"*\"]",
                                                                                        "description"=> null,
                                                                                        "attach_audited_by"=> 1,
                                                                                        "viewable"=> false
                            ] ,            [
                                                                            "id"=> 115,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Pop Criteria",
                                                                                        "model"=>"Demo\Workflow\Models\QueuePopCriteria",
                                                                                        "controller"=>"Demo\Workflow\Controllers\QueuePopCriteriaController",
                                                                                        "plugin_id"=> 11,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\"*\"]",
                                                                                        "description"=> null,
                                                                                        "attach_audited_by"=> 1,
                                                                                        "viewable"=> false
                            ] ,            [
                                                                            "id"=> 116,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Routing Rule",
                                                                                        "model"=>"Demo\Workflow\Models\QueueRoutingRule",
                                                                                        "controller"=>"Demo\Workflow\Controllers\QueueRoutingRuleController",
                                                                                        "plugin_id"=> 11,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\"*\"]",
                                                                                        "description"=> null,
                                                                                        "attach_audited_by"=> 1,
                                                                                        "viewable"=> false
                            ] ,            [
                                                                            "id"=> 117,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Workflow",
                                                                                        "model"=>"Demo\Workflow\Models\Workflow",
                                                                                        "controller"=>"Demo\Workflow\Controllers\WorkflowController",
                                                                                        "plugin_id"=> 11,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\"*\"]",
                                                                                        "description"=> null,
                                                                                        "attach_audited_by"=> 1,
                                                                                        "viewable"=> false
                            ] ,            [
                                                                            "id"=> 119,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Workflow State",
                                                                                        "model"=>"Demo\Workflow\Models\WorkflowState",
                                                                                        "controller"=>"Demo\Workflow\Controllers\WorkflowStateController",
                                                                                        "plugin_id"=> 11,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\"*\"]",
                                                                                        "description"=> null,
                                                                                        "attach_audited_by"=> 1,
                                                                                        "viewable"=> false
                            ] ,            [
                                                                            "id"=> 120,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Workflow Transition",
                                                                                        "model"=>"Demo\Workflow\Models\WorkflowTransition",
                                                                                        "controller"=>"Demo\Workflow\Controllers\WorkflowTransitionController",
                                                                                        "plugin_id"=> 11,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\"*\"]",
                                                                                        "description"=> null,
                                                                                        "attach_audited_by"=> 1,
                                                                                        "viewable"=> false
                            ] ,            [
                                                                            "id"=> 121,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Webhook",
                                                                                        "model"=>"Demo\Workflow\Models\Webhook",
                                                                                        "controller"=>"Demo\Workflow\Controllers\WebhookController",
                                                                                        "plugin_id"=> 11,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\"*\"]",
                                                                                        "description"=> null,
                                                                                        "attach_audited_by"=> 1,
                                                                                        "viewable"=> false
                            ] ,            [
                                                                            "id"=> 118,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2020-04-12 13:38:42",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Workflow Item",
                                                                                        "model"=>"Demo\Workflow\Models\WorkflowItem",
                                                                                        "controller"=>"Demo\Workflow\Controllers\WorkflowItemController",
                                                                                        "plugin_id"=> 11,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\"id\",\"created_at\",\"updated_at\",\"0\"]",
                                                                                        "description"=> "",
                                                                                        "attach_audited_by"=> 1,
                                                                                        "viewable"=> false
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_models')->where('plugin_id', 11)->delete();
            }
}
