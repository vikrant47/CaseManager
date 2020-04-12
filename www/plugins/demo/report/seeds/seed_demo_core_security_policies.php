<?php
namespace Demo\Report\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Report d */
class SeedDemoCoreSecurityPolicies implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_security_policies')->insert([
            [
                                                                            "id"=> 141,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Widget Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Widget",
                                                                                        "plugin_id"=> 14
                            ] ,            [
                                                                            "id"=> 142,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-28 14:43:57",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Dashboard Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Dashboard",
                                                                                        "plugin_id"=> 14
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_security_policies')->where('plugin_id', 14)->delete();
            }
}
