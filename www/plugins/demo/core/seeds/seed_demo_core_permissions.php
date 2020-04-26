<?php
namespace Demo\Core\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Core d */
class SeedDemoCorePermissions implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_permissions')->insert([
            [
                                                                            "id"=> 500,
                                                                                        "created_at"=>"2020-04-26 07:09:39",
                                                                                        "updated_at"=>"2020-04-26 07:09:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 2,
                                                                                        "model"=>"Demo\Core\Models\ListAction",
                                                                                        "operation"=>"read",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.core::models.listaction.row.read",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"List Action read Permission",
                                                                                        "description"=>"This is the system generated permission for List Action read",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ] ,            [
                                                                            "id"=> 501,
                                                                                        "created_at"=>"2020-04-26 07:09:40",
                                                                                        "updated_at"=>"2020-04-26 07:09:40",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 2,
                                                                                        "model"=>"Demo\Core\Models\ListAction",
                                                                                        "operation"=>"write",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.core::models.listaction.row.write",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"List Action write Permission",
                                                                                        "description"=>"This is the system generated permission for List Action write",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ] ,            [
                                                                            "id"=> 502,
                                                                                        "created_at"=>"2020-04-26 07:09:40",
                                                                                        "updated_at"=>"2020-04-26 07:09:40",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 2,
                                                                                        "model"=>"Demo\Core\Models\ListAction",
                                                                                        "operation"=>"create",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.core::models.listaction.row.create",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"List Action create Permission",
                                                                                        "description"=>"This is the system generated permission for List Action create",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ] ,            [
                                                                            "id"=> 503,
                                                                                        "created_at"=>"2020-04-26 07:09:40",
                                                                                        "updated_at"=>"2020-04-26 07:09:40",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 2,
                                                                                        "model"=>"Demo\Core\Models\ListAction",
                                                                                        "operation"=>"delete",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.core::models.listaction.row.delete",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"List Action delete Permission",
                                                                                        "description"=>"This is the system generated permission for List Action delete",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ] ,            [
                                                                            "id"=> 504,
                                                                                        "created_at"=>"2020-04-26 07:09:40",
                                                                                        "updated_at"=>"2020-04-26 07:09:40",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 2,
                                                                                        "model"=>"Demo\Core\Models\ListAction",
                                                                                        "operation"=>"view",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.core::models.listaction.row.view",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"List Action view Permission",
                                                                                        "description"=>"This is the system generated permission for List Action view",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ] ,            [
                                                                            "id"=> 520,
                                                                                        "created_at"=>"2020-04-26 07:16:15",
                                                                                        "updated_at"=>"2020-04-26 07:16:15",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 2,
                                                                                        "model"=>"Demo\Core\Models\FormAction",
                                                                                        "operation"=>"read",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.core::models.formaction.row.read",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Form Action read Permission",
                                                                                        "description"=>"This is the system generated permission for Form Action read",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ] ,            [
                                                                            "id"=> 521,
                                                                                        "created_at"=>"2020-04-26 07:16:15",
                                                                                        "updated_at"=>"2020-04-26 07:16:15",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 2,
                                                                                        "model"=>"Demo\Core\Models\FormAction",
                                                                                        "operation"=>"write",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.core::models.formaction.row.write",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Form Action write Permission",
                                                                                        "description"=>"This is the system generated permission for Form Action write",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ] ,            [
                                                                            "id"=> 522,
                                                                                        "created_at"=>"2020-04-26 07:16:16",
                                                                                        "updated_at"=>"2020-04-26 07:16:16",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 2,
                                                                                        "model"=>"Demo\Core\Models\FormAction",
                                                                                        "operation"=>"create",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.core::models.formaction.row.create",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Form Action create Permission",
                                                                                        "description"=>"This is the system generated permission for Form Action create",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ] ,            [
                                                                            "id"=> 523,
                                                                                        "created_at"=>"2020-04-26 07:16:16",
                                                                                        "updated_at"=>"2020-04-26 07:16:16",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 2,
                                                                                        "model"=>"Demo\Core\Models\FormAction",
                                                                                        "operation"=>"delete",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.core::models.formaction.row.delete",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Form Action delete Permission",
                                                                                        "description"=>"This is the system generated permission for Form Action delete",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ] ,            [
                                                                            "id"=> 524,
                                                                                        "created_at"=>"2020-04-26 07:16:16",
                                                                                        "updated_at"=>"2020-04-26 07:16:16",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 2,
                                                                                        "model"=>"Demo\Core\Models\FormAction",
                                                                                        "operation"=>"view",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.core::models.formaction.row.view",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Form Action view Permission",
                                                                                        "description"=>"This is the system generated permission for Form Action view",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_permissions')->where('plugin_id', 2)->delete();
            }
}
