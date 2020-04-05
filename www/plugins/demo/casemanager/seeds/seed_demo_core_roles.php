<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Casemanager d */
class SeedDemoCoreRoles implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_roles')->insert([
            [
                                                            'id'=>'2',
                                                                        'created_at'=>'2020-04-04 14:10:36',
                                                                        'updated_at'=>'2020-04-04 14:10:36',
                                                                        'created_by_id'=>'1',
                                                                        'updated_by_id'=>'1',
                                                                        'plugin_id'=>'6',
                                                                                                    'code'=>'0',
                                                                                                    'name'=>'0',
                                                                                                    'description'=>'false'
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_roles')->where('plugin_id', 6)->delete();
            }
}
