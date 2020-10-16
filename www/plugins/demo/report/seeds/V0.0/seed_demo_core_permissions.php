<?php
namespace Demo\Report\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds report d */
class SeedDemoCorePermissions implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_permissions')->insert([
            [
                                                                            "id"=>"8a09a529-1512-42bd-b6c4-e57a27f17a2a",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"cf0c66c7-12c9-43df-813c-14aeafdf6ae1",
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
                                                                            "id"=>"0bf32ab8-1e24-4c0b-a6e4-e8e52373cd53",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"cf0c66c7-12c9-43df-813c-14aeafdf6ae1",
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
                                                                            "id"=>"a37361fd-a121-4587-bd77-c9c6fd623a97",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"cf0c66c7-12c9-43df-813c-14aeafdf6ae1",
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
                                                                            "id"=>"6ecec6f1-5c18-4562-ab1f-6001f84ad9d4",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"cf0c66c7-12c9-43df-813c-14aeafdf6ae1",
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
                                                                            "id"=>"a70dbd44-6388-4c3c-b350-bd5e2985703a",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"cf0c66c7-12c9-43df-813c-14aeafdf6ae1",
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
                                                                            "id"=>"b332dfde-b251-46fc-9869-c528283dc6ae",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"cf0c66c7-12c9-43df-813c-14aeafdf6ae1",
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
                                                                            "id"=>"639cde2f-d356-449a-b4df-479b5926857e",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"cf0c66c7-12c9-43df-813c-14aeafdf6ae1",
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
                                                                            "id"=>"57ced49d-6541-4d24-a332-2540ecb06466",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"cf0c66c7-12c9-43df-813c-14aeafdf6ae1",
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
                                                                            "id"=>"9f626681-b9be-439a-9b3d-451dbef42196",
                                                                                        "created_at"=>"2020-05-29 08:12:46",
                                                                                        "updated_at"=>"2020-05-29 08:12:46",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"cf0c66c7-12c9-43df-813c-14aeafdf6ae1",
                                                                                        "model"=>"Demo\Workspace\Models\ServiceChannel",
                                                                                        "operation"=>"read",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.workspace::models.servicechannel.row.read",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Service Channel read Permission",
                                                                                        "description"=>"This is the system generated permission for Service Channel read",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ] ,            [
                                                                            "id"=>"19e19159-28a0-4fa6-9c6c-d7b3881646c2",
                                                                                        "created_at"=>"2020-05-29 08:12:46",
                                                                                        "updated_at"=>"2020-05-29 08:12:46",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"cf0c66c7-12c9-43df-813c-14aeafdf6ae1",
                                                                                        "model"=>"Demo\Workspace\Models\ServiceChannel",
                                                                                        "operation"=>"write",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.workspace::models.servicechannel.row.write",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Service Channel write Permission",
                                                                                        "description"=>"This is the system generated permission for Service Channel write",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ] ,            [
                                                                            "id"=>"c91090cd-d197-4fc0-ad11-ca96eff84cd7",
                                                                                        "created_at"=>"2020-05-29 08:12:46",
                                                                                        "updated_at"=>"2020-05-29 08:12:46",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"cf0c66c7-12c9-43df-813c-14aeafdf6ae1",
                                                                                        "model"=>"Demo\Workspace\Models\ServiceChannel",
                                                                                        "operation"=>"create",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.workspace::models.servicechannel.row.create",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Service Channel create Permission",
                                                                                        "description"=>"This is the system generated permission for Service Channel create",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ] ,            [
                                                                            "id"=>"13647c7a-fb93-42b4-8e72-14abd3efcee2",
                                                                                        "created_at"=>"2020-05-29 08:12:46",
                                                                                        "updated_at"=>"2020-05-29 08:12:46",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"cf0c66c7-12c9-43df-813c-14aeafdf6ae1",
                                                                                        "model"=>"Demo\Workspace\Models\ServiceChannel",
                                                                                        "operation"=>"delete",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.workspace::models.servicechannel.row.delete",
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
                    Db::table('demo_core_permissions')->where('engine_application_id', 'cf0c66c7-12c9-43df-813c-14aeafdf6ae1')->delete();
            }
}
