<?php
namespace Demo\Tenant\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Tenant d */
class SeedDemoCorePermissions implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_permissions')->insert([
            [
                                                                            "id"=>"748cefd0-df01-11ea-b3b6-efa39ebcecce",
                                                                                        "created_at"=>"2020-08-15 14:13:13",
                                                                                        "updated_at"=>"2020-08-15 14:13:13",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> "801c3e91-8be6-402e-9872-69d6ea29fe06",
                                                                                        "model"=>"Demo\Tenant\Models\Tenant",
                                                                                        "operation"=>"read",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.tenant::models.tenant.row.read",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Tenant read Permission",
                                                                                        "description"=>"This is the system generated permission for Tenant read",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ] ,            [
                                                                            "id"=>"74aee020-df01-11ea-b3f4-b9feac704a0f",
                                                                                        "created_at"=>"2020-08-15 14:13:13",
                                                                                        "updated_at"=>"2020-08-15 14:13:13",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> "801c3e91-8be6-402e-9872-69d6ea29fe06",
                                                                                        "model"=>"Demo\Tenant\Models\Tenant",
                                                                                        "operation"=>"write",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.tenant::models.tenant.row.write",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Tenant write Permission",
                                                                                        "description"=>"This is the system generated permission for Tenant write",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ] ,            [
                                                                            "id"=>"74c577b0-df01-11ea-9eef-07cb0182a026",
                                                                                        "created_at"=>"2020-08-15 14:13:13",
                                                                                        "updated_at"=>"2020-08-15 14:13:13",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> "801c3e91-8be6-402e-9872-69d6ea29fe06",
                                                                                        "model"=>"Demo\Tenant\Models\Tenant",
                                                                                        "operation"=>"create",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.tenant::models.tenant.row.create",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Tenant create Permission",
                                                                                        "description"=>"This is the system generated permission for Tenant create",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ] ,            [
                                                                            "id"=>"74dbbe80-df01-11ea-a87e-2bb614060bbb",
                                                                                        "created_at"=>"2020-08-15 14:13:13",
                                                                                        "updated_at"=>"2020-08-15 14:13:13",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> "801c3e91-8be6-402e-9872-69d6ea29fe06",
                                                                                        "model"=>"Demo\Tenant\Models\Tenant",
                                                                                        "operation"=>"delete",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.tenant::models.tenant.row.delete",
                                                                                        "admin_override"=> 1,
                                                                                        "name"=>"Tenant delete Permission",
                                                                                        "description"=>"This is the system generated permission for Tenant delete",
                                                                                        "active"=> 1,
                                                                                        "system"=> 1
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_permissions')->where('plugin_id', 12)->delete();
            }
}
