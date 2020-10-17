<?php
namespace Demo\Core\Seeds\V0_0;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds engine d */
class SeedDemoCoreUserRoleAssociations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_user_role_associations')->insert([
            [
                                                                            "id"=>"f314578a-4686-46d0-acb5-2b6c096cc687",
                                                                                        "created_at"=>"2020-04-06 14:03:21",
                                                                                        "updated_at"=>"2020-04-06 14:03:21",
                                                                                        "user_id"=> 6,
                                                                                        "role_id"=>"f314578a-4686-46d0-acb5-2b6c096cc687",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1
                            ] ,            [
                                                                            "id"=>"d9f9f39e-1a2d-4eb9-9619-0fc673ca4c14",
                                                                                        "created_at"=>"2020-04-06 08:54:23",
                                                                                        "updated_at"=>"2020-04-06 08:54:23",
                                                                                        "user_id"=> 3,
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1
                            ] ,            [
                                                                            "id"=>"34d630d0-ad6f-11ea-8a1e-7b7a03481ce4",
                                                                                        "created_at"=>"2020-06-13 12:12:52",
                                                                                        "updated_at"=>"2020-06-13 12:12:52",
                                                                                        "user_id"=> 2,
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1
                            ] ,            [
                                                                            "id"=>"defccb80-091b-11eb-8bee-5dae8384f233",
                                                                                        "created_at"=>"2020-10-08 04:08:07",
                                                                                        "updated_at"=>"2020-10-08 04:08:07",
                                                                                        "user_id"=> 1,
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_user_role_associations')->where('engine_application_id', 'dc81b635-1d0a-4f3e-83af-13642d56abe4')->delete();
            }
}
