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
                                                                                        "plugin_id"=> 3,
                                                                                        "sort_order"=> 4,
                                                                                        "icon"=>"oc-icon-file-code-o",
                                                                                        "id"=>"9ab44ba4-d108-437f-8025-b999fcffa10c",
                                                                                        "record_id"=> null,
                                                                                        "parent_id"=>"43098bfd-5bf8-4979-a9b4-1fb837f327f3",
                                                                                        "dashboard_id"=> null,
                                                                                        "widget_id"=> null,
                                                                                        "uipage_id"=> null
                            ] ,            [
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
                                                                                        "plugin_id"=> 3,
                                                                                        "sort_order"=> 3,
                                                                                        "icon"=>"oc-icon-folder",
                                                                                        "id"=>"43098bfd-5bf8-4979-a9b4-1fb837f327f3",
                                                                                        "record_id"=> null,
                                                                                        "parent_id"=> null,
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
