<?php
namespace Demo\Core\Seeds\V0_0;

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
                                                                            "id"=>"56e6de90-1284-11eb-8697-f5fe6837d1b2",
                                                                                        "created_at"=>"2020-10-20 03:28:36",
                                                                                        "updated_at"=>"2020-10-20 03:28:36",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "operation"=>"updating",
                                                                                        "record_id"=>"50f30cd0-1284-11eb-aca1-e33fe7157c22",
                                                                                        "previous"=>"{\"title\":null,\"description\":null,\"priority_id\":\"4e54bbc0-0337-11eb-a34b-4f9f239ba7b3\",\"case_number\":\"78\",\"case_version\":\"543\",\"suspect\":\"876\",\"ttl\":null}",
                                                                                        "current"=> null
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_audit_logs')->delete();
            }
}
