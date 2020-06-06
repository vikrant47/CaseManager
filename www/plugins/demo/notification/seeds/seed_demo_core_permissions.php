<?php
namespace Demo\Notification\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Notification d */
class SeedDemoCorePermissions implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_permissions')->insert([
            [
                                                                            "created_at"=>"2020-05-17 05:47:52",
                                                                                        "updated_at"=>"2020-05-17 05:47:52",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 3,
                                                                                        "model"=>"Demo\Notification\Models\MailLayout",
                                                                                        "operation"=>"read",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.notification::models.maillayout.row.read",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Mail Layouts read Permission",
                                                                                        "description"=>"This is the system generated permission for Mail Layouts read",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1,
                                                                                        "id"=>"36f5d231-9449-4b4a-acf0-cac67b0f440a"
                            ] ,            [
                                                                            "created_at"=>"2020-05-17 05:47:53",
                                                                                        "updated_at"=>"2020-05-17 05:47:53",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 3,
                                                                                        "model"=>"Demo\Notification\Models\MailLayout",
                                                                                        "operation"=>"write",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.notification::models.maillayout.row.write",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Mail Layouts write Permission",
                                                                                        "description"=>"This is the system generated permission for Mail Layouts write",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1,
                                                                                        "id"=>"844b8eb0-86f0-48b8-a8ca-f2aecf138f28"
                            ] ,            [
                                                                            "created_at"=>"2020-05-17 05:47:53",
                                                                                        "updated_at"=>"2020-05-17 05:47:53",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 3,
                                                                                        "model"=>"Demo\Notification\Models\MailLayout",
                                                                                        "operation"=>"create",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.notification::models.maillayout.row.create",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Mail Layouts create Permission",
                                                                                        "description"=>"This is the system generated permission for Mail Layouts create",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1,
                                                                                        "id"=>"4537497b-b519-44d4-9f2a-bb37e102ad31"
                            ] ,            [
                                                                            "created_at"=>"2020-05-17 05:47:53",
                                                                                        "updated_at"=>"2020-05-17 05:47:53",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 3,
                                                                                        "model"=>"Demo\Notification\Models\MailLayout",
                                                                                        "operation"=>"delete",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.notification::models.maillayout.row.delete",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Mail Layouts delete Permission",
                                                                                        "description"=>"This is the system generated permission for Mail Layouts delete",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1,
                                                                                        "id"=>"41152b61-10bd-4e93-baaa-515b7ee8b1d9"
                            ] ,            [
                                                                            "created_at"=>"2020-05-17 05:53:01",
                                                                                        "updated_at"=>"2020-05-17 05:53:01",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 3,
                                                                                        "model"=>"Demo\Notification\Models\MailTemplate",
                                                                                        "operation"=>"read",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.notification::models.mailtemplate.row.read",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Mail Templates read Permission",
                                                                                        "description"=>"This is the system generated permission for Mail Templates read",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1,
                                                                                        "id"=>"8a4f3d17-7b60-4f64-b360-977892c78bcc"
                            ] ,            [
                                                                            "created_at"=>"2020-05-17 05:53:01",
                                                                                        "updated_at"=>"2020-05-17 05:53:01",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 3,
                                                                                        "model"=>"Demo\Notification\Models\MailTemplate",
                                                                                        "operation"=>"write",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.notification::models.mailtemplate.row.write",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Mail Templates write Permission",
                                                                                        "description"=>"This is the system generated permission for Mail Templates write",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1,
                                                                                        "id"=>"ce0238d2-5a0d-487e-b323-665b1d81c7e4"
                            ] ,            [
                                                                            "created_at"=>"2020-05-17 05:53:01",
                                                                                        "updated_at"=>"2020-05-17 05:53:01",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 3,
                                                                                        "model"=>"Demo\Notification\Models\MailTemplate",
                                                                                        "operation"=>"create",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.notification::models.mailtemplate.row.create",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Mail Templates create Permission",
                                                                                        "description"=>"This is the system generated permission for Mail Templates create",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1,
                                                                                        "id"=>"24e2709c-4cb9-481c-b3bf-b08d8a62f427"
                            ] ,            [
                                                                            "created_at"=>"2020-05-17 05:53:01",
                                                                                        "updated_at"=>"2020-05-17 05:53:01",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 3,
                                                                                        "model"=>"Demo\Notification\Models\MailTemplate",
                                                                                        "operation"=>"delete",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.notification::models.mailtemplate.row.delete",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Mail Templates delete Permission",
                                                                                        "description"=>"This is the system generated permission for Mail Templates delete",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1,
                                                                                        "id"=>"134dab70-f285-42d7-b0ff-7167e2acbe35"
                            ] ,            [
                                                                            "created_at"=>"2020-05-17 05:46:59",
                                                                                        "updated_at"=>"2020-05-17 05:46:59",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 3,
                                                                                        "model"=>"Demo\Notification\Models\MailBrandSetting",
                                                                                        "operation"=>"read",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.notification::models.mailbrandsetting.row.read",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Mail Brand Setting read Permission",
                                                                                        "description"=>"This is the system generated permission for Mail Brand Setting read",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1,
                                                                                        "id"=>"40847dce-06cd-4394-9451-96716753fcfd"
                            ] ,            [
                                                                            "created_at"=>"2020-05-17 05:46:59",
                                                                                        "updated_at"=>"2020-05-17 05:46:59",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 3,
                                                                                        "model"=>"Demo\Notification\Models\MailBrandSetting",
                                                                                        "operation"=>"write",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.notification::models.mailbrandsetting.row.write",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Mail Brand Setting write Permission",
                                                                                        "description"=>"This is the system generated permission for Mail Brand Setting write",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1,
                                                                                        "id"=>"6672677a-c0af-45a2-b96e-e2d300ac59b5"
                            ] ,            [
                                                                            "created_at"=>"2020-05-17 05:46:59",
                                                                                        "updated_at"=>"2020-05-17 05:46:59",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 3,
                                                                                        "model"=>"Demo\Notification\Models\MailBrandSetting",
                                                                                        "operation"=>"create",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.notification::models.mailbrandsetting.row.create",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Mail Brand Setting create Permission",
                                                                                        "description"=>"This is the system generated permission for Mail Brand Setting create",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1,
                                                                                        "id"=>"ca2418d8-46c9-493e-be1e-dcc048b9f74b"
                            ] ,            [
                                                                            "created_at"=>"2020-05-17 05:46:59",
                                                                                        "updated_at"=>"2020-05-17 05:46:59",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 3,
                                                                                        "model"=>"Demo\Notification\Models\MailBrandSetting",
                                                                                        "operation"=>"delete",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.notification::models.mailbrandsetting.row.delete",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Mail Brand Setting delete Permission",
                                                                                        "description"=>"This is the system generated permission for Mail Brand Setting delete",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1,
                                                                                        "id"=>"4562741d-d316-42d1-b0c9-6f78137e8a40"
                            ] ,            [
                                                                            "created_at"=>"2020-05-17 05:52:10",
                                                                                        "updated_at"=>"2020-05-17 05:52:10",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 3,
                                                                                        "model"=>"Demo\Notification\Models\MailPartial",
                                                                                        "operation"=>"read",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.notification::models.mailpartial.row.read",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Mail Partial read Permission",
                                                                                        "description"=>"This is the system generated permission for Mail Partial read",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1,
                                                                                        "id"=>"87e96f3e-0bba-443a-b420-57278b4ed0e7"
                            ] ,            [
                                                                            "created_at"=>"2020-05-17 05:52:10",
                                                                                        "updated_at"=>"2020-05-17 05:52:10",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 3,
                                                                                        "model"=>"Demo\Notification\Models\MailPartial",
                                                                                        "operation"=>"write",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.notification::models.mailpartial.row.write",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Mail Partial write Permission",
                                                                                        "description"=>"This is the system generated permission for Mail Partial write",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1,
                                                                                        "id"=>"56353b9f-78b8-480a-909a-ed0d6641b6c9"
                            ] ,            [
                                                                            "created_at"=>"2020-05-17 05:52:11",
                                                                                        "updated_at"=>"2020-05-17 05:52:11",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 3,
                                                                                        "model"=>"Demo\Notification\Models\MailPartial",
                                                                                        "operation"=>"create",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.notification::models.mailpartial.row.create",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Mail Partial create Permission",
                                                                                        "description"=>"This is the system generated permission for Mail Partial create",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1,
                                                                                        "id"=>"9f7304df-5b8e-4fa1-91a3-96a1d5d00df8"
                            ] ,            [
                                                                            "created_at"=>"2020-05-17 05:52:11",
                                                                                        "updated_at"=>"2020-05-17 05:52:11",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 3,
                                                                                        "model"=>"Demo\Notification\Models\MailPartial",
                                                                                        "operation"=>"delete",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.notification::models.mailpartial.row.delete",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Mail Partial delete Permission",
                                                                                        "description"=>"This is the system generated permission for Mail Partial delete",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1,
                                                                                        "id"=>"6cf18928-ad33-440e-b7b9-61cd43554ed9"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_permissions')->where('plugin_id', 3)->delete();
            }
}
