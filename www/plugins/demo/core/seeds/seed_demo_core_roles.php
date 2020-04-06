<?php

namespace Demo\Core\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Core d */
class SeedDemoCoreRoles implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
        Db::table('demo_core_roles')->insert([
            [
                "id" => 1,
                "created_at" => "2019-12-20 14:15:39",
                "updated_at" => "2019-12-20 14:15:39",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "plugin_id" => 10,
                "code" => "admin",
                "name" => "Administrator",
                "description" => "Admin of the platform"
            ]]);
    }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
        Db::table('demo_core_roles')->where('plugin_id', 10)->delete();
    }
}
