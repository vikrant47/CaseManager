<?php
namespace Demo\Notification\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Notification d */
class SeedDemoCoreViewRoleAssociations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_view_role_associations')->insert([
            [
                                                                            "id"=> 59,
                                                                                        "created_at"=>"2020-05-10 14:43:32",
                                                                                        "updated_at"=>"2020-05-10 14:43:32",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 52,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 3,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_view_role_associations')->where('plugin_id', 3)->delete();
            }
}
