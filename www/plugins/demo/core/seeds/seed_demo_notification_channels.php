<?php
namespace Demo\Core\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds engine d */
class SeedDemoNotificationChannels implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_notification_channels')->insert([
            [
                                                                            "id"=>"24647a4c-dbcf-44b0-9704-cc4d5760d6b2",
                                                                                        "created_at"=>"2019-12-25 14:14:11",
                                                                                        "updated_at"=>"2019-12-27 15:16:37",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "script"=>"\$fromUser = \$context->self->getConfig('from_user');\r\n\$notification = \$context->notification;\r\n\$subscribers = \$notification->getSubscribers();\r\n\$template = \$notification->template;\r\nforeach(\$subscribers as \$subscriber){\r\n    \$context->Mail::queue(\$template->code, \$context->toArray() , function(\$message) use(\$notification,\$template,\$subscriber) {\r\n        \$message->to( \$subscriber->email, \$subscriber->first_name.' '.\$subscriber->last_name);    \r\n    });    \r\n}",
                                                                                        "configuration"=>"[{\"configuration\":\"from_user\",\"value\":\"test@test.com\"}]",
                                                                                        "active"=> 1,
                                                                                        "engine_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "name"=>"Queued Email Channel",
                                                                                        "description"=>"Email Notification channel"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_notification_channels')->where('engine_application_id', 'dc81b635-1d0a-4f3e-83af-13642d56abe4')->delete();
            }
}
