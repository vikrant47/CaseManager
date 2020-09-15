<?php
namespace Demo\Notification\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds notification d */
class SeedDemoCoreNavigations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_navigations')->insert([
            [
                                                                            "id"=>"9ab44ba4-d108-437f-8025-b999fcffa10c",
                                                                                        "created_at"=>"2020-05-17 06:17:22",
                                                                                        "updated_at"=>"2020-05-17 06:17:22",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "label"=>"Templates",
                                                                                        "icon"=>"oc-icon-file-code-o",
                                                                                        "type"=>"list",
                                                                                        "active"=> 1,
                                                                                        "name"=>"templates",
                                                                                        "description"=> "",
                                                                                        "url"=> "",
                                                                                        "model"=>"Demo\Notification\Models\MailTemplate",
                                                                                        "list"=> null,
                                                                                        "form"=> "",
                                                                                        "view"=> null,
                                                                                        "uipage_id"=> null,
                                                                                        "record_id"=> null,
                                                                                        "dashboard_id"=> null,
                                                                                        "widget_id"=> null,
                                                                                        "engine_application_id"=>"c79b3f36-a77a-4de9-a9f0-f890a99728ef",
                                                                                        "parent_id"=>"43098bfd-5bf8-4979-a9b4-1fb837f327f3",
                                                                                        "sort_order"=> 4
                            ] ,            [
                                                                            "id"=>"43098bfd-5bf8-4979-a9b4-1fb837f327f3",
                                                                                        "created_at"=>"2020-05-09 15:09:59",
                                                                                        "updated_at"=>"2020-05-16 14:23:03",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "label"=>"Notification",
                                                                                        "icon"=>"oc-icon-folder",
                                                                                        "type"=>"folder",
                                                                                        "active"=> 1,
                                                                                        "name"=>"notification",
                                                                                        "description"=> "",
                                                                                        "url"=> "",
                                                                                        "model"=> null,
                                                                                        "list"=> null,
                                                                                        "form"=> "",
                                                                                        "view"=> null,
                                                                                        "uipage_id"=> null,
                                                                                        "record_id"=> null,
                                                                                        "dashboard_id"=> null,
                                                                                        "widget_id"=> null,
                                                                                        "engine_application_id"=>"c79b3f36-a77a-4de9-a9f0-f890a99728ef",
                                                                                        "parent_id"=> null,
                                                                                        "sort_order"=> 3
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_navigations')->where('engine_application_id', 'c79b3f36-a77a-4de9-a9f0-f890a99728ef')->delete();
            }
}
