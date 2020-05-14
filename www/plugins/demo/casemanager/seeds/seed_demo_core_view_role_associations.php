<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Casemanager d */
class SeedDemoCoreViewRoleAssociations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_view_role_associations')->insert([
            [
                                                                            "id"=> 55,
                                                                                        "created_at"=>"2020-05-10 06:31:16",
                                                                                        "updated_at"=>"2020-05-10 06:31:16",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 46,
                                                                                        "role_id"=> 2,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 56,
                                                                                        "created_at"=>"2020-05-10 06:31:16",
                                                                                        "updated_at"=>"2020-05-10 06:31:16",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 51,
                                                                                        "role_id"=> 2,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 57,
                                                                                        "created_at"=>"2020-05-10 06:31:16",
                                                                                        "updated_at"=>"2020-05-10 06:31:16",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 44,
                                                                                        "role_id"=> 2,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 58,
                                                                                        "created_at"=>"2020-05-10 06:31:16",
                                                                                        "updated_at"=>"2020-05-10 06:31:16",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 45,
                                                                                        "role_id"=> 2,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 66,
                                                                                        "created_at"=>"2020-05-13 04:38:31",
                                                                                        "updated_at"=>"2020-05-13 04:38:31",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 54,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 67,
                                                                                        "created_at"=>"2020-05-13 04:39:02",
                                                                                        "updated_at"=>"2020-05-13 04:39:02",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 53,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 68,
                                                                                        "created_at"=>"2020-05-13 05:02:57",
                                                                                        "updated_at"=>"2020-05-13 05:02:57",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 52,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_view_role_associations')->where('plugin_id', 6)->delete();
            }
}
