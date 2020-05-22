<?php
namespace Demo\Notification\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Notification d */
class SeedDemoCoreNavigations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_navigations')->insert([
            [
                                                                            "id"=> 26,
                                                                                        "created_at"=>"2020-05-09 15:09:59",
                                                                                        "updated_at"=>"2020-05-16 14:23:03",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "label"=>"Notification",
                                                                                        "type"=>"folder",
                                                                                        "active"=> 1,
                                                                                        "name"=>"notification",
                                                                                        "description"=> "",
                                                                                        "url"=> "",
                                                                                        "model"=> null,
                                                                                        "view"=> null,
                                                                                        "form"=> "",
                                                                                        "record_id"=> null,
                                                                                        "plugin_id"=> 3,
                                                                                        "parent_id"=> null,
                                                                                        "sort_order"=> 3,
                                                                                        "icon"=>"oc-icon-envelope",
                                                                                        "dashboard_id"=> null,
                                                                                        "widget_id"=> null,
                                                                                        "uipage_id"=> null
                            ] ,            [
                                                                            "id"=> 58,
                                                                                        "created_at"=>"2020-05-17 06:17:22",
                                                                                        "updated_at"=>"2020-05-17 06:17:22",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "label"=>"Templates",
                                                                                        "type"=>"list",
                                                                                        "active"=> 1,
                                                                                        "name"=>"templates",
                                                                                        "description"=> "",
                                                                                        "url"=> "",
                                                                                        "model"=>"Demo\Notification\Models\MailTemplate",
                                                                                        "view"=> null,
                                                                                        "form"=> "",
                                                                                        "record_id"=> null,
                                                                                        "plugin_id"=> 3,
                                                                                        "parent_id"=> 26,
                                                                                        "sort_order"=> 4,
                                                                                        "icon"=>"oc-icon-file-code-o",
                                                                                        "dashboard_id"=> null,
                                                                                        "widget_id"=> null,
                                                                                        "uipage_id"=> null
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_navigations')->where('plugin_id', 3)->delete();
            }
}
