<?php
namespace Demo\Core\Seeds\V0_0;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds engine d */
class SeedDemoCoreViewRoleAssociations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_view_role_associations')->insert([
            [
                                                                            "id"=>"58d970c0-08a9-11eb-8532-cd1941a2b82c",
                                                                                        "created_at"=>"2020-10-07 14:28:19",
                                                                                        "updated_at"=>"2020-10-07 14:28:19",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"1e73e4d1-f263-4744-a537-ab2d22d90e3c",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"3dc6a200-09de-11eb-be36-e1a8cfde2ad2",
                                                                                        "created_at"=>"2020-10-09 03:19:28",
                                                                                        "updated_at"=>"2020-10-09 03:19:28",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"d044112f-9928-4685-b9c5-acb536b15a84",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"62f5edf0-09dd-11eb-a4ca-a50374c45ca1",
                                                                                        "created_at"=>"2020-10-09 03:13:21",
                                                                                        "updated_at"=>"2020-10-09 03:13:21",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"fdf384c5-bdb6-4294-81a4-af302b12b332",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"62f71340-09dd-11eb-ad47-ad04f9073514",
                                                                                        "created_at"=>"2020-10-09 03:13:21",
                                                                                        "updated_at"=>"2020-10-09 03:13:21",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"fdf384c5-bdb6-4294-81a4-af302b12b332",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"67807ae0-09de-11eb-806d-4dc6961aa994",
                                                                                        "created_at"=>"2020-10-09 03:20:38",
                                                                                        "updated_at"=>"2020-10-09 03:20:38",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"5080c46a-c9d4-45dc-93d0-8835e4731f4d",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"015d16e0-a7f9-11ea-b64b-57ce9dae3cd2",
                                                                                        "created_at"=>"2020-06-06 13:24:09",
                                                                                        "updated_at"=>"2020-06-06 13:24:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"ff393331-f802-4f3c-98f9-93a5c070102f",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"7d1832a7-efbf-4316-88c1-e06fbddb1d5a",
                                                                                        "created_at"=>"2020-06-06 13:24:09",
                                                                                        "updated_at"=>"2020-06-06 13:24:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"05e13a5f-d931-4328-84ed-100acf537174",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"d870ffa2-bb86-433a-a0ea-137e60f428f7",
                                                                                        "created_at"=>"2020-06-06 13:24:09",
                                                                                        "updated_at"=>"2020-06-06 13:24:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"6dfa72ba-9fe1-4d81-aed2-dc945f0ef502",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"935ace2c-7c50-4e6c-854d-54dfe5e45e1d",
                                                                                        "created_at"=>"2020-06-06 13:24:09",
                                                                                        "updated_at"=>"2020-06-06 13:24:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"85546192-4e1a-4dea-95fe-b8ebcc758b0d",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"134d1ab3-4b5b-49e9-b5f4-43183d544111",
                                                                                        "created_at"=>"2020-06-06 13:24:09",
                                                                                        "updated_at"=>"2020-06-06 13:24:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"336cc40e-0020-4959-9dfe-190f6907c80c",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"b0028f5f-91a9-4dbc-a840-8f1e6ab903ff",
                                                                                        "created_at"=>"2020-06-06 13:24:09",
                                                                                        "updated_at"=>"2020-06-06 13:24:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"15264ae2-d1b0-43f7-87fe-eda08a884bb0",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"462e5fc3-aa4d-4ab3-84e0-ce65f47e0333",
                                                                                        "created_at"=>"2020-06-06 13:24:09",
                                                                                        "updated_at"=>"2020-06-06 13:24:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"be77fb91-0909-40fe-8e23-7d094adcbd09",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"8de72ff9-0cd6-47f2-83f5-8ec75161c2d1",
                                                                                        "created_at"=>"2020-06-06 13:24:09",
                                                                                        "updated_at"=>"2020-06-06 13:24:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"be560371-c757-49b5-b1e1-8497c9150a3e",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"d099c08b-eb22-4597-b5a4-a201fef47fbe",
                                                                                        "created_at"=>"2020-06-06 13:24:09",
                                                                                        "updated_at"=>"2020-06-06 13:24:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"1b4aebe2-66f2-4984-a3d0-f69c3cfb90fc",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"aaf431a5-f15e-46a4-b883-5e1a809bc97a",
                                                                                        "created_at"=>"2020-06-06 13:24:09",
                                                                                        "updated_at"=>"2020-06-06 13:24:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"0ca975a1-b152-4289-a5aa-2d4b2453a95a",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"1c2b1e6c-b6a1-4ece-8b98-28468283321d",
                                                                                        "created_at"=>"2020-06-06 13:24:09",
                                                                                        "updated_at"=>"2020-06-06 13:24:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"84398af6-6036-43ed-b987-8f11ffb7057e",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"6c9f01fe-6d13-4756-8726-690f71054898",
                                                                                        "created_at"=>"2020-06-06 13:24:09",
                                                                                        "updated_at"=>"2020-06-06 13:24:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"bd770875-29b9-496e-afe0-44d8f777c4ed",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"567992ff-7e9a-4a65-a73a-9d18f894a54f",
                                                                                        "created_at"=>"2020-06-06 13:24:09",
                                                                                        "updated_at"=>"2020-06-06 13:24:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"1836974e-0ea8-438a-9054-d4a42692cf94",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"b63bbc96-3022-41ef-8c90-3f3a9f2831d6",
                                                                                        "created_at"=>"2020-06-06 13:24:09",
                                                                                        "updated_at"=>"2020-06-06 13:24:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"9ee0e7d0-43e9-4d8a-be8a-9d0606437956",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"245d6dc5-f335-473b-92c6-f68488f90ee4",
                                                                                        "created_at"=>"2020-06-06 13:24:09",
                                                                                        "updated_at"=>"2020-06-06 13:24:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"ed44650b-b008-456c-85de-adc1270cfbed",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"e0f00062-a811-43b8-b897-f75985b8e3c7",
                                                                                        "created_at"=>"2020-06-06 13:24:09",
                                                                                        "updated_at"=>"2020-06-06 13:24:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"03b0b444-c20a-4480-8549-67bab2b176f3",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"66f947d2-84d3-4b07-8abc-d1c4021e8fe9",
                                                                                        "created_at"=>"2020-06-06 13:24:09",
                                                                                        "updated_at"=>"2020-06-06 13:24:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"fcfcb7de-516c-415a-8ddd-3b7392c3c37f",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"c37c67dd-d031-431d-aba4-b099338159eb",
                                                                                        "created_at"=>"2020-06-06 13:24:09",
                                                                                        "updated_at"=>"2020-06-06 13:24:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"3004557a-c1b4-41c6-b4e3-3d0a4de1a52a",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"e4adfd7f-8b06-459d-afaa-cfef3616e9b4",
                                                                                        "created_at"=>"2020-06-06 13:24:09",
                                                                                        "updated_at"=>"2020-06-06 13:24:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"47fe334b-d0da-4d4f-b9a7-9b9a6e59b1b2",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"b7b860ee-c51b-449c-8ecd-101565ee4d91",
                                                                                        "created_at"=>"2020-06-06 13:24:09",
                                                                                        "updated_at"=>"2020-06-06 13:24:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"a29b979e-dcf0-4fef-9b58-cbaccecedc92",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"03e8d713-d67b-4e1c-a809-a0f9d04462c0",
                                                                                        "created_at"=>"2020-06-06 13:24:09",
                                                                                        "updated_at"=>"2020-06-06 13:24:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"a541a960-fc25-48a7-b498-8443b2715bf5",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"78e3fc14-0899-4b10-9872-dce884aa99b2",
                                                                                        "created_at"=>"2020-06-06 13:24:09",
                                                                                        "updated_at"=>"2020-06-06 13:24:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"530b5272-a8a3-43cd-af15-8ea6a8a7c822",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"55120e92-fb73-4ee6-b123-c616223a5a9c",
                                                                                        "created_at"=>"2020-06-06 13:24:09",
                                                                                        "updated_at"=>"2020-06-06 13:24:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"016140c0-a7f9-11ea-a09c-77440aa34325",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"f081035a-583c-4e43-b712-5d8c6c91dafe",
                                                                                        "created_at"=>"2020-06-06 13:24:09",
                                                                                        "updated_at"=>"2020-06-06 13:24:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"6adbdf35-29f5-468f-8d0d-4e3003f298d0",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"4ccfb9bc-a415-4e7f-a780-fd5fd7279742",
                                                                                        "created_at"=>"2020-06-06 13:24:09",
                                                                                        "updated_at"=>"2020-06-06 13:24:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"211608c8-5b81-47bf-8757-8c39889924b7",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"08b118b7-75f0-4e27-b0a8-56e9bba8b93a",
                                                                                        "created_at"=>"2020-06-06 13:24:09",
                                                                                        "updated_at"=>"2020-06-06 13:24:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"93b19b14-276d-4422-b2d4-3d4fb869de0c",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"5c193407-29ac-40da-8a8b-9cc9016a6e8f",
                                                                                        "created_at"=>"2020-06-06 13:24:09",
                                                                                        "updated_at"=>"2020-06-06 13:24:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"06df55ff-f6c2-4b71-8493-c4b74f75b640",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"3c342b9b-edca-40a0-96cb-b31b71609163",
                                                                                        "created_at"=>"2020-06-06 13:24:09",
                                                                                        "updated_at"=>"2020-06-06 13:24:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"5bec7e75-a7ff-48f0-8c90-03123697af4d",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"7d9e42d9-4bf9-449c-baa3-3c968bdec7f2",
                                                                                        "created_at"=>"2020-06-06 13:24:09",
                                                                                        "updated_at"=>"2020-06-06 13:24:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"e149e54e-ddcb-4b1b-b80b-2c37755ad953",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"fd3ef5d7-c43d-425b-a972-524261d5fb15",
                                                                                        "created_at"=>"2020-06-06 13:24:09",
                                                                                        "updated_at"=>"2020-06-06 13:24:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"88a02697-074c-4dfc-9e7c-5dd964901e21",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"7960ed15-c913-4ab5-95c8-2fd4a1e5b92f",
                                                                                        "created_at"=>"2020-06-06 13:24:09",
                                                                                        "updated_at"=>"2020-06-06 13:24:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"dcbc468c-12c8-4f92-b57c-6f05d092b1c1",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"c77efeb8-f4c7-4874-9eb3-e52947a9227c",
                                                                                        "created_at"=>"2020-06-06 13:24:09",
                                                                                        "updated_at"=>"2020-06-06 13:24:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"7b2d4011-b582-457e-8549-637b0a61f93b",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"43a7c120-a882-11ea-b37f-43811c4770f0",
                                                                                        "created_at"=>"2020-06-07 05:46:42",
                                                                                        "updated_at"=>"2020-06-07 05:46:42",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"74aa9c40-9618-4fc2-890f-35d98a81b875",
                                                                                        "model"=>"Demo\Core\Models\FormAction",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"49eab3e0-a882-11ea-a26e-4b4234bfd17c",
                                                                                        "created_at"=>"2020-06-07 05:46:52",
                                                                                        "updated_at"=>"2020-06-07 05:46:52",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"60f9be27-c475-462f-a146-40588aa0bc91",
                                                                                        "model"=>"Demo\Core\Models\FormAction",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"5ff3aab0-a882-11ea-a240-0d081a2656ed",
                                                                                        "created_at"=>"2020-06-07 05:47:29",
                                                                                        "updated_at"=>"2020-06-07 05:47:29",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"54e73d14-1a67-4327-91a7-3e5b1aa49a90",
                                                                                        "model"=>"Demo\Core\Models\FormAction",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"689aa660-a882-11ea-bcc1-49757e88087e",
                                                                                        "created_at"=>"2020-06-07 05:47:44",
                                                                                        "updated_at"=>"2020-06-07 05:47:44",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"0625b4f7-ab22-48ba-9eb2-e748cad64eab",
                                                                                        "model"=>"Demo\Core\Models\FormAction",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"f87bf680-a884-11ea-8e9f-05c2f8d3edeb",
                                                                                        "created_at"=>"2020-06-07 06:06:04",
                                                                                        "updated_at"=>"2020-06-07 06:06:04",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"d965a574-969f-40cf-a735-524cdacfe676",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"176e3870-a885-11ea-881d-cb2385427568",
                                                                                        "created_at"=>"2020-06-07 06:06:56",
                                                                                        "updated_at"=>"2020-06-07 06:06:56",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"7ffd7ee5-deb5-41af-876f-6bac700a35be",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"8b845030-0272-11eb-9f82-49f25b440f98",
                                                                                        "created_at"=>"2020-09-29 16:40:55",
                                                                                        "updated_at"=>"2020-09-29 16:40:55",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"c1021025-5a8e-4344-af1e-178dd1d1d29e",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"e41d8b50-0272-11eb-a15c-1dd94ad0514e",
                                                                                        "created_at"=>"2020-09-29 16:43:24",
                                                                                        "updated_at"=>"2020-09-29 16:43:24",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"ede0b65d-15ca-43a2-ab83-11643c154327",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"fac365b0-0272-11eb-86c3-350eb3e06440",
                                                                                        "created_at"=>"2020-09-29 16:44:02",
                                                                                        "updated_at"=>"2020-09-29 16:44:02",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"bae0b847-c210-4b91-89f7-e1f4117b1987",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"22d363c0-0273-11eb-9062-b564e56878d7",
                                                                                        "created_at"=>"2020-09-29 16:45:09",
                                                                                        "updated_at"=>"2020-09-29 16:45:09",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"8d1a72d6-e7b4-49d0-a0b0-c1d1be57f044",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"516d9a50-0273-11eb-be81-fd87e2c08e5e",
                                                                                        "created_at"=>"2020-09-29 16:46:27",
                                                                                        "updated_at"=>"2020-09-29 16:46:27",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"529c983e-43eb-4c04-b89f-24ac65ab4356",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"bc3a2080-0273-11eb-b04e-7f0f6ccc0e90",
                                                                                        "created_at"=>"2020-09-29 16:49:26",
                                                                                        "updated_at"=>"2020-09-29 16:49:26",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"a5c69317-c4fd-4618-a92b-cff6a1f1da2f",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"d106bb10-0273-11eb-8111-bf2216a12cb5",
                                                                                        "created_at"=>"2020-09-29 16:50:01",
                                                                                        "updated_at"=>"2020-09-29 16:50:01",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"485ac274-9ef0-45fa-87f7-1e77a8f6b234",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"56fae880-02d4-11eb-b3a0-dd5e61aa41cf",
                                                                                        "created_at"=>"2020-09-30 04:20:58",
                                                                                        "updated_at"=>"2020-09-30 04:20:58",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"3280cd3c-8a95-4683-b661-7846bc9fdf03",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"56fb4e60-02d4-11eb-aba5-2d3bc86b1945",
                                                                                        "created_at"=>"2020-09-30 04:20:58",
                                                                                        "updated_at"=>"2020-09-30 04:20:58",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"3280cd3c-8a95-4683-b661-7846bc9fdf03",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"71b397d0-02d5-11eb-b860-d1537fb68f89",
                                                                                        "created_at"=>"2020-09-30 04:28:52",
                                                                                        "updated_at"=>"2020-09-30 04:28:52",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"c39d8670-0206-11eb-9e06-77ef142cdb37",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"3e978f50-02d7-11eb-b0cf-d56d84a78333",
                                                                                        "created_at"=>"2020-09-30 04:41:45",
                                                                                        "updated_at"=>"2020-09-30 04:41:45",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"139f4d70-98d4-492d-84ab-99eabb2e2865",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"8f4ed8e0-0536-11eb-85b8-5b6e9e688702",
                                                                                        "created_at"=>"2020-10-03 05:09:05",
                                                                                        "updated_at"=>"2020-10-03 05:09:05",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"2741f560-c432-11ea-8b7b-b38010411630",
                                                                                        "model"=>"Demo\Core\Models\ListAction",
                                                                                        "role_id"=>"e751a812-4da9-4726-b375-8495ac2d3354",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ] ,            [
                                                                            "id"=>"9dd1a640-0852-11eb-ab16-7d3bf13594de",
                                                                                        "created_at"=>"2020-10-07 04:07:29",
                                                                                        "updated_at"=>"2020-10-07 04:07:29",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "record_id"=>"35e67af3-a99d-4be8-bfc9-ee75e912d8b1",
                                                                                        "model"=>"Demo\Core\Models\Navigation",
                                                                                        "role_id"=>"ab9cbba3-c481-4f23-85c7-37b9d8b52357",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_view_role_associations')->where('engine_application_id', 'dc81b635-1d0a-4f3e-83af-13642d56abe4')->delete();
            }
}
