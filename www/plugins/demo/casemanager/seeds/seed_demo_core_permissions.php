<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Casemanager d */
class SeedDemoCorePermissions implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_permissions')->insert([
            [
                                                                            "id"=> 81,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"read",
                                                                                        "columns"=> "",
                                                                                        "condition"=> "",
                                                                                        "code"=>"demo.casemanager::models.casemodel.row.read",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Case Model Read Permission",
                                                                                        "description"=> "",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ] ,            [
                                                                            "id"=> 82,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Casemanager\Models\CasePriority",
                                                                                        "operation"=>"read",
                                                                                        "columns"=> "",
                                                                                        "condition"=> "",
                                                                                        "code"=>"demo.casemanager::models.casepriority.row.read",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Case Priority Read Permission",
                                                                                        "description"=> "",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ] ,            [
                                                                            "id"=> 83,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"write",
                                                                                        "columns"=> "",
                                                                                        "condition"=> "",
                                                                                        "code"=>"demo.casemanager::models.casemodel.row.write",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Case Model Write Permission",
                                                                                        "description"=> "",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ] ,            [
                                                                            "id"=> 84,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Casemanager\Models\CasePriority",
                                                                                        "operation"=>"write",
                                                                                        "columns"=> "",
                                                                                        "condition"=> "",
                                                                                        "code"=>"demo.casemanager::models.casepriority.row.write",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Case Priority Write Permission",
                                                                                        "description"=> "",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ] ,            [
                                                                            "id"=> 85,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"create",
                                                                                        "columns"=> "",
                                                                                        "condition"=> "",
                                                                                        "code"=>"demo.casemanager::models.casemodel.row.create",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Case Model Create Permission",
                                                                                        "description"=> "",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ] ,            [
                                                                            "id"=> 86,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Casemanager\Models\CasePriority",
                                                                                        "operation"=>"create",
                                                                                        "columns"=> "",
                                                                                        "condition"=> "",
                                                                                        "code"=>"demo.casemanager::models.casepriority.row.create",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Case Priority Create Permission",
                                                                                        "description"=> "",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ] ,            [
                                                                            "id"=> 87,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"delete",
                                                                                        "columns"=> "",
                                                                                        "condition"=> "",
                                                                                        "code"=>"demo.casemanager::models.casemodel.row.delete",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Case Model Delete Permission",
                                                                                        "description"=> "",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ] ,            [
                                                                            "id"=> 88,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Casemanager\Models\CasePriority",
                                                                                        "operation"=>"delete",
                                                                                        "columns"=> "",
                                                                                        "condition"=> "",
                                                                                        "code"=>"demo.casemanager::models.casepriority.row.delete",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Case Priority Delete Permission",
                                                                                        "description"=> "",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_permissions')->where('plugin_id', 6)->delete();
            }
}
