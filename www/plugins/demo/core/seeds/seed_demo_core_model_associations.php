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
                                                                            "id"=>"0f599b35-bf20-467f-88b3-9c5763f44718",
                                                                                        "created_at"=>"2019-12-21 11:25:39",
                                                                                        "updated_at"=>"2019-12-21 11:25:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "source_model"=>"Demo\Core\Models\ModelAssociation",
                                                                                        "target_model"=>"Demo\Core\Models\Model",
                                                                                        "foreign_key"=>"source_model",
                                                                                        "cascade"=>"delete",
                                                                                        "relation"=>"belongs_to",
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "cascade_priority_order"=> 0,
                                                                                        "description"=> "",
                                                                                        "name"=>"Model Association Belongs To a Source Model",
                                                                                        "active"=> 1
                            ] ,            [
                                                                            "id"=>"b92dcd89-917e-4f8a-88ba-b2597b646aa6",
                                                                                        "created_at"=>"2019-12-21 11:25:39",
                                                                                        "updated_at"=>"2019-12-21 11:25:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "source_model"=>"Demo\Core\Models\ModelAssociation",
                                                                                        "target_model"=>"Demo\Core\Models\Model",
                                                                                        "foreign_key"=>"target_model",
                                                                                        "cascade"=>"delete",
                                                                                        "relation"=>"belongs_to",
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "cascade_priority_order"=> 0,
                                                                                        "description"=> "",
                                                                                        "name"=>"Model Association Belongs To a Target Model",
                                                                                        "active"=> 1
                            ] ,            [
                                                                            "id"=>"01c4e11e-79f9-4ae7-84e0-58494d64d8f2",
                                                                                        "created_at"=>"2019-12-21 11:25:39",
                                                                                        "updated_at"=>"2019-12-21 11:25:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "source_model"=>"Demo\Core\Models\EventHandler",
                                                                                        "target_model"=>"Demo\Core\Models\Model",
                                                                                        "foreign_key"=>"model",
                                                                                        "cascade"=>"delete",
                                                                                        "relation"=>"belongs_to",
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "cascade_priority_order"=> 0,
                                                                                        "description"=> "",
                                                                                        "name"=>"Event Handler Belongs To a Model",
                                                                                        "active"=> 1
                            ] ,            [
                                                                            "id"=>"2e122d1a-56ec-4d37-a9d7-be70f398ae37",
                                                                                        "created_at"=>"2019-12-21 11:25:39",
                                                                                        "updated_at"=>"2019-12-21 11:25:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "source_model"=>"Demo\Core\Models\CustomField",
                                                                                        "target_model"=>"Demo\Core\Models\Model",
                                                                                        "foreign_key"=>"model",
                                                                                        "cascade"=>"delete",
                                                                                        "relation"=>"belongs_to",
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "cascade_priority_order"=> 0,
                                                                                        "description"=> "",
                                                                                        "name"=>"Custom Field Belongs To a Model",
                                                                                        "active"=> 1
                            ] ,            [
                                                                            "id"=>"32640c85-73af-4bd0-aa55-a6060e17eb75",
                                                                                        "created_at"=>"2019-12-21 11:25:39",
                                                                                        "updated_at"=>"2019-12-21 11:25:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "source_model"=>"Demo\Core\Models\FormField",
                                                                                        "target_model"=>"Demo\Core\Models\CustomField",
                                                                                        "foreign_key"=>"field_id",
                                                                                        "cascade"=>"delete",
                                                                                        "relation"=>"belongs_to",
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "cascade_priority_order"=> 0,
                                                                                        "description"=> "",
                                                                                        "name"=>"Custom Field Belongs To a Model",
                                                                                        "active"=> 1
                            ] ,            [
                                                                            "id"=>"890bac68-7ecb-48ed-b6eb-cde839128c33",
                                                                                        "created_at"=>"2019-12-21 11:25:39",
                                                                                        "updated_at"=>"2019-12-21 11:25:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "source_model"=>"Demo\Core\Models\RolePolicyAssociation",
                                                                                        "target_model"=>"Demo\Core\Models\Role",
                                                                                        "foreign_key"=>"role_id",
                                                                                        "cascade"=>"delete",
                                                                                        "relation"=>"belongs_to",
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "cascade_priority_order"=> 0,
                                                                                        "description"=> "",
                                                                                        "name"=>"RolePolicyAssociation Belongs To a Role",
                                                                                        "active"=> 1
                            ] ,            [
                                                                            "id"=>"00d8602e-ba75-4906-b72f-2f2d3c226eca",
                                                                                        "created_at"=>"2019-12-21 11:25:39",
                                                                                        "updated_at"=>"2019-12-21 11:25:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "source_model"=>"Demo\Core\Models\RolePolicyAssociation",
                                                                                        "target_model"=>"Demo\Core\Models\SecurityPolicy",
                                                                                        "foreign_key"=>"policy_id",
                                                                                        "cascade"=>"delete",
                                                                                        "relation"=>"belongs_to",
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "cascade_priority_order"=> 0,
                                                                                        "description"=> "",
                                                                                        "name"=>"RolePolicyAssociation Belongs To a SecurityPolicy",
                                                                                        "active"=> 1
                            ] ,            [
                                                                            "id"=>"a1ef539b-dbcd-4ce7-9826-9baf88edf79c",
                                                                                        "created_at"=>"2019-12-21 11:25:39",
                                                                                        "updated_at"=>"2019-12-21 11:25:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "source_model"=>"Demo\Core\Models\PermissionPolicyAssociation",
                                                                                        "target_model"=>"Demo\Core\Models\Permission",
                                                                                        "foreign_key"=>"permission_id",
                                                                                        "cascade"=>"delete",
                                                                                        "relation"=>"belongs_to",
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "cascade_priority_order"=> 0,
                                                                                        "description"=> "",
                                                                                        "name"=>"PermissionPolicyAssociation Belongs To a Permission",
                                                                                        "active"=> 1
                            ] ,            [
                                                                            "id"=>"24c4fea3-4bb3-4b2d-867f-4e5fabf83392",
                                                                                        "created_at"=>"2019-12-21 11:25:39",
                                                                                        "updated_at"=>"2019-12-21 11:25:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "source_model"=>"Demo\Core\Models\PermissionPolicyAssociation",
                                                                                        "target_model"=>"Demo\Core\Models\SecurityPolicy",
                                                                                        "foreign_key"=>"policy_id",
                                                                                        "cascade"=>"delete",
                                                                                        "relation"=>"belongs_to",
                                                                                        "plugin_id"=> "dc81b635-1d0a-4f3e-83af-13642d56abe4",
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
