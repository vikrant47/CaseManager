<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Casemanager d */
class SeedDemoCoreModels implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_models')->insert([
            [
                                                                            "id"=> 42,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Case Priority",
                                                                                        "model"=>"Demo\Casemanager\Models\CasePriority",
                                                                                        "controller"=>"Demo\Casemanager\Controllers\CasePriorityController",
                                                                                        "plugin_id"=> 6,
                                                                                        "audit"=> 1,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\"*\"]",
                                                                                        "description"=> "",
                                                                                        "attach_audited_by"=> 1,
                                                                                        "viewable"=> false
                            ] ,            [
                                                                            "id"=> 41,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2020-04-12 15:57:19",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Case Model",
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "controller"=>"Demo\Casemanager\Controllers\CaseController",
                                                                                        "plugin_id"=> 6,
                                                                                        "audit"=> 1,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\"*\"]",
                                                                                        "description"=> "",
                                                                                        "attach_audited_by"=> 1,
                                                                                        "viewable"=> false
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_models')->where('plugin_id', 6)->delete();
            }
}
