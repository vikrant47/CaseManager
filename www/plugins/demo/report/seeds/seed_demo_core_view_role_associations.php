<?php
namespace Demo\Report\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Report d */
class SeedDemoCoreViewRoleAssociations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_view_role_associations')->insert([
            [
                                                                            "id"=>"506c3d70-a882-11ea-a94a-b316dfaafe43",
                                                                                        "created_at"=>"2020-06-07 05:47:03",
                                                                                        "updated_at"=>"2020-06-07 05:47:03",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"c916ac69-bfd1-4ccc-8b75-2d8160831de6",
                                                                                        "model"=>"Demo\Core\Models\FormAction",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "plugin_id"=> 14
                            ] ,            [
                                                                            "id"=>"5adf4740-a882-11ea-b2e7-97310c06d0e6",
                                                                                        "created_at"=>"2020-06-07 05:47:21",
                                                                                        "updated_at"=>"2020-06-07 05:47:21",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"eaa211e4-d899-413b-b6ef-64339b3b3626",
                                                                                        "model"=>"Demo\Core\Models\FormAction",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "plugin_id"=> 14
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_view_role_associations')->where('plugin_id', 14)->delete();
            }
}
