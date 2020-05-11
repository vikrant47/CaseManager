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
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=> 150,
                                                                                        "previous"=>"{\"id\":150,\"title\":null,\"description\":null,\"created_at\":\"2020-04-12 08:27:24\",\"updated_at\":\"2020-04-12 15:41:19\",\"created_by_id\":1,\"updated_by_id\":1,\"priority_id\":3,\"case_number\":\"1212\",\"case_version\":\"\",\"suspect\":\"\",\"tat_duration\":null,\"comments\":\"\",\"plugin_id\":null,\"assigned_to_id\":1,\"test_columns\":\"\",\"another_field\":null,\"version\":0}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=> 5,
                                                                                        "created_at"=>"2020-04-12 16:05:03",
                                                                                        "updated_at"=>"2020-04-12 16:05:03",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=> 150,
                                                                                        "previous"=>"{\"id\":150,\"title\":null,\"description\":null,\"created_at\":\"2020-04-12 08:27:24\",\"updated_at\":\"2020-04-12 16:03:25\",\"created_by_id\":1,\"updated_by_id\":1,\"priority_id\":3,\"case_number\":\"1214\",\"case_version\":\"\",\"suspect\":\"\",\"tat_duration\":null,\"comments\":\"\",\"plugin_id\":null,\"assigned_to_id\":1,\"test_columns\":\"\",\"another_field\":null,\"version\":1}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=> 6,
                                                                                        "created_at"=>"2020-04-12 16:05:19",
                                                                                        "updated_at"=>"2020-04-12 16:05:19",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 1,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=> 150,
                                                                                        "previous"=>"{\"id\":150,\"title\":null,\"description\":null,\"created_at\":\"2020-04-12 08:27:24\",\"updated_at\":\"2020-04-12 16:05:03\",\"created_by_id\":1,\"updated_by_id\":1,\"priority_id\":3,\"case_number\":\"1214\",\"case_version\":\"\",\"suspect\":\"\",\"tat_duration\":null,\"comments\":\"\",\"plugin_id\":null,\"assigned_to_id\":1,\"test_columns\":\"\",\"another_field\":null,\"version\":1}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=> 7,
                                                                                        "created_at"=>"2020-04-12 16:05:28",
                                                                                        "updated_at"=>"2020-04-12 16:05:28",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 2,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=> 150,
                                                                                        "previous"=>"{\"id\":150,\"title\":null,\"description\":null,\"created_at\":\"2020-04-12 08:27:24\",\"updated_at\":\"2020-04-12 16:05:19\",\"created_by_id\":1,\"updated_by_id\":1,\"priority_id\":3,\"case_number\":\"1214\",\"case_version\":\"\",\"suspect\":\"test\",\"tat_duration\":null,\"comments\":\"\",\"plugin_id\":null,\"assigned_to_id\":1,\"test_columns\":\"\",\"another_field\":null,\"version\":2}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=> 1,
                                                                                        "created_at"=>"2020-05-10 10:40:42",
                                                                                        "updated_at"=>"2020-05-10 10:40:42",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=> 52,
                                                                                        "previous"=>"{\"id\":52,\"created_at\":\"2020-05-10 10:28:19\",\"updated_at\":\"2020-05-10 10:28:19\",\"created_by_id\":1,\"updated_by_id\":1,\"version\":null,\"label\":\"Dashboard\",\"type\":\"list\",\"active\":true,\"name\":\"dashboard\",\"description\":\"\",\"url\":\"\",\"model\":\"Demo\\Report\\Models\\Dashboard\",\"list\":\"\$\/demo\/report\/models\/dashboard\/columns.yaml\",\"form\":\"\",\"record_id\":null,\"plugin_id\":3,\"parent_id\":26,\"sort_order\":2,\"icon\":\"oc-icon-adjust\"}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=> 2,
                                                                                        "created_at"=>"2020-05-10 14:43:32",
                                                                                        "updated_at"=>"2020-05-10 14:43:32",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 1,
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=> 52,
                                                                                        "previous"=>"{\"id\":52,\"created_at\":\"2020-05-10 10:28:19\",\"updated_at\":\"2020-05-10 10:40:42\",\"created_by_id\":1,\"updated_by_id\":1,\"version\":1,\"label\":\"Dashboard2\",\"type\":\"list\",\"active\":true,\"name\":\"dashboard\",\"description\":\"\",\"url\":\"\",\"model\":\"Demo\\Report\\Models\\Dashboard\",\"list\":\"\$\/demo\/report\/models\/dashboard\/columns.yaml\",\"form\":\"\",\"record_id\":null,\"plugin_id\":3,\"parent_id\":26,\"sort_order\":2,\"icon\":\"oc-icon-adjust\"}",
                                                                                        "current"=> null
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_audit_logs')->delete();
            }
}
