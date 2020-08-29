<?php
namespace Demo\Tenant\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Tenant d */
class SeedDemoCorePermissionPolicyAssociations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_permission_policy_associations')->insert([
            [
                                                                            "id"=>"749f20f0-df01-11ea-9ac4-5f661f94cb54",
                                                                                        "created_at"=>"2020-08-15 14:13:13",
                                                                                        "updated_at"=>"2020-08-15 14:13:13",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=> "801c3e91-8be6-402e-9872-69d6ea29fe06",
                                                                                        "permission_id"=>"748cefd0-df01-11ea-b3b6-efa39ebcecce",
                                                                                        "policy_id"=>"747625e0-df01-11ea-9120-072bcc3760e8"
                            ] ,            [
                                                                            "id"=>"74b938d0-df01-11ea-9e4b-a9c80f37fac7",
                                                                                        "created_at"=>"2020-08-15 14:13:13",
                                                                                        "updated_at"=>"2020-08-15 14:13:13",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=> "801c3e91-8be6-402e-9872-69d6ea29fe06",
                                                                                        "permission_id"=>"74aee020-df01-11ea-b3f4-b9feac704a0f",
                                                                                        "policy_id"=>"747625e0-df01-11ea-9120-072bcc3760e8"
                            ] ,            [
                                                                            "id"=>"74cfb3d0-df01-11ea-9095-0bb088b99907",
                                                                                        "created_at"=>"2020-08-15 14:13:13",
                                                                                        "updated_at"=>"2020-08-15 14:13:13",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=> "801c3e91-8be6-402e-9872-69d6ea29fe06",
                                                                                        "permission_id"=>"74c577b0-df01-11ea-9eef-07cb0182a026",
                                                                                        "policy_id"=>"747625e0-df01-11ea-9120-072bcc3760e8"
                            ] ,            [
                                                                            "id"=>"74e5bc70-df01-11ea-a0fc-f3d42398073d",
                                                                                        "created_at"=>"2020-08-15 14:13:13",
                                                                                        "updated_at"=>"2020-08-15 14:13:13",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=> "801c3e91-8be6-402e-9872-69d6ea29fe06",
                                                                                        "permission_id"=>"74dbbe80-df01-11ea-a87e-2bb614060bbb",
                                                                                        "policy_id"=>"747625e0-df01-11ea-9120-072bcc3760e8"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_permission_policy_associations')->where('engine_application_id', '801c3e91-8be6-402e-9872-69d6ea29fe06')->delete();
            }
}
