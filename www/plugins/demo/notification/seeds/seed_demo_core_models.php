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
                                                                            "id"=> 523,
                                                                                        "created_at"=>"2020-05-17 05:53:01",
                                                                                        "updated_at"=>"2020-05-17 05:53:01",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Mail Templates",
                                                                                        "model"=>"Demo\Notification\Models\MailTemplate",
                                                                                        "controller"=>"Demo\Notification\Controllers\MailTemplates",
                                                                                        "plugin_id"=> 3,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=> 0,
                                                                                        "description"=> "",
                                                                                        "attach_audited_by"=> false,
                                                                                        "viewable"=> false
                            ] ,            [
                                                                            "id"=> 520,
                                                                                        "created_at"=>"2020-05-17 05:46:59",
                                                                                        "updated_at"=>"2020-05-17 05:46:59",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Mail Brand Setting",
                                                                                        "model"=>"Demo\Notification\Models\MailBrandSetting",
                                                                                        "controller"=>"Demo\Notification\Controllers\MailBrandSetting",
                                                                                        "plugin_id"=> 3,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=> 0,
                                                                                        "description"=> "",
                                                                                        "attach_audited_by"=> false,
                                                                                        "viewable"=> false
                            ] ,            [
                                                                            "id"=> 521,
                                                                                        "created_at"=>"2020-05-17 05:47:53",
                                                                                        "updated_at"=>"2020-05-17 05:47:53",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Mail Layouts",
                                                                                        "model"=>"Demo\Notification\Models\MailLayout",
                                                                                        "controller"=>"Demo\Notification\Controllers\MailLayouts",
                                                                                        "plugin_id"=> 3,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=> 0,
                                                                                        "description"=> "",
                                                                                        "attach_audited_by"=> false,
                                                                                        "viewable"=> false
                            ] ,            [
                                                                            "id"=> 522,
                                                                                        "created_at"=>"2020-05-17 05:52:11",
                                                                                        "updated_at"=>"2020-05-17 05:52:11",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Mail Partial",
                                                                                        "model"=>"Demo\Notification\Models\MailPartial",
                                                                                        "controller"=>"Demo\Notification\Controllers\MailPartials",
                                                                                        "plugin_id"=> 3,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=> 0,
                                                                                        "description"=> "",
                                                                                        "attach_audited_by"=> false,
                                                                                        "viewable"=> false
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_models')->where('plugin_id', 3)->delete();
            }
}
