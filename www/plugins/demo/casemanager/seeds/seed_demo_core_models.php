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
                "id" => 41,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Case Model",
                "model_type" => "Demo\Casemanager\Models\CaseModel",
                "plugin_id" => 6,
                "audit" => 1,
                "record_history" => false,
                "audit_columns" => "[\"*\"]",
                "attach_audited_by" => 1,
                "description" => ""
            ], [
                "id" => 42,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Case Priority",
                "model_type" => "Demo\Casemanager\Models\CasePriority",
                "plugin_id" => 6,
                "audit" => 1,
                "record_history" => false,
                "audit_columns" => "[\"*\"]",
                "attach_audited_by" => 1,
                "description" => ""
            ]]);
    }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
        Db::table('demo_core_models')->where('plugin_id', 6)->delete();
    }
}
