<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Casemanager d */
class SeedDemoReportWidgets implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_report_widgets')->insert([
            [
                                                            'id'=>'1',
                                                                        'created_at'=>'2019-12-01 07:42:56',
                                                                        'updated_at'=>'2019-12-08 08:02:10',
                                                                        'created_by_id'=>'1',
                                                                        'updated_by_id'=>'1',
                                                                                                    'name'=>'0',
                                                                                                    'slug'=>'0',
                                                                                                    'description'=>'false',
                                                                                                    'data'=>'0',
                                                                                                    'script'=>'0',
                                                                                                    'public'=>'false',
                                                                        'plugin_id'=>'6',
                                                                        'library_id'=>'1',
                                                                                                    'template'=>'false'
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_report_widgets')->where('plugin_id', 6)->delete();
            }
}
