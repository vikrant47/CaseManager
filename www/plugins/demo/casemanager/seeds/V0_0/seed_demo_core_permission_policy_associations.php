<?php
namespace Demo\Casemanager\Seeds\V0_0;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds casemanager d */
class SeedDemoCorePermissionPolicyAssociations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_permission_policy_associations')->insert([
            [
                                                                            "id"=>"67581199-e83d-46bd-bd92-1e460b2f9dd4",
                                                                                        "created_at"=>"2020-04-27 10:59:16",
                                                                                        "updated_at"=>"2020-04-27 10:59:16",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "permission_id"=>"35fce9b9-8b6a-4a92-a214-6d4e554f1e81",
                                                                                        "policy_id"=>"0dcd7801-d4ae-439d-907d-950b72a9f24d"
                            ] ,            [
                                                                            "id"=>"787477ce-e48d-4599-ada9-0fc0f6ad0c0e",
                                                                                        "created_at"=>"2020-04-27 10:59:16",
                                                                                        "updated_at"=>"2020-04-27 10:59:16",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "permission_id"=>"b4e3b6cb-ebb1-4fbc-bc65-f59a2008da61",
                                                                                        "policy_id"=>"0dcd7801-d4ae-439d-907d-950b72a9f24d"
                            ] ,            [
                                                                            "id"=>"486dfb69-5b72-418f-903e-ffc9405ca949",
                                                                                        "created_at"=>"2020-04-27 10:59:16",
                                                                                        "updated_at"=>"2020-04-27 10:59:16",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "permission_id"=>"58faebcc-6b97-4b46-9e9e-0070f1556837",
                                                                                        "policy_id"=>"0dcd7801-d4ae-439d-907d-950b72a9f24d"
                            ] ,            [
                                                                            "id"=>"d4954d73-557b-44ad-acdf-b241446c3473",
                                                                                        "created_at"=>"2020-04-27 10:59:17",
                                                                                        "updated_at"=>"2020-04-27 10:59:17",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "permission_id"=>"50880924-3110-478c-b01b-63c5c456edeb",
                                                                                        "policy_id"=>"0dcd7801-d4ae-439d-907d-950b72a9f24d"
                            ] ,            [
                                                                            "id"=>"e0c0ab2b-702b-4f1a-938c-cc2e88430c76",
                                                                                        "created_at"=>"2020-04-06 07:56:24",
                                                                                        "updated_at"=>"2020-04-06 07:56:24",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "permission_id"=>"973f538e-62d3-4570-90d1-0310970e3046",
                                                                                        "policy_id"=>"694b6dcf-0017-4013-bc71-c7d71dae6a3a"
                            ] ,            [
                                                                            "id"=>"42f94486-0be0-4147-8bea-3239fba28929",
                                                                                        "created_at"=>"2020-04-06 07:56:24",
                                                                                        "updated_at"=>"2020-04-06 07:56:24",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "permission_id"=>"687046cf-9692-4292-ad35-efce1aaf42d4",
                                                                                        "policy_id"=>"694b6dcf-0017-4013-bc71-c7d71dae6a3a"
                            ] ,            [
                                                                            "id"=>"7996970e-e126-4cb0-890d-52c4e9978279",
                                                                                        "created_at"=>"2020-04-06 07:56:24",
                                                                                        "updated_at"=>"2020-04-06 07:56:24",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "permission_id"=>"dab8870c-1ba8-4846-b9b7-00bbd39ec3a4",
                                                                                        "policy_id"=>"694b6dcf-0017-4013-bc71-c7d71dae6a3a"
                            ] ,            [
                                                                            "id"=>"75366ff5-4245-43e0-85cf-daa491b283ab",
                                                                                        "created_at"=>"2020-04-06 07:56:24",
                                                                                        "updated_at"=>"2020-04-06 07:56:24",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "permission_id"=>"36edd8af-c53b-4f2b-9fb7-461f741a7676",
                                                                                        "policy_id"=>"694b6dcf-0017-4013-bc71-c7d71dae6a3a"
                            ] ,            [
                                                                            "id"=>"01435073-e0a3-4c82-9a89-09972e76083a",
                                                                                        "created_at"=>"2020-04-06 07:58:19",
                                                                                        "updated_at"=>"2020-04-06 07:58:19",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "permission_id"=>"df0f2fe6-9528-421b-8462-81491b982d82",
                                                                                        "policy_id"=>"7d48cc5f-ae88-47fa-a29e-5566e08fe187"
                            ] ,            [
                                                                            "id"=>"02b5491f-3570-4e80-b98b-4f25ad3e4570",
                                                                                        "created_at"=>"2020-04-06 07:58:19",
                                                                                        "updated_at"=>"2020-04-06 07:58:19",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "permission_id"=>"f20adac9-f180-4720-b892-b58cf18f3166",
                                                                                        "policy_id"=>"7d48cc5f-ae88-47fa-a29e-5566e08fe187"
                            ] ,            [
                                                                            "id"=>"7698cecd-fd07-407e-b753-3a9783dd620b",
                                                                                        "created_at"=>"2020-04-06 07:58:19",
                                                                                        "updated_at"=>"2020-04-06 07:58:19",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "permission_id"=>"167aea1d-751c-4064-b7b4-b7a9a7e474ac",
                                                                                        "policy_id"=>"7d48cc5f-ae88-47fa-a29e-5566e08fe187"
                            ] ,            [
                                                                            "id"=>"0f48afa9-1fa6-4293-8f99-0cba3214bcf8",
                                                                                        "created_at"=>"2020-04-06 07:58:19",
                                                                                        "updated_at"=>"2020-04-06 07:58:19",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "permission_id"=>"9662eafc-606b-4108-b60a-28554776a560",
                                                                                        "policy_id"=>"7d48cc5f-ae88-47fa-a29e-5566e08fe187"
                            ] ,            [
                                                                            "id"=>"f8849559-4a6b-4d45-8ac1-3bdcaafe9713",
                                                                                        "created_at"=>"2020-04-27 11:51:21",
                                                                                        "updated_at"=>"2020-04-27 11:51:21",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "permission_id"=>"b6ccd813-b2c9-4df1-961c-04df2031a3a9",
                                                                                        "policy_id"=>"b70d97bf-4ef2-4fa1-bc21-332b0bf6aef9"
                            ] ,            [
                                                                            "id"=>"e7f1da3f-8a84-4666-b074-d78f750b52c8",
                                                                                        "created_at"=>"2020-04-27 11:51:21",
                                                                                        "updated_at"=>"2020-04-27 11:51:21",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "permission_id"=>"9dd592de-c8bf-4c60-ae3f-5b48a49ed314",
                                                                                        "policy_id"=>"b70d97bf-4ef2-4fa1-bc21-332b0bf6aef9"
                            ] ,            [
                                                                            "id"=>"e83ae886-96bf-44af-a4a2-79e612f0d308",
                                                                                        "created_at"=>"2020-04-27 11:51:21",
                                                                                        "updated_at"=>"2020-04-27 11:51:21",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "permission_id"=>"2fe02db1-77fd-43eb-9cb6-e1c84b44bf7b",
                                                                                        "policy_id"=>"b70d97bf-4ef2-4fa1-bc21-332b0bf6aef9"
                            ] ,            [
                                                                            "id"=>"28db10b3-bd87-453b-abcf-dd90ea00e201",
                                                                                        "created_at"=>"2020-04-27 11:51:21",
                                                                                        "updated_at"=>"2020-04-27 11:51:21",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "permission_id"=>"c17220cd-f6f5-4912-9dfd-5045a93604a9",
                                                                                        "policy_id"=>"b70d97bf-4ef2-4fa1-bc21-332b0bf6aef9"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_permission_policy_associations')->where('engine_application_id', 'df07f9b4-26c1-40ca-ba1f-1b77b1692b83')->delete();
            }
}
