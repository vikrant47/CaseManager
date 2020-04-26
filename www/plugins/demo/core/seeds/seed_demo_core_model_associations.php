<?php
namespace Demo\Core\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Core d */
class SeedDemoCoreModelAssociations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_model_associations')->insert([
            [
                                                                            "id"=> 1,
                                                                                        "created_at"=>"2019-12-21 11:25:39",
                                                                                        "updated_at"=>"2019-12-21 11:25:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "source_model"=>"Demo\Core\Models\ModelAssociation",
                                                                                        "target_model"=>"Demo\Core\Models\Model",
                                                                                        "foreign_key"=>"source_model",
                                                                                        "cascade"=>"delete",
                                                                                        "relation"=>"belongs_to",
                                                                                        "plugin_id"=> 10,
                                                                                        "cascade_priority_order"=> 0,
                                                                                        "description"=> "",
                                                                                        "name"=>"Model Association Belongs To a Source Model",
                                                                                        "active"=> 1
                            ] ,            [
                                                                            "id"=> 2,
                                                                                        "created_at"=>"2019-12-21 11:25:39",
                                                                                        "updated_at"=>"2019-12-21 11:25:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "source_model"=>"Demo\Core\Models\ModelAssociation",
                                                                                        "target_model"=>"Demo\Core\Models\Model",
                                                                                        "foreign_key"=>"target_model",
                                                                                        "cascade"=>"delete",
                                                                                        "relation"=>"belongs_to",
                                                                                        "plugin_id"=> 10,
                                                                                        "cascade_priority_order"=> 0,
                                                                                        "description"=> "",
                                                                                        "name"=>"Model Association Belongs To a Target Model",
                                                                                        "active"=> 1
                            ] ,            [
                                                                            "id"=> 3,
                                                                                        "created_at"=>"2019-12-21 11:25:39",
                                                                                        "updated_at"=>"2019-12-21 11:25:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "source_model"=>"Demo\Core\Models\EventHandler",
                                                                                        "target_model"=>"Demo\Core\Models\Model",
                                                                                        "foreign_key"=>"model",
                                                                                        "cascade"=>"delete",
                                                                                        "relation"=>"belongs_to",
                                                                                        "plugin_id"=> 10,
                                                                                        "cascade_priority_order"=> 0,
                                                                                        "description"=> "",
                                                                                        "name"=>"Event Handler Belongs To a Model",
                                                                                        "active"=> 1
                            ] ,            [
                                                                            "id"=> 4,
                                                                                        "created_at"=>"2019-12-21 11:25:39",
                                                                                        "updated_at"=>"2019-12-21 11:25:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "source_model"=>"Demo\Core\Models\CustomField",
                                                                                        "target_model"=>"Demo\Core\Models\Model",
                                                                                        "foreign_key"=>"model",
                                                                                        "cascade"=>"delete",
                                                                                        "relation"=>"belongs_to",
                                                                                        "plugin_id"=> 10,
                                                                                        "cascade_priority_order"=> 0,
                                                                                        "description"=> "",
                                                                                        "name"=>"Custom Field Belongs To a Model",
                                                                                        "active"=> 1
                            ] ,            [
                                                                            "id"=> 5,
                                                                                        "created_at"=>"2019-12-21 11:25:39",
                                                                                        "updated_at"=>"2019-12-21 11:25:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "source_model"=>"Demo\Core\Models\FormField",
                                                                                        "target_model"=>"Demo\Core\Models\CustomField",
                                                                                        "foreign_key"=>"field_id",
                                                                                        "cascade"=>"delete",
                                                                                        "relation"=>"belongs_to",
                                                                                        "plugin_id"=> 10,
                                                                                        "cascade_priority_order"=> 0,
                                                                                        "description"=> "",
                                                                                        "name"=>"Custom Field Belongs To a Model",
                                                                                        "active"=> 1
                            ] ,            [
                                                                            "id"=> 6,
                                                                                        "created_at"=>"2019-12-21 11:25:39",
                                                                                        "updated_at"=>"2019-12-21 11:25:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "source_model"=>"Demo\Core\Models\RolePolicyAssociation",
                                                                                        "target_model"=>"Demo\Core\Models\Role",
                                                                                        "foreign_key"=>"role_id",
                                                                                        "cascade"=>"delete",
                                                                                        "relation"=>"belongs_to",
                                                                                        "plugin_id"=> 10,
                                                                                        "cascade_priority_order"=> 0,
                                                                                        "description"=> "",
                                                                                        "name"=>"RolePolicyAssociation Belongs To a Role",
                                                                                        "active"=> 1
                            ] ,            [
                                                                            "id"=> 7,
                                                                                        "created_at"=>"2019-12-21 11:25:39",
                                                                                        "updated_at"=>"2019-12-21 11:25:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "source_model"=>"Demo\Core\Models\RolePolicyAssociation",
                                                                                        "target_model"=>"Demo\Core\Models\SecurityPolicy",
                                                                                        "foreign_key"=>"policy_id",
                                                                                        "cascade"=>"delete",
                                                                                        "relation"=>"belongs_to",
                                                                                        "plugin_id"=> 10,
                                                                                        "cascade_priority_order"=> 0,
                                                                                        "description"=> "",
                                                                                        "name"=>"RolePolicyAssociation Belongs To a SecurityPolicy",
                                                                                        "active"=> 1
                            ] ,            [
                                                                            "id"=> 8,
                                                                                        "created_at"=>"2019-12-21 11:25:39",
                                                                                        "updated_at"=>"2019-12-21 11:25:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "source_model"=>"Demo\Core\Models\PermissionPolicyAssociation",
                                                                                        "target_model"=>"Demo\Core\Models\Permission",
                                                                                        "foreign_key"=>"permission_id",
                                                                                        "cascade"=>"delete",
                                                                                        "relation"=>"belongs_to",
                                                                                        "plugin_id"=> 10,
                                                                                        "cascade_priority_order"=> 0,
                                                                                        "description"=> "",
                                                                                        "name"=>"PermissionPolicyAssociation Belongs To a Permission",
                                                                                        "active"=> 1
                            ] ,            [
                                                                            "id"=> 9,
                                                                                        "created_at"=>"2019-12-21 11:25:39",
                                                                                        "updated_at"=>"2019-12-21 11:25:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "source_model"=>"Demo\Core\Models\PermissionPolicyAssociation",
                                                                                        "target_model"=>"Demo\Core\Models\SecurityPolicy",
                                                                                        "foreign_key"=>"policy_id",
                                                                                        "cascade"=>"delete",
                                                                                        "relation"=>"belongs_to",
                                                                                        "plugin_id"=> 10,
                                                                                        "cascade_priority_order"=> 0,
                                                                                        "description"=> "",
                                                                                        "name"=>"PermissionPolicyAssociation Belongs To a SecurityPolicy",
                                                                                        "active"=> 1
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_model_associations')->where('plugin_id', 10)->delete();
            }
}
