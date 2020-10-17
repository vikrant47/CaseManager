<?php
namespace Demo\Notification\Seeds\V0_0;

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
                                                                            "id"=>"43098bfd-5bf8-4979-a9b4-1fb837f327f3",
                                                                                        "created_at"=>"2020-05-09 15:09:59",
                                                                                        "updated_at"=>"2020-09-30 04:40:44",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "label"=>"Notification",
                                                                                        "icon"=>"oc-icon-envelope-o",
                                                                                        "tooltip"=> "",
                                                                                        "position"=>"sidebar",
                                                                                        "type"=>"folder",
                                                                                        "active"=> 1,
                                                                                        "name"=>"notification",
                                                                                        "description"=> "",
                                                                                        "url"=> "",
                                                                                        "model"=> null,
                                                                                        "list"=> "",
                                                                                        "form"=> "",
                                                                                        "view"=> "",
                                                                                        "script"=> "",
                                                                                        "uipage_id"=> null,
                                                                                        "record_id"=> null,
                                                                                        "dashboard_id"=> null,
                                                                                        "widget_id"=> null,
                                                                                        "nav_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "engine_application_id"=>"c79b3f36-a77a-4de9-a9f0-f890a99728ef",
                                                                                        "parent_id"=> null,
                                                                                        "sort_order"=> 3
                            ] ,            [
                                                                            "id"=>"9ab44ba4-d108-437f-8025-b999fcffa10c",
                                                                                        "created_at"=>"2020-05-17 06:17:22",
                                                                                        "updated_at"=>"2020-09-17 02:25:46",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "label"=>"Mail Templates",
                                                                                        "icon"=>"oc-icon-file-code-o",
                                                                                        "tooltip"=> null,
                                                                                        "position"=>"sidebar",
                                                                                        "type"=>"list",
                                                                                        "active"=> 1,
                                                                                        "name"=>"mail-templates",
                                                                                        "description"=> "",
                                                                                        "url"=>"/index/templates",
                                                                                        "model"=>"Demo\Notification\Models\MailTemplate",
                                                                                        "list"=> "",
                                                                                        "form"=> "",
                                                                                        "view"=> "",
                                                                                        "script"=> null,
                                                                                        "uipage_id"=> null,
                                                                                        "record_id"=> null,
                                                                                        "dashboard_id"=> null,
                                                                                        "widget_id"=> null,
                                                                                        "nav_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "engine_application_id"=>"c79b3f36-a77a-4de9-a9f0-f890a99728ef",
                                                                                        "parent_id"=>"43098bfd-5bf8-4979-a9b4-1fb837f327f3",
                                                                                        "sort_order"=> 4
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_navigations')->where('engine_application_id', 'c79b3f36-a77a-4de9-a9f0-f890a99728ef')->delete();
            }
}
