<?php
namespace Demo\Workflow\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Workflow d */
class SeedDemoCoreViewRoleAssociations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_view_role_associations')->insert([
            [
                                                                            "id"=> 201,
                                                                                        "created_at"=>"2020-05-16 07:44:41",
                                                                                        "updated_at"=>"2020-05-16 07:44:41",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 40,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 11,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 207,
                                                                                        "created_at"=>"2020-05-16 14:24:22",
                                                                                        "updated_at"=>"2020-05-16 14:24:22",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 34,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 11,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_view_role_associations')->where('plugin_id', 11)->delete();
            }
}
