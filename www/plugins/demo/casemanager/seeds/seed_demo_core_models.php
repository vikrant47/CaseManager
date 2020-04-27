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
                                                                            "id"=> 504,
                                                                                        "created_at"=>"2020-04-27 10:59:17",
                                                                                        "updated_at"=>"2020-04-27 11:06:05",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Case Priority",
                                                                                        "model"=>"Demo\Casemanager\Models\CasePriority",
                                                                                        "controller"=>"Demo\Casemanager\Controllers\CasePriority",
                                                                                        "plugin_id"=> 6,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=> 0,
                                                                                        "description"=> "",
                                                                                        "attach_audited_by"=> false,
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
                            ] ,            [
                                                                            "id"=> 505,
                                                                                        "created_at"=>"2020-04-27 11:51:21",
                                                                                        "updated_at"=>"2020-04-27 11:55:17",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Project",
                                                                                        "model"=>"Demo\Casemanager\Models\Project",
                                                                                        "controller"=>"Demo\Casemanager\Controllers\ProjectController",
                                                                                        "plugin_id"=> 6,
                                                                                        "audit"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=> 0,
                                                                                        "description"=> "",
                                                                                        "attach_audited_by"=> false,
                                                                                        "viewable"=> false
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_models')->where('plugin_id', 6)->delete();
            }
}
