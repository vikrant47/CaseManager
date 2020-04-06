<?php

namespace Demo\Report\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Report d */
class SeedDemoCoreModels implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
        Db::table('demo_core_models')->insert([
            [
                "id" => 31,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Widget",
                "model_type" => "Demo\Report\Models\Widget",
                "plugin_id" => 14,
                "audit" => false,
                "record_history" => false,
                "audit_columns" => "[\"*\"]",
                "attach_audited_by" => 1,
                "description" => null
            ], [
                "id" => 32,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "name" => "Dashboard",
                "model_type" => "Demo\Report\Models\Dashboard",
                "plugin_id" => 14,
                "audit" => false,
                "record_history" => false,
                "audit_columns" => "[\"*\"]",
                "attach_audited_by" => 1,
                "description" => null
            ]]);
    }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
        Db::table('demo_core_models')->where('plugin_id', 14)->delete();
    }
}
