<?php
namespace Demo\Workflow\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Workflow d */
class SeedDemoCoreSecurityPolicies implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_security_policies')->insert([
            [
                                                                            "id"=>"e9d3df0c-da53-4ead-93c8-53b08cddec40",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Item Security Policy-2",
                                                                                        "description"=>"Security Policy for all operations on Queue Item",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"b4d18d6e-fb92-4a5a-8223-c5b18b7b3eb6",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Pop Criteria Security Policy-2",
                                                                                        "description"=>"Security Policy for all operations on Queue Pop Criteria",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"37ff64b4-7584-4f8a-ad6b-8d736237738c",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Routing Rule Security Policy-2",
                                                                                        "description"=>"Security Policy for all operations on Queue Routing Rule",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"f6ff3253-e8ca-4897-9f1b-6bbcaf27b53d",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Report Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Report",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"4cc3ad2e-d9ad-4661-9359-e9bbb2af4bea",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Report Item Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Report Item",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"1e657cff-ed04-4ecd-9a2c-ec8026339c76",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Report State Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Report State",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"e326190a-0c2a-4ee6-a653-44fbd07d7280",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Report Transition Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Report Transition",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"ea90a52a-a1cf-4cb1-9034-812dcb426013",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Security Policy-3",
                                                                                        "description"=>"Security Policy for all operations on Queue",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"5560fa3f-b5fb-44a1-90ce-1389ca9d6fb6",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Item Security Policy-3",
                                                                                        "description"=>"Security Policy for all operations on Queue Item",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"33985503-c882-48d6-b5b0-642cb22534e8",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Pop Criteria Security Policy-3",
                                                                                        "description"=>"Security Policy for all operations on Queue Pop Criteria",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"c2065c15-5a22-440c-8f5d-3cdadf90e134",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Routing Rule Security Policy-3",
                                                                                        "description"=>"Security Policy for all operations on Queue Routing Rule",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"ae9d2447-a2a5-438a-a858-78f87cb268f4",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Report Security Policy-1",
                                                                                        "description"=>"Security Policy for all operations on Report",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"374cfefb-036b-494b-86b6-f07cf9f926d4",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Report Item Security Policy-1",
                                                                                        "description"=>"Security Policy for all operations on Report Item",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"fc324cdd-7389-4822-a225-4e2ef13a3977",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Report State Security Policy-1",
                                                                                        "description"=>"Security Policy for all operations on Report State",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"edcf6bbd-7608-46cb-a2f3-0009d3c470f8",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Workflow Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Workflow",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"c6c9b4a3-4f41-40cd-bf63-8bea2b7e6c1d",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Workflow Item Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Workflow Item",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"903f9819-1f28-41be-9e17-269de41fb03e",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Workflow State Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Workflow State",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"34dcb7e6-c79e-45d2-8be1-288fe3c93c43",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Workflow Transition Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Workflow Transition",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"6db49445-ffd8-45e2-9e48-58acdb68cc4a",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Webhook Security Policy -1",
                                                                                        "description"=>"Security Policy for all operations on Webhook",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"2c123f65-fb4f-45cf-9081-4d9778b9b4f4",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Widget Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Widget",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"9c3f08d1-38b4-49aa-8448-ead1e7b94c7b",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-28 14:43:57",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Dashboard Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Dashboard",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"2dbf918f-3a08-4063-8c4c-a2ac91d4a379",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Queue",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"7c475e9d-5de0-43f1-baff-8040536271ec",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Item Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Queue Item",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"4ea8aa69-562b-43cd-b120-d4bd4ec3443f",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Pop Criteria Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Queue Pop Criteria",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"b05ab329-e7c8-4f67-8582-9ddb815cebc6",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Routing Rule Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Queue Routing Rule",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"dec5e22e-148d-4967-95fc-25361b7883f6",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Security Policy-1",
                                                                                        "description"=>"Security Policy for all operations on Queue",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"7bf1dc35-9926-48ca-bef3-130810591a27",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Item Security Policy-1",
                                                                                        "description"=>"Security Policy for all operations on Queue Item",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"72a3cc6b-9ac4-45ae-9e42-1b55234a0a70",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Pop Criteria Security Policy-1",
                                                                                        "description"=>"Security Policy for all operations on Queue Pop Criteria",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"f80c615a-7667-454a-93c5-715810fe3925",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Routing Rule Security Policy-1",
                                                                                        "description"=>"Security Policy for all operations on Queue Routing Rule",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"5a54e6fa-40bd-47ee-bd49-e503f4513b16",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Workflow Security Policy-1",
                                                                                        "description"=>"Security Policy for all operations on Workflow",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"7c11d2f9-ea6d-4a10-b3b0-f48d0a55cb05",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Workflow Item Security Policy-1",
                                                                                        "description"=>"Security Policy for all operations on Workflow Item",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"2953e60d-78d7-4c96-9521-6811b0a5004d",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Workflow State Security Policy-1",
                                                                                        "description"=>"Security Policy for all operations on Workflow State",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"6dbb7992-fcc6-4420-b83b-6c53893c8511",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Workflow Transition Security Policy-1",
                                                                                        "description"=>"Security Policy for all operations on Workflow Transition",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"b183a2c6-c0b8-46a3-8082-f73e8effca45",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Webhook Security Policy -2",
                                                                                        "description"=>"Security Policy for all operations on Webhook",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ] ,            [
                                                                            "id"=>"ab26cd31-0c57-4ec8-adc2-3a00945f2831",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Security Policy-2",
                                                                                        "description"=>"Security Policy for all operations on Queue",
                                                                                        "engine_application_id"=> "8374144e-94a5-470d-8d9e-4cbad05102ad"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_security_policies')->where('engine_application_id', '8374144e-94a5-470d-8d9e-4cbad05102ad')->delete();
            }
}
