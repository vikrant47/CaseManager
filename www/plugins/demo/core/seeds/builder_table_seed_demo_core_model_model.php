<?php

namespace Demo\Core\Seeds;

use Demo\Core\Models\ModelModel;
use Schema;
use Seeder;
use Db;
use Demo\Core\Classes\Ifs\Seedable;

class BuilderTableSeedDemoCoreModelModel implements Seedable
{
    public function install()
    {
        Db::table('demo_core_models')->insert([
            [
                "id" => 1,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Models Model",
                "model_type" => "Demo\Core\Models\Model",
                "plugin_id" => 10,
                "audit" => false,
                "record_history" => false,
                "audit_columns" => '[" * "]',
                "attach_audited_by" => true,
                "description" => null
            ],
            [
                "id" => 2,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Custom Field",
                "model_type" => "Demo\Core\Models\CustomField",
                "plugin_id" => 10,
                "audit" => false,
                "record_history" => false,
                "audit_columns" => '[" * "]',
                "attach_audited_by" => true,
                "description" => null
            ],
            [
                "id" => 3,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Form Field",
                "model_type" => "Demo\Core\Models\FormField",
                "plugin_id" => 10,
                "audit" => false,
                "record_history" => false,
                "audit_columns" => '[" * "]',
                "attach_audited_by" => true,
                "description" => null
            ],
            [
                "id" => 4,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Event Handler",
                "model_type" => "Demo\Core\Models\EventHandler",
                "plugin_id" => 10,
                "audit" => false,
                "record_history" => false,
                "audit_columns" => '[" * "]',
                "attach_audited_by" => true,
                "description" => null
            ],
            [
                "id" => 5,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Inbound Api",
                "model_type" => "Demo\Core\Models\InboundApi",
                "plugin_id" => 10,
                "audit" => false,
                "record_history" => false,
                "audit_columns" => '[" * "]',
                "attach_audited_by" => true,
                "description" => null
            ],
            [
                "id" => 6,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Command",
                "model_type" => "Demo\Core\Models\Command",
                "plugin_id" => 10,
                "audit" => false,
                "record_history" => false,
                "audit_columns" => '[" * "]',
                "attach_audited_by" => true,
                "description" => null
            ],
            [
                "id" => 7,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Iframe",
                "model_type" => "Demo\Core\Models\Iframe",
                "plugin_id" => 10,
                "audit" => false,
                "record_history" => false,
                "audit_columns" => '[" * "]',
                "attach_audited_by" => true,
                "description" => null
            ],
            [
                "id" => 8,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Javascript Library",
                "model_type" => "Demo\Core\Models\JavascriptLibrary",
                "plugin_id" => 10,
                "audit" => false,
                "record_history" => false,
                "audit_columns" => '[" * "]',
                "attach_audited_by" => true,
                "description" => null
            ],
            [
                "id" => 9,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Webhook",
                "model_type" => "Demo\Core\Models\Webhook",
                "plugin_id" => 10,
                "audit" => false,
                "record_history" => false,
                "audit_columns" => '[" * "]',
                "attach_audited_by" => true,
                "description" => null
            ],
            [
                "id" => 10,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Model Association",
                "model_type" => "Demo\Core\Models\ModelAssociation",
                "plugin_id" => 10,
                "audit" => false,
                "record_history" => false,
                "audit_columns" => '[" * "]',
                "attach_audited_by" => true,
                "description" => null
            ],
            [
                "id" => 11,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Role",
                "model_type" => "Demo\Core\Models\Role",
                "plugin_id" => 10,
                "audit" => false,
                "record_history" => false,
                "audit_columns" => '[" * "]',
                "attach_audited_by" => true,
                "description" => null
            ],
            [
                "id" => 12,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Permission",
                "model_type" => "Demo\Core\Models\Permission",
                "plugin_id" => 10,
                "audit" => false,
                "record_history" => false,
                "audit_columns" => '[" * "]',
                "attach_audited_by" => true,
                "description" => null
            ],
            [
                "id" => 13,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Security Policy",
                "model_type" => "Demo\Core\Models\SecurityPolicy",
                "plugin_id" => 10,
                "audit" => false,
                "record_history" => false,
                "audit_columns" => '[" * "]',
                "attach_audited_by" => true,
                "description" => null
            ],
            [
                "id" => 14,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Security Policy Association",
                "model_type" => "Demo\Core\Models\PermissionPolicyAssociation",
                "plugin_id" => 10,
                "audit" => false,
                "record_history" => false,
                "audit_columns" => '[" * "]',
                "attach_audited_by" => true,
                "description" => null
            ],
            [
                "id" => 15,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Role Policy Association",
                "model_type" => "Demo\Core\Models\RolePolicyAssociation",
                "plugin_id" => 10,
                "audit" => false,
                "record_history" => false,
                "audit_columns" => '[" * "]',
                "attach_audited_by" => true,
                "description" => null
            ],
            [
                "id" => 16,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "User",
                "model_type" => "Demo\Core\Models\CoreUser",
                "plugin_id" => 10,
                "audit" => false,
                "record_history" => false,
                "audit_columns" => '[" * "]',
                "attach_audited_by" => true,
                "description" => null
            ],
            [
                "id" => 17,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "User",
                "model_type" => "Demo\Core\Models\CoreUserGroup",
                "plugin_id" => 10,
                "audit" => false,
                "record_history" => false,
                "audit_columns" => '[" * "]',
                "attach_audited_by" => true,
                "description" => null
            ],
            [
                "id" => 18,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Notification Channel",
                "model_type" => "Demo\Notification\Models\NotificationChannel",
                "plugin_id" => 10,
                "audit" => false,
                "record_history" => false,
                "audit_columns" => '[" * "]',
                "attach_audited_by" => true,
                "description" => null
            ],
            [
                "id" => 19,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Notification",
                "model_type" => "Demo\Notification\Models\Notification",
                "plugin_id" => 10,
                "audit" => false,
                "record_history" => false,
                "audit_columns" => '[" * "]',
                "attach_audited_by" => true,
                "description" => null
            ],
            [
                "id" => 20,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Notification Subscriber",
                "model_type" => "Demo\Notification\Models\NotificationSubscriber",
                "plugin_id" => 10,
                "audit" => false,
                "record_history" => false,
                "audit_columns" => '[" * "]',
                "attach_audited_by" => true,
                "description" => null
            ]
        ]);
    }

    public function uninstall()
    {
        Db::table('demo_core_models')->where('plugin_id', 10)->delete();
    }
}
