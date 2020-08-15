<?php
namespace Demo\Tenant\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Tenant d */
class SeedDemoCoreSecurityPolicies implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_security_policies')->insert([
            [
                                                                            "created_at"=>"2020-08-15 14:13:13",
                                                                                        "updated_at"=>"2020-08-15 14:13:13",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Tenant Policy",
                                                                                        "description"=>"Autogenerated policy for Tenant",
                                                                                        "plugin_id"=> 12,
                                                                                        "id"=>"747625e0-df01-11ea-9120-072bcc3760e8"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_security_policies')->where('plugin_id', 12)->delete();
            }
}
