<?php
namespace Demo\Report\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Report d */
class SeedDemoCorePermissions implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_permissions')->insert([
            [
                                                                            "id"=> 246,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 14,
                                                                                        "model"=>"Demo\Report\Models\Dashboard",
                                                                                        "operation"=>"delete",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.report::models.dashboard.row.delete",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Dashboard Delete Permission",
                                                                                        "description"=> null,
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ] ,            [
                                                                            "id"=> 247,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 14,
                                                                                        "model"=>"Demo\Report\Models\Dashboard",
                                                                                        "operation"=>"create",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.report::models.dashboard.row.create",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Dashboard Create Permission",
                                                                                        "description"=> null,
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ] ,            [
                                                                            "id"=> 248,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 14,
                                                                                        "model"=>"Demo\Report\Models\Widget",
                                                                                        "operation"=>"write",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.report::models.widget.row.write",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Widget Write Permission",
                                                                                        "description"=> null,
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ] ,            [
                                                                            "id"=> 241,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 14,
                                                                                        "model"=>"Demo\Report\Models\Widget",
                                                                                        "operation"=>"read",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.report::models.widget.row.read",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Widget Read Permission",
                                                                                        "description"=> null,
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ] ,            [
                                                                            "id"=> 242,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 14,
                                                                                        "model"=>"Demo\Report\Models\Dashboard",
                                                                                        "operation"=>"write",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.report::models.dashboard.row.write",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Dashboard Write Permission",
                                                                                        "description"=> null,
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ] ,            [
                                                                            "id"=> 243,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 14,
                                                                                        "model"=>"Demo\Report\Models\Dashboard",
                                                                                        "operation"=>"read",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.report::models.dashboard.row.read",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Dashboard Read Permission",
                                                                                        "description"=> null,
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ] ,            [
                                                                            "id"=> 244,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 14,
                                                                                        "model"=>"Demo\Report\Models\Widget",
                                                                                        "operation"=>"delete",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.report::models.widget.row.delete",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Widget Delete Permission",
                                                                                        "description"=> null,
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ] ,            [
                                                                            "id"=> 245,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 14,
                                                                                        "model"=>"Demo\Report\Models\Widget",
                                                                                        "operation"=>"create",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.report::models.widget.row.create",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Widget Create Permission",
                                                                                        "description"=> null,
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ] ,            [
                                                                            "id"=> 589,
                                                                                        "created_at"=>"2020-05-29 08:12:46",
                                                                                        "updated_at"=>"2020-05-29 08:12:46",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 14,
                                                                                        "model"=>"Demo\Workflow\Models\ServiceChannel",
                                                                                        "operation"=>"read",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.workflow::models.servicechannel.row.read",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Service Channel read Permission",
                                                                                        "description"=>"This is the system generated permission for Service Channel read",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ] ,            [
                                                                            "id"=> 590,
                                                                                        "created_at"=>"2020-05-29 08:12:46",
                                                                                        "updated_at"=>"2020-05-29 08:12:46",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 14,
                                                                                        "model"=>"Demo\Workflow\Models\ServiceChannel",
                                                                                        "operation"=>"write",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.workflow::models.servicechannel.row.write",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Service Channel write Permission",
                                                                                        "description"=>"This is the system generated permission for Service Channel write",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ] ,            [
                                                                            "id"=> 591,
                                                                                        "created_at"=>"2020-05-29 08:12:46",
                                                                                        "updated_at"=>"2020-05-29 08:12:46",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 14,
                                                                                        "model"=>"Demo\Workflow\Models\ServiceChannel",
                                                                                        "operation"=>"create",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.workflow::models.servicechannel.row.create",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Service Channel create Permission",
                                                                                        "description"=>"This is the system generated permission for Service Channel create",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ] ,            [
                                                                            "id"=> 592,
                                                                                        "created_at"=>"2020-05-29 08:12:46",
                                                                                        "updated_at"=>"2020-05-29 08:12:46",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 14,
                                                                                        "model"=>"Demo\Workflow\Models\ServiceChannel",
                                                                                        "operation"=>"delete",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.workflow::models.servicechannel.row.delete",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Service Channel delete Permission",
                                                                                        "description"=>"This is the system generated permission for Service Channel delete",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_permissions')->where('plugin_id', 14)->delete();
            }
}
