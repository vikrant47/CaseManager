<?php
namespace Demo\Notification\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Notification d */
class SeedDemoCoreModels implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_models')->insert([
            [
                                                                            "id"=>"0e210d37-73e2-49b9-b80a-9e3ebd8b1998",
                                                                                        "created_at"=>"2020-05-17 05:53:01",
                                                                                        "updated_at"=>"2020-05-17 05:53:01",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Mail Templates",
                                                                                        "model"=>"Demo\Notification\Models\MailTemplate",
                                                                                        "controller"=>"Demo\Notification\Controllers\MailTemplates",
                                                                                        "engine_application_id"=> "c79b3f36-a77a-4de9-a9f0-f890a99728ef",
                                                                                        "audit"=> false,
                                                                                        "viewable"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=> 0,
                                                                                        "description"=> "",
                                                                                        "attach_audited_by"=> false
                            ] ,            [
                                                                            "id"=>"497b52bf-f370-4ef4-92de-5b6802d7f7c9",
                                                                                        "created_at"=>"2020-05-17 05:46:59",
                                                                                        "updated_at"=>"2020-05-17 05:46:59",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Mail Brand Setting",
                                                                                        "model"=>"Demo\Notification\Models\MailBrandSetting",
                                                                                        "controller"=>"Demo\Notification\Controllers\MailBrandSetting",
                                                                                        "engine_application_id"=> "c79b3f36-a77a-4de9-a9f0-f890a99728ef",
                                                                                        "audit"=> false,
                                                                                        "viewable"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=> 0,
                                                                                        "description"=> "",
                                                                                        "attach_audited_by"=> false
                            ] ,            [
                                                                            "id"=>"d4b21a16-1e18-42f4-8efc-36fde559c739",
                                                                                        "created_at"=>"2020-05-17 05:47:53",
                                                                                        "updated_at"=>"2020-05-17 05:47:53",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Mail Layouts",
                                                                                        "model"=>"Demo\Notification\Models\MailLayout",
                                                                                        "controller"=>"Demo\Notification\Controllers\MailLayouts",
                                                                                        "engine_application_id"=> "c79b3f36-a77a-4de9-a9f0-f890a99728ef",
                                                                                        "audit"=> false,
                                                                                        "viewable"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=> 0,
                                                                                        "description"=> "",
                                                                                        "attach_audited_by"=> false
                            ] ,            [
                                                                            "id"=>"f8506ae5-277a-4a14-8d91-8412d9d27650",
                                                                                        "created_at"=>"2020-05-17 05:52:11",
                                                                                        "updated_at"=>"2020-05-17 05:52:11",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Mail Partial",
                                                                                        "model"=>"Demo\Notification\Models\MailPartial",
                                                                                        "controller"=>"Demo\Notification\Controllers\MailPartials",
                                                                                        "engine_application_id"=> "c79b3f36-a77a-4de9-a9f0-f890a99728ef",
                                                                                        "audit"=> false,
                                                                                        "viewable"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=> 0,
                                                                                        "description"=> "",
                                                                                        "attach_audited_by"=> false
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_models')->where('engine_application_id', 'c79b3f36-a77a-4de9-a9f0-f890a99728ef')->delete();
            }
}
