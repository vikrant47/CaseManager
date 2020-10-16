<?php
namespace Demo\Core\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds engine d */
class SeedDemoCoreAuditLogs implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_audit_logs')->insert([
            [
                                                                            "id"=>"58143ad0-a875-11ea-937f-c3f3c256f915",
                                                                                        "created_at"=>"2020-06-07 04:14:13",
                                                                                        "updated_at"=>"2020-06-07 04:14:13",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"520eafe0-a875-11ea-b038-8d334863e71c",
                                                                                        "previous"=>"{\"case_number\":\"5545465\",\"case_version\":\"6465465\",\"description\":null,\"priority_id\":null,\"suspect\":\"654654654\",\"ttl\":645645,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"0ea48ed0-a876-11ea-92ad-451b73041c6c",
                                                                                        "created_at"=>"2020-06-07 04:19:19",
                                                                                        "updated_at"=>"2020-06-07 04:19:19",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 1,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"520eafe0-a875-11ea-b038-8d334863e71c",
                                                                                        "previous"=>"{\"case_number\":\"5545465\",\"case_version\":\"6465465\",\"description\":null,\"priority_id\":null,\"suspect\":\"654654654\",\"ttl\":645645,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"af101e90-a877-11ea-891f-dfa9a35d0cc4",
                                                                                        "created_at"=>"2020-06-07 04:30:58",
                                                                                        "updated_at"=>"2020-06-07 04:30:58",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"ac2abd90-a877-11ea-991a-7d6401d5f988",
                                                                                        "previous"=>"{\"case_number\":\"54654\",\"case_version\":\"64654\",\"description\":null,\"priority_id\":null,\"suspect\":\"64654654\",\"ttl\":64,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"92e97360-a879-11ea-8e67-4ffe8779330e",
                                                                                        "created_at"=>"2020-06-07 04:44:29",
                                                                                        "updated_at"=>"2020-06-07 04:44:29",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"88b29cb0-a879-11ea-a404-97454a3d8370",
                                                                                        "previous"=>"{\"case_number\":\"54545\",\"case_version\":\"5454\",\"description\":null,\"priority_id\":null,\"suspect\":\"54545\",\"ttl\":55454,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"97bbd980-a879-11ea-81a3-7126d9b80152",
                                                                                        "created_at"=>"2020-06-07 04:44:37",
                                                                                        "updated_at"=>"2020-06-07 04:44:37",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 1,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"88b29cb0-a879-11ea-a404-97454a3d8370",
                                                                                        "previous"=>"{\"case_number\":\"54545\",\"case_version\":\"5454\",\"description\":null,\"priority_id\":null,\"suspect\":\"54545\",\"ttl\":55454,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"5ed07680-a885-11ea-bfcd-1db1a7da4e7f",
                                                                                        "created_at"=>"2020-06-07 06:08:56",
                                                                                        "updated_at"=>"2020-06-07 06:08:56",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"5e9999d0-a885-11ea-b80c-31b147e327cd",
                                                                                        "previous"=>"{\"case_number\":\"5654564\",\"case_version\":\"654654\",\"description\":null,\"priority_id\":null,\"suspect\":\"6465465\",\"ttl\":6465456,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"8f814b60-a887-11ea-a59d-6913f0738228",
                                                                                        "created_at"=>"2020-06-07 06:24:43",
                                                                                        "updated_at"=>"2020-06-07 06:24:43",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 1,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"5e9999d0-a885-11ea-b80c-31b147e327cd",
                                                                                        "previous"=>"{\"case_number\":\"5654564\",\"case_version\":\"654654\",\"description\":null,\"priority_id\":null,\"suspect\":\"6465465\",\"ttl\":6465456,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"d93bb460-a887-11ea-a76e-6b81b90cf0ec",
                                                                                        "created_at"=>"2020-06-07 06:26:40",
                                                                                        "updated_at"=>"2020-06-07 06:26:40",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"d29a9b00-a887-11ea-81b6-cf53d393a93f",
                                                                                        "previous"=>"{\"case_number\":\"5456465\",\"case_version\":\"564654\",\"description\":null,\"priority_id\":null,\"suspect\":\"64654\",\"ttl\":564654,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"ded22a90-a887-11ea-991d-6929f34a07c1",
                                                                                        "created_at"=>"2020-06-07 06:26:50",
                                                                                        "updated_at"=>"2020-06-07 06:26:50",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 1,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"d29a9b00-a887-11ea-81b6-cf53d393a93f",
                                                                                        "previous"=>"{\"case_number\":\"5456465\",\"case_version\":\"564654\",\"description\":null,\"priority_id\":null,\"suspect\":\"64654\",\"ttl\":564654,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"ee812430-a887-11ea-aad3-d96d99f9a6fb",
                                                                                        "created_at"=>"2020-06-07 06:27:16",
                                                                                        "updated_at"=>"2020-06-07 06:27:16",
                                                                                        "created_by_id"=> 2,
                                                                                        "updated_by_id"=> 2,
                                                                                        "version"=> 2,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"d29a9b00-a887-11ea-81b6-cf53d393a93f",
                                                                                        "previous"=>"{\"case_number\":\"5456465\",\"case_version\":\"564654\",\"description\":null,\"priority_id\":null,\"suspect\":\"64654\",\"ttl\":564654,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"034565f0-a888-11ea-ae5a-93be2771f544",
                                                                                        "created_at"=>"2020-06-07 06:27:51",
                                                                                        "updated_at"=>"2020-06-07 06:27:51",
                                                                                        "created_by_id"=> 2,
                                                                                        "updated_by_id"=> 2,
                                                                                        "version"=> 3,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"d29a9b00-a887-11ea-81b6-cf53d393a93f",
                                                                                        "previous"=>"{\"case_number\":\"5456465\",\"case_version\":\"564654\",\"description\":null,\"priority_id\":null,\"suspect\":\"64654\",\"ttl\":564654,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"14fd4020-a888-11ea-bd18-2d58f60bf3fb",
                                                                                        "created_at"=>"2020-06-07 06:28:20",
                                                                                        "updated_at"=>"2020-06-07 06:28:20",
                                                                                        "created_by_id"=> 2,
                                                                                        "updated_by_id"=> 2,
                                                                                        "version"=> 4,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"d29a9b00-a887-11ea-81b6-cf53d393a93f",
                                                                                        "previous"=>"{\"case_number\":\"5456465\",\"case_version\":\"564654\",\"description\":null,\"priority_id\":null,\"suspect\":\"64654\",\"ttl\":564654,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"1de57080-a888-11ea-bc9b-292a87d0c437",
                                                                                        "created_at"=>"2020-06-07 06:28:35",
                                                                                        "updated_at"=>"2020-06-07 06:28:35",
                                                                                        "created_by_id"=> 2,
                                                                                        "updated_by_id"=> 2,
                                                                                        "version"=> 5,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"d29a9b00-a887-11ea-81b6-cf53d393a93f",
                                                                                        "previous"=>"{\"case_number\":\"5456465\",\"case_version\":\"564654\",\"description\":null,\"priority_id\":null,\"suspect\":\"64654\",\"ttl\":564654,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"48d221c0-a88b-11ea-8547-4304304ab4ed",
                                                                                        "created_at"=>"2020-06-07 06:51:16",
                                                                                        "updated_at"=>"2020-06-07 06:51:16",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"48824180-a88b-11ea-817a-4d17562fdc2d",
                                                                                        "previous"=>"{\"case_number\":\"87897897\",\"case_version\":\"45\",\"description\":null,\"priority_id\":null,\"suspect\":\"test\",\"ttl\":87987987,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"7e53a500-a88b-11ea-bae9-f1a279c4af0b",
                                                                                        "created_at"=>"2020-06-07 06:52:46",
                                                                                        "updated_at"=>"2020-06-07 06:52:46",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 1,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"48824180-a88b-11ea-817a-4d17562fdc2d",
                                                                                        "previous"=>"{\"case_number\":\"87897897\",\"case_version\":\"45\",\"description\":null,\"priority_id\":null,\"suspect\":\"test\",\"ttl\":87987987,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"d11dc480-a88b-11ea-9714-53644c272001",
                                                                                        "created_at"=>"2020-06-07 06:55:05",
                                                                                        "updated_at"=>"2020-06-07 06:55:05",
                                                                                        "created_by_id"=> 2,
                                                                                        "updated_by_id"=> 2,
                                                                                        "version"=> 2,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"48824180-a88b-11ea-817a-4d17562fdc2d",
                                                                                        "previous"=>"{\"case_number\":\"87897897\",\"case_version\":\"45\",\"description\":null,\"priority_id\":null,\"suspect\":\"test\",\"ttl\":87987987,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"f32e4200-a88b-11ea-a982-531072a88246",
                                                                                        "created_at"=>"2020-06-07 06:56:02",
                                                                                        "updated_at"=>"2020-06-07 06:56:02",
                                                                                        "created_by_id"=> 2,
                                                                                        "updated_by_id"=> 2,
                                                                                        "version"=> 3,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"48824180-a88b-11ea-817a-4d17562fdc2d",
                                                                                        "previous"=>"{\"case_number\":\"87897897\",\"case_version\":\"45\",\"description\":null,\"priority_id\":null,\"suspect\":\"test\",\"ttl\":87987987,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"0f0b42e0-a88c-11ea-b829-093f819d053d",
                                                                                        "created_at"=>"2020-06-07 06:56:49",
                                                                                        "updated_at"=>"2020-06-07 06:56:49",
                                                                                        "created_by_id"=> 2,
                                                                                        "updated_by_id"=> 2,
                                                                                        "version"=> 4,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"48824180-a88b-11ea-817a-4d17562fdc2d",
                                                                                        "previous"=>"{\"case_number\":\"87897897\",\"case_version\":\"45\",\"description\":null,\"priority_id\":null,\"suspect\":\"test\",\"ttl\":87987987,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"db0035d0-ad3a-11ea-8f70-47f2d7d521c1",
                                                                                        "created_at"=>"2020-06-13 05:58:08",
                                                                                        "updated_at"=>"2020-06-13 05:58:08",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"da839640-ad3a-11ea-8219-415e71b1df69",
                                                                                        "previous"=>"{\"case_number\":\"54545\",\"case_version\":\"54545\",\"description\":null,\"priority_id\":null,\"suspect\":\"545454\",\"ttl\":54545,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"f6620d60-ad3c-11ea-bbd9-a561d0fc31ef",
                                                                                        "created_at"=>"2020-06-13 06:13:13",
                                                                                        "updated_at"=>"2020-06-13 06:13:13",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"f627cb90-ad3c-11ea-8e90-c13740dd6e15",
                                                                                        "previous"=>"{\"case_number\":\"4545\",\"case_version\":\"5454\",\"description\":null,\"priority_id\":null,\"suspect\":\"45454\",\"ttl\":5454,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"5f5a8180-ad3d-11ea-9426-23641faf80d6",
                                                                                        "created_at"=>"2020-06-13 06:16:09",
                                                                                        "updated_at"=>"2020-06-13 06:16:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 1,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"f627cb90-ad3c-11ea-8e90-c13740dd6e15",
                                                                                        "previous"=>"{\"case_number\":\"4545\",\"case_version\":\"5454\",\"description\":null,\"priority_id\":null,\"suspect\":\"45454\",\"ttl\":5454,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"ab65cea0-ad3d-11ea-8706-e3195c1b5af8",
                                                                                        "created_at"=>"2020-06-13 06:18:16",
                                                                                        "updated_at"=>"2020-06-13 06:18:16",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 1,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"da839640-ad3a-11ea-8219-415e71b1df69",
                                                                                        "previous"=>"{\"case_number\":\"54545\",\"case_version\":\"54545\",\"description\":null,\"priority_id\":null,\"suspect\":\"545454\",\"ttl\":54545,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"ab8f9330-ad3d-11ea-ae32-6fe326c3e435",
                                                                                        "created_at"=>"2020-06-13 06:18:17",
                                                                                        "updated_at"=>"2020-06-13 06:18:17",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 2,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"da839640-ad3a-11ea-8219-415e71b1df69",
                                                                                        "previous"=>"{\"case_number\":\"54545\",\"case_version\":\"54545\",\"description\":null,\"priority_id\":null,\"suspect\":\"545454\",\"ttl\":54545,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"abf0f050-ae0a-11ea-a796-25b9e6a7b08a",
                                                                                        "created_at"=>"2020-06-14 06:45:44",
                                                                                        "updated_at"=>"2020-06-14 06:45:44",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"ab979270-ae0a-11ea-8a21-bd39412de736",
                                                                                        "previous"=>"{\"case_number\":\"8787\",\"case_version\":\"8787\",\"description\":null,\"priority_id\":null,\"suspect\":\"87878\",\"ttl\":8787,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"66ecb500-ae20-11ea-a31d-1b94b0299010",
                                                                                        "created_at"=>"2020-06-14 09:21:17",
                                                                                        "updated_at"=>"2020-06-14 09:21:17",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 1,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"ab979270-ae0a-11ea-8a21-bd39412de736",
                                                                                        "previous"=>"{\"case_number\":\"8787\",\"case_version\":\"8787\",\"description\":null,\"priority_id\":null,\"suspect\":\"87878\",\"ttl\":8787,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"67120570-ae20-11ea-aa04-07d32b491397",
                                                                                        "created_at"=>"2020-06-14 09:21:17",
                                                                                        "updated_at"=>"2020-06-14 09:21:17",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 2,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"ab979270-ae0a-11ea-8a21-bd39412de736",
                                                                                        "previous"=>"{\"case_number\":\"8787\",\"case_version\":\"8787\",\"description\":null,\"priority_id\":null,\"suspect\":\"87878\",\"ttl\":8787,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"f2d12f90-b2d6-11ea-a47e-579924fd5f91",
                                                                                        "created_at"=>"2020-06-20 09:18:05",
                                                                                        "updated_at"=>"2020-06-20 09:18:05",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"f2628130-b2d6-11ea-9857-af73e7931f92",
                                                                                        "previous"=>"{\"case_number\":\"7015\",\"case_version\":\"54545\",\"description\":null,\"priority_id\":null,\"suspect\":\"5454\",\"ttl\":3170481484,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"f863e440-b2d6-11ea-9438-f94f54105680",
                                                                                        "created_at"=>"2020-06-20 09:18:14",
                                                                                        "updated_at"=>"2020-06-20 09:18:14",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 1,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"f2628130-b2d6-11ea-9857-af73e7931f92",
                                                                                        "previous"=>"{\"case_number\":\"7015\",\"case_version\":\"54545\",\"description\":null,\"priority_id\":null,\"suspect\":\"5454\",\"ttl\":3170481484,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"f887deb0-b2d6-11ea-a4f5-e94f209b861a",
                                                                                        "created_at"=>"2020-06-20 09:18:15",
                                                                                        "updated_at"=>"2020-06-20 09:18:15",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 2,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"f2628130-b2d6-11ea-9857-af73e7931f92",
                                                                                        "previous"=>"{\"case_number\":\"7015\",\"case_version\":\"54545\",\"description\":null,\"priority_id\":null,\"suspect\":\"5454\",\"ttl\":3170481484,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"8e0fdde0-bec9-11ea-9058-f53a98b78a14",
                                                                                        "created_at"=>"2020-07-05 14:12:26",
                                                                                        "updated_at"=>"2020-07-05 14:12:26",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"8dc0d800-bec9-11ea-8024-69f5b89267d0",
                                                                                        "previous"=>"{\"case_number\":\"54545\",\"case_version\":\"54545\",\"description\":null,\"priority_id\":null,\"suspect\":\"64\",\"ttl\":3171795146,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"93f949c0-bec9-11ea-9473-95915803942a",
                                                                                        "created_at"=>"2020-07-05 14:12:36",
                                                                                        "updated_at"=>"2020-07-05 14:12:36",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 1,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"8dc0d800-bec9-11ea-8024-69f5b89267d0",
                                                                                        "previous"=>"{\"case_number\":\"54545\",\"case_version\":\"54545\",\"description\":null,\"priority_id\":null,\"suspect\":\"64\",\"ttl\":3171795146,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"941fdbe0-bec9-11ea-85f2-4745af2be7ec",
                                                                                        "created_at"=>"2020-07-05 14:12:37",
                                                                                        "updated_at"=>"2020-07-05 14:12:37",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 2,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"8dc0d800-bec9-11ea-8024-69f5b89267d0",
                                                                                        "previous"=>"{\"case_number\":\"54545\",\"case_version\":\"54545\",\"description\":null,\"priority_id\":null,\"suspect\":\"64\",\"ttl\":3171795146,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"9c0bab40-becb-11ea-9b69-a5098717725e",
                                                                                        "created_at"=>"2020-07-05 14:27:09",
                                                                                        "updated_at"=>"2020-07-05 14:27:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"9bcbd910-becb-11ea-8a82-27160d7ae9f3",
                                                                                        "previous"=>"{\"case_number\":\"5454\",\"case_version\":\"\",\"description\":null,\"priority_id\":null,\"suspect\":\"54545\",\"ttl\":3171796028,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"9cea5f10-becb-11ea-875a-474b8a71d25f",
                                                                                        "created_at"=>"2020-07-05 14:27:10",
                                                                                        "updated_at"=>"2020-07-05 14:27:10",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"9caa4610-becb-11ea-9b6a-9df544c173f0",
                                                                                        "previous"=>"{\"case_number\":\"5454\",\"case_version\":\"\",\"description\":null,\"priority_id\":null,\"suspect\":\"54545\",\"ttl\":3171796030,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"857f8e30-cfc5-11ea-8d13-1d444a7d0a9d",
                                                                                        "created_at"=>"2020-07-27 04:56:24",
                                                                                        "updated_at"=>"2020-07-27 04:56:24",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"8511a1b0-cfc5-11ea-b61f-f3c1964e7cf1",
                                                                                        "previous"=>"{\"case_number\":\"4555\",\"case_version\":\"\",\"description\":null,\"priority_id\":null,\"suspect\":\"5555\",\"ttl\":3173662583,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"8bff5410-cfc5-11ea-b5fa-836392110945",
                                                                                        "created_at"=>"2020-07-27 04:56:35",
                                                                                        "updated_at"=>"2020-07-27 04:56:35",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 1,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"8511a1b0-cfc5-11ea-b61f-f3c1964e7cf1",
                                                                                        "previous"=>"{\"case_number\":\"4555\",\"case_version\":\"\",\"description\":null,\"priority_id\":null,\"suspect\":\"5555\",\"ttl\":3173662583,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"9e3bba00-da20-11ea-b5b9-57bbf2b886d8",
                                                                                        "created_at"=>"2020-08-09 09:13:41",
                                                                                        "updated_at"=>"2020-08-09 09:13:41",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 3,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"8dc0d800-bec9-11ea-8024-69f5b89267d0",
                                                                                        "previous"=>"{\"case_number\":\"54545\",\"case_version\":\"54545\",\"description\":null,\"priority_id\":null,\"suspect\":\"64\",\"ttl\":3171795146,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"b9b7c860-da20-11ea-a390-f35926930677",
                                                                                        "created_at"=>"2020-08-09 09:14:27",
                                                                                        "updated_at"=>"2020-08-09 09:14:27",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 1,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"9caa4610-becb-11ea-9b6a-9df544c173f0",
                                                                                        "previous"=>"{\"case_number\":\"5454\",\"case_version\":\"\",\"description\":null,\"priority_id\":null,\"suspect\":\"54545\",\"ttl\":3171796030,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"be6d7270-db19-11ea-9c56-49ca5f4cc543",
                                                                                        "created_at"=>"2020-08-10 14:57:00",
                                                                                        "updated_at"=>"2020-08-10 14:57:00",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 2,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"9caa4610-becb-11ea-9b6a-9df544c173f0",
                                                                                        "previous"=>"{\"case_number\":\"5454\",\"case_version\":\"\",\"description\":null,\"priority_id\":null,\"suspect\":\"54545\",\"ttl\":3171796030,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"d7faaa70-db19-11ea-a728-5dcd232b3e56",
                                                                                        "created_at"=>"2020-08-10 14:57:43",
                                                                                        "updated_at"=>"2020-08-10 14:57:43",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 3,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"9caa4610-becb-11ea-9b6a-9df544c173f0",
                                                                                        "previous"=>"{\"case_number\":\"5454\",\"case_version\":\"\",\"description\":null,\"priority_id\":null,\"suspect\":\"54545\",\"ttl\":3171796030,\"title\":null}",
                                                                                        "current"=> null
                            ] ,            [
                                                                            "id"=>"d83179a0-db19-11ea-b7d2-8b73523bb4dc",
                                                                                        "created_at"=>"2020-08-10 14:57:43",
                                                                                        "updated_at"=>"2020-08-10 14:57:43",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 4,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"9caa4610-becb-11ea-9b6a-9df544c173f0",
                                                                                        "previous"=>"{\"case_number\":\"5454\",\"case_version\":\"\",\"description\":null,\"priority_id\":null,\"suspect\":\"54545\",\"ttl\":3171796030,\"title\":null}",
                                                                                        "current"=> null
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_audit_logs')->delete();
            }
}
