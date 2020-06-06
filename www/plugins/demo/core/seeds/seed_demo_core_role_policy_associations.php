<?php
namespace Demo\Core\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Core d */
class SeedDemoCoreRolePolicyAssociations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_role_policy_associations')->insert([
            [
                                                                            "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "id"=>"c589883b-ddd1-42fb-96bd-d01b0551406a",
                                                                                        "role_id"=> null,
                                                                                        "policy_id"=>"694b6dcf-0017-4013-bc71-c7d71dae6a3a"
                            ] ,            [
                                                                            "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "id"=>"bf7e8285-aace-49d5-992d-85173cd18ec9",
                                                                                        "role_id"=> null,
                                                                                        "policy_id"=>"694b6dcf-0017-4013-bc71-c7d71dae6a3a"
                            ] ,            [
                                                                            "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "id"=>"57b141c4-24d9-4c1b-97cf-3ce2b8b67ae0",
                                                                                        "role_id"=> null,
                                                                                        "policy_id"=>"694b6dcf-0017-4013-bc71-c7d71dae6a3a"
                            ] ,            [
                                                                            "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "id"=>"8741b6f3-36ff-4f60-806c-02c386b71212",
                                                                                        "role_id"=> null,
                                                                                        "policy_id"=>"694b6dcf-0017-4013-bc71-c7d71dae6a3a"
                            ] ,            [
                                                                            "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "id"=>"54000956-8149-40de-ae79-cf72694bc9ed",
                                                                                        "role_id"=> null,
                                                                                        "policy_id"=>"694b6dcf-0017-4013-bc71-c7d71dae6a3a"
                            ] ,            [
                                                                            "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "id"=>"936a330d-e838-40f7-a24a-b494582a5060",
                                                                                        "role_id"=> null,
                                                                                        "policy_id"=>"694b6dcf-0017-4013-bc71-c7d71dae6a3a"
                            ] ,            [
                                                                            "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "id"=>"59988daf-d35f-4b82-873f-10858ee03e7e",
                                                                                        "role_id"=> null,
                                                                                        "policy_id"=>"694b6dcf-0017-4013-bc71-c7d71dae6a3a"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_role_policy_associations')->where('plugin_id', 10)->delete();
            }
}
