<?php
namespace Demo\Core\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Core d */
class SeedDemoCoreViewRoleAssociations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_view_role_associations')->insert([
            [
                                                                            "id"=> 1,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 5,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 2,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 2,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 3,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 4,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 4,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 10,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 5,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 11,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 6,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 12,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 7,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 18,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 8,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 19,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 9,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 21,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 10,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 28,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 11,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 31,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 12,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 32,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 13,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 33,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 14,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 35,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 15,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 40,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 16,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 46,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 17,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 34,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 18,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 26,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 19,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 17,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 20,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 1,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 21,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 43,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 22,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 24,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 23,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 47,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 24,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 48,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 25,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 49,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 26,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 51,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 27,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 44,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 28,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 15,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 29,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 16,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 30,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 8,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 31,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 38,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 32,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 37,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 33,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 30,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 34,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 14,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 35,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 25,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 36,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 45,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 37,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 42,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 38,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 7,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 39,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 23,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 40,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 20,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 41,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 27,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 42,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 39,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 43,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 29,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 44,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 9,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 45,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 41,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 46,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 13,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 47,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 22,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 48,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 36,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 49,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 6,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ] ,            [
                                                                            "id"=> 50,
                                                                                        "created_at"=>"2020-05-10 05:38:18",
                                                                                        "updated_at"=>"2020-05-10 05:38:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "record_id"=> 50,
                                                                                        "role_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\Navigation"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_view_role_associations')->where('plugin_id', 10)->delete();
            }
}
