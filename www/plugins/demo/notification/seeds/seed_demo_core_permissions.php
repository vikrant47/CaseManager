<?php
namespace Demo\Notification\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Notification d */
class SeedDemoCorePermissions implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_permissions')->insert([
            [
                                                                            "id"=> 158,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-28 14:43:57",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 15,
                                                                                        "model"=>"Demo\Notification\Models\NotificationChannel",
                                                                                        "operation"=>"read",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.notification::models.notificationchannel.row.read",
                                                                                        "name"=>"Notification Channel Read Permission",
                                                                                        "description"=> null,
                                                                                        "active"=> 1,
                                                                                        "system"=> 1,
                                                                                        "admin_override"=> 1
                            ] ,            [
                                                                            "id"=> 159,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-28 14:43:57",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 15,
                                                                                        "model"=>"Demo\Notification\Models\NotificationChannel",
                                                                                        "operation"=>"write",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.notification::models.notificationchannel.row.write",
                                                                                        "name"=>"Notification Channel Write Permission",
                                                                                        "description"=> null,
                                                                                        "active"=> 1,
                                                                                        "system"=> 1,
                                                                                        "admin_override"=> 1
                            ] ,            [
                                                                            "id"=> 160,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-28 14:43:57",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 15,
                                                                                        "model"=>"Demo\Notification\Models\NotificationChannel",
                                                                                        "operation"=>"create",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.notification::models.notificationchannel.row.create",
                                                                                        "name"=>"Notification Channel Create Permission",
                                                                                        "description"=> null,
                                                                                        "active"=> 1,
                                                                                        "system"=> 1,
                                                                                        "admin_override"=> 1
                            ] ,            [
                                                                            "id"=> 161,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-28 14:43:57",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 15,
                                                                                        "model"=>"Demo\Notification\Models\NotificationChannel",
                                                                                        "operation"=>"delete",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.notification::models.notificationchannel.row.delete",
                                                                                        "name"=>"Notification Channel Delete Permission",
                                                                                        "description"=> null,
                                                                                        "active"=> 1,
                                                                                        "system"=> 1,
                                                                                        "admin_override"=> 1
                            ] ,            [
                                                                            "id"=> 162,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-28 14:43:57",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 15,
                                                                                        "model"=>"Demo\Notification\Models\Notification",
                                                                                        "operation"=>"read",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.notification::models.notification.row.delete",
                                                                                        "name"=>"Notification Read Permission",
                                                                                        "description"=> null,
                                                                                        "active"=> 1,
                                                                                        "system"=> 1,
                                                                                        "admin_override"=> 1
                            ] ,            [
                                                                            "id"=> 163,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-28 14:43:57",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 15,
                                                                                        "model"=>"Demo\Notification\Models\Notification",
                                                                                        "operation"=>"write",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.notification::models.notification.row.write",
                                                                                        "name"=>"Notification Write Permission",
                                                                                        "description"=> null,
                                                                                        "active"=> 1,
                                                                                        "system"=> 1,
                                                                                        "admin_override"=> 1
                            ] ,            [
                                                                            "id"=> 164,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-28 14:43:57",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 15,
                                                                                        "model"=>"Demo\Notification\Models\Notification",
                                                                                        "operation"=>"create",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.notification::models.notification.row.create",
                                                                                        "name"=>"Notification Create Permission",
                                                                                        "description"=> null,
                                                                                        "active"=> 1,
                                                                                        "system"=> 1,
                                                                                        "admin_override"=> 1
                            ] ,            [
                                                                            "id"=> 165,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-28 14:43:57",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 15,
                                                                                        "model"=>"Demo\Notification\Models\Notification",
                                                                                        "operation"=>"delete",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.notification::models.notification.row.delete",
                                                                                        "name"=>"Notification Delete Permission",
                                                                                        "description"=> null,
                                                                                        "active"=> 1,
                                                                                        "system"=> 1,
                                                                                        "admin_override"=> 1
                            ] ,            [
                                                                            "id"=> 166,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-28 14:43:57",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 15,
                                                                                        "model"=>"Demo\Notification\Models\NotificationSubscriber",
                                                                                        "operation"=>"read",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.notification::models.notificationsubscriber.row.delete",
                                                                                        "name"=>"NotificationSubscriber Read Permission",
                                                                                        "description"=> null,
                                                                                        "active"=> 1,
                                                                                        "system"=> 1,
                                                                                        "admin_override"=> 1
                            ] ,            [
                                                                            "id"=> 167,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-28 14:43:57",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 15,
                                                                                        "model"=>"Demo\Notification\Models\NotificationSubscriber",
                                                                                        "operation"=>"write",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.notification::models.notificationsubscriber.row.write",
                                                                                        "name"=>"NotificationSubscriber Write Permission",
                                                                                        "description"=> null,
                                                                                        "active"=> 1,
                                                                                        "system"=> 1,
                                                                                        "admin_override"=> 1
                            ] ,            [
                                                                            "id"=> 168,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-28 14:43:57",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 15,
                                                                                        "model"=>"Demo\Notification\Models\NotificationSubscriber",
                                                                                        "operation"=>"create",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.notification::models.notificationsubscriber.row.create",
                                                                                        "name"=>"NotificationSubscriber Create Permission",
                                                                                        "description"=> null,
                                                                                        "active"=> 1,
                                                                                        "system"=> 1,
                                                                                        "admin_override"=> 1
                            ] ,            [
                                                                            "id"=> 169,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-28 14:43:57",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "plugin_id"=> 15,
                                                                                        "model"=>"Demo\Notification\Models\NotificationSubscriber",
                                                                                        "operation"=>"delete",
                                                                                        "columns"=> null,
                                                                                        "condition"=> null,
                                                                                        "code"=>"demo.notification::models.notificationsubscriber.row.delete",
                                                                                        "name"=>"NotificationSubscriber Delete Permission",
                                                                                        "description"=> null,
                                                                                        "active"=> 1,
                                                                                        "system"=> 1,
                                                                                        "admin_override"=> 1
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_permissions')->where('plugin_id', 15)->delete();
            }
}
