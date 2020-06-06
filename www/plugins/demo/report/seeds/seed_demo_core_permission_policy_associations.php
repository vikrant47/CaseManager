<?php
namespace Demo\Report\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Report d */
class SeedDemoCorePermissionPolicyAssociations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_permission_policy_associations')->insert([
            [
                                                                            "created_at"=>"2020-05-29 08:12:46",
                                                                                        "updated_at"=>"2020-05-29 08:12:46",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 14,
                                                                                        "id"=>"705fd029-4de5-48af-834c-27006980f647",
                                                                                        "permission_id"=>"9f626681-b9be-439a-9b3d-451dbef42196",
                                                                                        "policy_id"=>"1bb91fca-e15a-4fb7-b176-0be599769c86"
                            ] ,            [
                                                                            "created_at"=>"2020-05-29 08:12:46",
                                                                                        "updated_at"=>"2020-05-29 08:12:46",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 14,
                                                                                        "id"=>"178d621e-9dfb-4a81-aa26-55bebf969f59",
                                                                                        "permission_id"=>"19e19159-28a0-4fa6-9c6c-d7b3881646c2",
                                                                                        "policy_id"=>"1bb91fca-e15a-4fb7-b176-0be599769c86"
                            ] ,            [
                                                                            "created_at"=>"2020-05-29 08:12:46",
                                                                                        "updated_at"=>"2020-05-29 08:12:46",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 14,
                                                                                        "id"=>"4b85fa8e-04f6-4fb6-afdd-5a6178b8e03d",
                                                                                        "permission_id"=>"c91090cd-d197-4fc0-ad11-ca96eff84cd7",
                                                                                        "policy_id"=>"1bb91fca-e15a-4fb7-b176-0be599769c86"
                            ] ,            [
                                                                            "created_at"=>"2020-05-29 08:12:47",
                                                                                        "updated_at"=>"2020-05-29 08:12:47",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 14,
                                                                                        "id"=>"0710e033-7506-4b56-922f-2cf3eaa910c9",
                                                                                        "permission_id"=>"13647c7a-fb93-42b4-8e72-14abd3efcee2",
                                                                                        "policy_id"=>"1bb91fca-e15a-4fb7-b176-0be599769c86"
                            ] ,            [
                                                                            "created_at"=>"2020-04-06 07:18:47",
                                                                                        "updated_at"=>"2020-04-06 07:18:47",
                                                                                        "created_by_id"=> 6,
                                                                                        "updated_by_id"=> 6,
                                                                                        "plugin_id"=> 14,
                                                                                        "id"=>"30138d33-6050-42a9-a0e1-24053d875605",
                                                                                        "permission_id"=>"a70dbd44-6388-4c3c-b350-bd5e2985703a",
                                                                                        "policy_id"=>"1fcbb601-df64-4947-b1ca-e277326b5ef0"
                            ] ,            [
                                                                            "created_at"=>"2020-04-06 07:18:47",
                                                                                        "updated_at"=>"2020-04-06 07:18:47",
                                                                                        "created_by_id"=> 6,
                                                                                        "updated_by_id"=> 6,
                                                                                        "plugin_id"=> 14,
                                                                                        "id"=>"39b9920c-fb2a-433c-a9cb-f5033755018f",
                                                                                        "permission_id"=>"b332dfde-b251-46fc-9869-c528283dc6ae",
                                                                                        "policy_id"=>"1fcbb601-df64-4947-b1ca-e277326b5ef0"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_permission_policy_associations')->where('plugin_id', 14)->delete();
            }
}
