<?php

namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Casemanager d */
class SeedDemoCoreInboundApi implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
        Db::table('demo_core_inbound_api')->insert([
            [
                'id' => '1',
                'created_at' => null,
                'updated_at' => '2020-03-16 05:05:03',
                'created_by_id' => '1',
                'updated_by_id' => '1',
                'method' => '0',
                'script' => '0',
                'name' => '0',
                'description' => 'false',
                'url' => '0',
                'plugin_id' => '6',
                'active' => '1'
            ]]);
    }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
        Db::table('demo_core_inbound_api')->where('plugin_id', 6)->delete();
    }
}
