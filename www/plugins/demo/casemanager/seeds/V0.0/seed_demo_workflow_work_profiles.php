<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds casemanager d */
class SeedDemoWorkflowWorkProfiles implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_workflow_work_profiles')->insert([
            [
                                                                            "id"=>"bcab2580-0649-11eb-b27d-b305dee8a6da",
                                                                                        "name"=>"Default Work Profile",
                                                                                        "description"=>"<p>Default Work Profile for handling a case</p>",
                                                                                        "channel_profiles"=>"[{\"channel\":\"6aec2f36-3de0-4131-b326-de418cb8549a\",\"capacity\":5,\"weightage\":20}]",
                                                                                        "created_at"=>"2020-10-04 13:58:53",
                                                                                        "updated_at"=>"2020-10-04 13:58:53",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_workflow_work_profiles')->where('engine_application_id', 'df07f9b4-26c1-40ca-ba1f-1b77b1692b83')->delete();
            }
}
