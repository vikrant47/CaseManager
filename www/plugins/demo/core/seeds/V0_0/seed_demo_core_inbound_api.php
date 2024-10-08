<?php
namespace Demo\Core\Seeds\V0_0;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds engine d */
class SeedDemoCoreInboundApi implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_inbound_api')->insert([
            [
                                                                            "id"=>"6ed75cc6-467c-441a-9a45-f8a20e825452",
                                                                                        "created_at"=> null,
                                                                                        "updated_at"=>"2020-06-16 14:19:41",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "method"=>"get",
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "script"=>"return \$context->pathVariables;",
                                                                                        "name"=>"Test",
                                                                                        "description"=>"<p><a href=\"http://localhost:8084/engine/inbound-api/demo-casemanager/test/aditya\">http://localhost:8084/engine/inbound-api/demo-core/test/aditya</a></p>",
                                                                                        "url"=>"/test/{name}",
                                                                                        "active"=> 1
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_inbound_api')->where('engine_application_id', 'dc81b635-1d0a-4f3e-83af-13642d56abe4')->delete();
            }
}
