<?php
namespace Demo\Casemanager\Seeds\V0_0;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds casemanager d */
class SeedDemoReportWidgetLibraryAssociations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_report_widget_library_associations')->insert([
            [
                                                                            "id"=>"c6ebf310-d992-11ea-b9c2-93c2870a196f",
                                                                                        "created_at"=>"2020-08-08 16:18:21",
                                                                                        "updated_at"=>"2020-08-08 16:18:21",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "widget_id"=>"84383d11-89c6-4dac-906c-bb2b08923b53",
                                                                                        "library_id"=>"a65cda17-3942-4dac-995b-fd66fe412d1a"
                            ] ,            [
                                                                            "id"=>"d764ec10-deb8-11ea-905d-8db0b88ba82f",
                                                                                        "created_at"=>"2020-08-15 05:33:25",
                                                                                        "updated_at"=>"2020-08-15 05:33:25",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "widget_id"=>"8be0d030-b3d3-11ea-90ed-bfdae0c12a09",
                                                                                        "library_id"=>"72d4e2a0-b375-11ea-a676-43d852c02135"
                            ] ,            [
                                                                            "id"=>"4583ed00-0493-11eb-8fe6-ef449ee16802",
                                                                                        "created_at"=>"2020-10-02 09:40:13",
                                                                                        "updated_at"=>"2020-10-02 09:40:13",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "widget_id"=>"cf470b50-ec63-11ea-a7e9-d9b879d77946",
                                                                                        "library_id"=>"a65cda17-3942-4dac-995b-fd66fe412d1a"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_report_widget_library_associations')->where('engine_application_id', 'df07f9b4-26c1-40ca-ba1f-1b77b1692b83')->delete();
            }
}
