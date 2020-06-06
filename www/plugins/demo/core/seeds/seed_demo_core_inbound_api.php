<?php
namespace Demo\Core\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Core d */
class SeedDemoCoreInboundApi implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_inbound_api')->insert([
            [
                                                                            "created_at"=> null,
                                                                                        "updated_at"=>"2020-04-26 08:37:10",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "method"=>"get",
                                                                                        "plugin_id"=> 10,
                                                                                        "script"=>"return \$context->pathVariables;",
                                                                                        "name"=>"Test",
                                                                                        "description"=>"<p><a href=\"http://localhost:8084/engine/inbound-api/demo-casemanager/test/aditya\">http://localhost:8084/engine/inbound-api/demo-casemanager/test/aditya</a> </p>",
                                                                                        "url"=>"/test/{name}",
                                                                                        "active"=> 1,
                                                                                        "id"=>"6ed75cc6-467c-441a-9a45-f8a20e825452"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_inbound_api')->where('plugin_id', 10)->delete();
            }
}
