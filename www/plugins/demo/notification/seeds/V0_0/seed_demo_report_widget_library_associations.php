<?php
namespace Demo\Notification\Seeds\V0_0;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds notification d */
class SeedDemoReportWidgetLibraryAssociations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_report_widget_library_associations')->insert([
            [
                                                                            "id"=>"6a78aaa0-b511-11ea-9e2e-33598cbdd086",
                                                                                        "created_at"=>"2020-06-23 05:21:39",
                                                                                        "updated_at"=>"2020-06-23 05:21:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"c79b3f36-a77a-4de9-a9f0-f890a99728ef",
                                                                                        "widget_id"=>"44778960-b508-11ea-bbc1-096310b9696e",
                                                                                        "library_id"=>"72d4e2a0-b375-11ea-a676-43d852c02135"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_report_widget_library_associations')->where('engine_application_id', 'c79b3f36-a77a-4de9-a9f0-f890a99728ef')->delete();
            }
}
