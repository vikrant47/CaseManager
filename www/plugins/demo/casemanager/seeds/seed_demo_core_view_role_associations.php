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
                                                                            "id"=> 282,
                                                                                        "created_at"=>"2020-05-18 04:31:45",
                                                                                        "updated_at"=>"2020-05-18 04:31:45",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 45,
                                                                                        "role_id"=> 2,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 283,
                                                                                        "created_at"=>"2020-05-18 04:31:45",
                                                                                        "updated_at"=>"2020-05-18 04:31:45",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 45,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 286,
                                                                                        "created_at"=>"2020-05-22 14:31:59",
                                                                                        "updated_at"=>"2020-05-22 14:31:59",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 59,
                                                                                        "role_id"=> 2,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 287,
                                                                                        "created_at"=>"2020-05-22 14:31:59",
                                                                                        "updated_at"=>"2020-05-22 14:31:59",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 59,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
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
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_view_role_associations')->where('plugin_id', 6)->delete();
            }
}
