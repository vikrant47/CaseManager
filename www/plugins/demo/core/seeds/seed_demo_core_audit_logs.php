<?php
namespace Demo\Core\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Core d */
class SeedDemoCoreAuditLogs implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_audit_logs')->insert([
            [
                                                                            "id"=> 4,
                                                                                        "created_at"=>"2020-04-12 16:03:25",
                                                                                        "updated_at"=>"2020-04-12 16:03:25",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "record_id"=> 150,
                                                                                        "previous"=>"{\"id\":150,\"title\":null,\"description\":null,\"created_at\":\"2020-04-12 08:27:24\",\"updated_at\":\"2020-04-12 15:41:19\",\"created_by_id\":1,\"updated_by_id\":1,\"priority_id\":3,\"case_number\":\"1212\",\"case_version\":\"\",\"suspect\":\"\",\"tat_duration\":null,\"comments\":\"\",\"plugin_id\":null,\"assigned_to_id\":1,\"test_columns\":\"\",\"another_field\":null,\"version\":0}",
                                                                                        "current"=> null,
                                                                                        "operation"=>"updating"
                            ] ,            [
                                                                            "id"=> 5,
                                                                                        "created_at"=>"2020-04-12 16:05:03",
                                                                                        "updated_at"=>"2020-04-12 16:05:03",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "record_id"=> 150,
                                                                                        "previous"=>"{\"id\":150,\"title\":null,\"description\":null,\"created_at\":\"2020-04-12 08:27:24\",\"updated_at\":\"2020-04-12 16:03:25\",\"created_by_id\":1,\"updated_by_id\":1,\"priority_id\":3,\"case_number\":\"1214\",\"case_version\":\"\",\"suspect\":\"\",\"tat_duration\":null,\"comments\":\"\",\"plugin_id\":null,\"assigned_to_id\":1,\"test_columns\":\"\",\"another_field\":null,\"version\":1}",
                                                                                        "current"=> null,
                                                                                        "operation"=>"updating"
                            ] ,            [
                                                                            "id"=> 6,
                                                                                        "created_at"=>"2020-04-12 16:05:19",
                                                                                        "updated_at"=>"2020-04-12 16:05:19",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 1,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "record_id"=> 150,
                                                                                        "previous"=>"{\"id\":150,\"title\":null,\"description\":null,\"created_at\":\"2020-04-12 08:27:24\",\"updated_at\":\"2020-04-12 16:05:03\",\"created_by_id\":1,\"updated_by_id\":1,\"priority_id\":3,\"case_number\":\"1214\",\"case_version\":\"\",\"suspect\":\"\",\"tat_duration\":null,\"comments\":\"\",\"plugin_id\":null,\"assigned_to_id\":1,\"test_columns\":\"\",\"another_field\":null,\"version\":1}",
                                                                                        "current"=> null,
                                                                                        "operation"=>"updating"
                            ] ,            [
                                                                            "id"=> 7,
                                                                                        "created_at"=>"2020-04-12 16:05:28",
                                                                                        "updated_at"=>"2020-04-12 16:05:28",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 2,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "record_id"=> 150,
                                                                                        "previous"=>"{\"id\":150,\"title\":null,\"description\":null,\"created_at\":\"2020-04-12 08:27:24\",\"updated_at\":\"2020-04-12 16:05:19\",\"created_by_id\":1,\"updated_by_id\":1,\"priority_id\":3,\"case_number\":\"1214\",\"case_version\":\"\",\"suspect\":\"test\",\"tat_duration\":null,\"comments\":\"\",\"plugin_id\":null,\"assigned_to_id\":1,\"test_columns\":\"\",\"another_field\":null,\"version\":2}",
                                                                                        "current"=> null,
                                                                                        "operation"=>"updating"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_audit_logs')->delete();
            }
}
