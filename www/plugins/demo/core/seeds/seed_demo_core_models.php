<?php
namespace Demo\Core\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Core d */
class SeedDemoCoreModels implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_models')->insert([
            [
                                                                            "id"=> 85,
                                                                                        "created_at"=>"2020-04-12 15:19:04",
                                                                                        "updated_at"=>"2020-04-12 15:28:59",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Form Action",
                                                                                        "model"=>"Demo\Core\Models\FormAction",
                                                                                        "plugin_id"=> 10,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\"0\"]",
                                                                                        "attach_audited_by"=> 1,
                                                                                        "description"=> ""
                            ] ,            [
                                                                            "id"=> 1,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Models Model",
                                                                                        "model"=>"Demo\Core\Models\Model",
                                                                                        "plugin_id"=> 10,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\" * \"]",
                                                                                        "attach_audited_by"=> 1,
                                                                                        "description"=> null
                            ] ,            [
                                                                            "id"=> 2,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Custom Field",
                                                                                        "model"=>"Demo\Core\Models\CustomField",
                                                                                        "plugin_id"=> 10,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\" * \"]",
                                                                                        "attach_audited_by"=> 1,
                                                                                        "description"=> null
                            ] ,            [
                                                                            "id"=> 3,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Form Field",
                                                                                        "model"=>"Demo\Core\Models\FormField",
                                                                                        "plugin_id"=> 10,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\" * \"]",
                                                                                        "attach_audited_by"=> 1,
                                                                                        "description"=> null
                            ] ,            [
                                                                            "id"=> 4,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Event Handler",
                                                                                        "model"=>"Demo\Core\Models\EventHandler",
                                                                                        "plugin_id"=> 10,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\" * \"]",
                                                                                        "attach_audited_by"=> 1,
                                                                                        "description"=> null
                            ] ,            [
                                                                            "id"=> 5,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Inbound Api",
                                                                                        "model"=>"Demo\Core\Models\InboundApi",
                                                                                        "plugin_id"=> 10,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\" * \"]",
                                                                                        "attach_audited_by"=> 1,
                                                                                        "description"=> null
                            ] ,            [
                                                                            "id"=> 6,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Command",
                                                                                        "model"=>"Demo\Core\Models\Command",
                                                                                        "plugin_id"=> 10,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\" * \"]",
                                                                                        "attach_audited_by"=> 1,
                                                                                        "description"=> null
                            ] ,            [
                                                                            "id"=> 7,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Iframe",
                                                                                        "model"=>"Demo\Core\Models\Iframe",
                                                                                        "plugin_id"=> 10,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\" * \"]",
                                                                                        "attach_audited_by"=> 1,
                                                                                        "description"=> null
                            ] ,            [
                                                                            "id"=> 8,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Javascript Library",
                                                                                        "model"=>"Demo\Core\Models\JavascriptLibrary",
                                                                                        "plugin_id"=> 10,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\" * \"]",
                                                                                        "attach_audited_by"=> 1,
                                                                                        "description"=> null
                            ] ,            [
                                                                            "id"=> 9,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Webhook",
                                                                                        "model"=>"Demo\Core\Models\Webhook",
                                                                                        "plugin_id"=> 10,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\" * \"]",
                                                                                        "attach_audited_by"=> 1,
                                                                                        "description"=> null
                            ] ,            [
                                                                            "id"=> 10,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Model Association",
                                                                                        "model"=>"Demo\Core\Models\ModelAssociation",
                                                                                        "plugin_id"=> 10,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\" * \"]",
                                                                                        "attach_audited_by"=> 1,
                                                                                        "description"=> null
                            ] ,            [
                                                                            "id"=> 11,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Role",
                                                                                        "model"=>"Demo\Core\Models\Role",
                                                                                        "plugin_id"=> 10,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\" * \"]",
                                                                                        "attach_audited_by"=> 1,
                                                                                        "description"=> null
                            ] ,            [
                                                                            "id"=> 12,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Permission",
                                                                                        "model"=>"Demo\Core\Models\Permission",
                                                                                        "plugin_id"=> 10,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\" * \"]",
                                                                                        "attach_audited_by"=> 1,
                                                                                        "description"=> null
                            ] ,            [
                                                                            "id"=> 13,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Security Policy",
                                                                                        "model"=>"Demo\Core\Models\SecurityPolicy",
                                                                                        "plugin_id"=> 10,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\" * \"]",
                                                                                        "attach_audited_by"=> 1,
                                                                                        "description"=> null
                            ] ,            [
                                                                            "id"=> 14,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Security Policy Association",
                                                                                        "model"=>"Demo\Core\Models\PermissionPolicyAssociation",
                                                                                        "plugin_id"=> 10,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\" * \"]",
                                                                                        "attach_audited_by"=> 1,
                                                                                        "description"=> null
                            ] ,            [
                                                                            "id"=> 15,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Role Policy Association",
                                                                                        "model"=>"Demo\Core\Models\RolePolicyAssociation",
                                                                                        "plugin_id"=> 10,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\" * \"]",
                                                                                        "attach_audited_by"=> 1,
                                                                                        "description"=> null
                            ] ,            [
                                                                            "id"=> 16,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"User",
                                                                                        "model"=>"Demo\Core\Models\CoreUser",
                                                                                        "plugin_id"=> 10,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\" * \"]",
                                                                                        "attach_audited_by"=> 1,
                                                                                        "description"=> null
                            ] ,            [
                                                                            "id"=> 17,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"User",
                                                                                        "model"=>"Demo\Core\Models\CoreUserGroup",
                                                                                        "plugin_id"=> 10,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\" * \"]",
                                                                                        "attach_audited_by"=> 1,
                                                                                        "description"=> null
                            ] ,            [
                                                                            "id"=> 18,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Notification Channel",
                                                                                        "model"=>"Demo\Notification\Models\NotificationChannel",
                                                                                        "plugin_id"=> 10,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\" * \"]",
                                                                                        "attach_audited_by"=> 1,
                                                                                        "description"=> null
                            ] ,            [
                                                                            "id"=> 19,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Notification",
                                                                                        "model"=>"Demo\Notification\Models\Notification",
                                                                                        "plugin_id"=> 10,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\" * \"]",
                                                                                        "attach_audited_by"=> 1,
                                                                                        "description"=> null
                            ] ,            [
                                                                            "id"=> 20,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Notification Subscriber",
                                                                                        "model"=>"Demo\Notification\Models\NotificationSubscriber",
                                                                                        "plugin_id"=> 10,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\" * \"]",
                                                                                        "attach_audited_by"=> 1,
                                                                                        "description"=> null
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_models')->where('plugin_id', 10)->delete();
            }
}
