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
                                                                            "id"=>"34a6cd93-49e4-4dbf-b7d0-e825970d493d",
                                                                                        "created_at"=>"2020-04-27 11:51:21",
                                                                                        "updated_at"=>"2020-04-27 11:55:17",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Project",
                                                                                        "model"=>"Demo\Casemanager\Models\Project",
                                                                                        "controller"=>"Demo\Casemanager\Controllers\ProjectController",
                                                                                        "engine_application_id"=> "df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "audit"=> false,
                                                                                        "viewable"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=> 0,
                                                                                        "description"=> "",
                                                                                        "attach_audited_by"=> false
                            ] ,            [
                                                                            "id"=>"31efb248-96f7-40fa-aa07-56838b66dfab",
                                                                                        "created_at"=>"2020-04-27 10:59:17",
                                                                                        "updated_at"=>"2020-04-27 11:06:05",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Case Priority",
                                                                                        "model"=>"Demo\Casemanager\Models\CasePriority",
                                                                                        "controller"=>"Demo\Casemanager\Controllers\CasePriorityController",
                                                                                        "engine_application_id"=> "df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "audit"=> false,
                                                                                        "viewable"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=> 0,
                                                                                        "description"=> "",
                                                                                        "attach_audited_by"=> false
                            ] ,            [
                                                                            "id"=>"a32f3a77-e9ef-4366-9a62-ff9c2275ada3",
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2020-06-01 13:38:12",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Case Model",
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "controller"=>"Demo\Casemanager\Controllers\CaseController",
                                                                                        "engine_application_id"=> "df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "audit"=> 1,
                                                                                        "viewable"=> false,
                                                                                        "record_history"=> false,
                                                                                        "audit_columns"=>"[\"case_number\",\"case_version\",\"description\",\"priority_id\",\"suspect\",\"tat_duration\",\"title\"]",
                                                                                        "description"=> "",
                                                                                        "attach_audited_by"=> 1
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_models')->where('engine_application_id', 'df07f9b4-26c1-40ca-ba1f-1b77b1692b83')->delete();
            }
}
