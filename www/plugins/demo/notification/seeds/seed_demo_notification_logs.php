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
                                                                            "created_at"=>"2019-12-27 16:40:07",
                                                                                        "updated_at"=>"2019-12-27 16:40:07",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "delivered"=> 1,
                                                                                        "status"=>"success",
                                                                                        "id"=>"8bfbe7f0-5efb-4771-bc85-ade436886ebd",
                                                                                        "notification_id"=> null
                            ] ,            [
                                                                            "created_at"=>"2019-12-27 16:40:47",
                                                                                        "updated_at"=>"2019-12-27 16:40:47",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "delivered"=> 1,
                                                                                        "status"=>"success",
                                                                                        "id"=>"402fb32e-a2d5-4e38-a327-46ecd7e2e347",
                                                                                        "notification_id"=> null
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_notification_logs')->delete();
            }
}
