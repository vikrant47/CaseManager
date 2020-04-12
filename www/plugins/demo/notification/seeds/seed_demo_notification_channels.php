<?php
namespace Demo\Notification\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Notification d */
class SeedDemoNotificationChannels implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_notification_channels')->insert([
            [
                                                                            "id"=> 2,
                                                                                        "created_at"=>"2019-12-27 14:30:24",
                                                                                        "updated_at"=>"2019-12-28 04:54:07",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "script"=>"\$fromUser = \$context->self->getConfig('from_user');\r\n\$notification = \$context->notification;\r\n\$subscribers = \$notification->getSubscribers();\r\n\$template = \$notification->template;\r\n\$pluginCon = \$context->getPluginConnection('demo.notification');\r\n\$logger = \$pluginCon->getPluginLogger();\r\nforeach(\$subscribers as \$subscriber){\r\n    \$logger->debug('Sending notification '.\$template->code .' to '.\$subscriber->email);\r\n    \$context->Mail::send(\$template->code, \$context->toArray() , function(\$message) use(\$notification,\$template,\$subscriber,\$context) {\r\n        \$message->to( \$subscriber->email, \$subscriber->first_name.' '.\$subscriber->last_name);  \r\n    });    \r\n}",
                                                                                        "configuration"=>"[{\"configuration\":\"from_user\",\"value\":\"test@test.com\"}]",
                                                                                        "active"=> 1,
                                                                                        "plugin_id"=> 15,
                                                                                        "name"=>"Simple Email Channel",
                                                                                        "description"=>"Email Notification channel"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_notification_channels')->where('plugin_id', 15)->delete();
            }
}
