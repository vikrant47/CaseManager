<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Casemanager d */
class SeedDemoReportWidgetLibraryAssociations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_report_widget_library_associations')->insert([
            [
                                                                            "created_at"=>"2020-06-21 17:10:38",
                                                                                        "updated_at"=>"2020-06-21 17:10:38",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "id"=>"2108b230-b3e2-11ea-9b64-67a911a6c96c",
                                                                                        "widget_id"=>"84383d11-89c6-4dac-906c-bb2b08923b53",
                                                                                        "library_id"=>"a65cda17-3942-4dac-995b-fd66fe412d1a"
                            ] ,            [
                                                                            "created_at"=>"2020-06-22 03:50:52",
                                                                                        "updated_at"=>"2020-06-22 03:50:52",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "id"=>"913a09f0-b43b-11ea-8fab-a77943a730cd",
                                                                                        "widget_id"=>"8be0d030-b3d3-11ea-90ed-bfdae0c12a09",
                                                                                        "library_id"=>"72d4e2a0-b375-11ea-a676-43d852c02135"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_report_widget_library_associations')->where('plugin_id', 6)->delete();
            }
}
