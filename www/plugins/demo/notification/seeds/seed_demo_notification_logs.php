<?php

namespace Demo\Notification\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Notification d */
class SeedDemoNotificationLogs implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
        Db::table('demo_notification_logs')->insert([
            [
                "id" => 1,
                "created_at" => "2019-12-27 16:40:07",
                "updated_at" => "2019-12-27 16:40:07",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "notification_id" => 2,
                "status" => "success",
                "delivered" => 1
            ], [
                "id" => 2,
                "created_at" => "2019-12-27 16:40:47",
                "updated_at" => "2019-12-27 16:40:47",
                "created_by_id" => 1,
                "updated_by_id" => 1,
                "notification_id" => 2,
                "status" => "success",
                "delivered" => 1
            ]]);
    }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
        Db::table('demo_notification_logs')->delete();
    }
}
