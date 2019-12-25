<?php namespace Demo\Notification\Models;

use Demo\Core\Models\ModelModel;
use Demo\Core\Models\PluginVersions;
use Model;
use October\Rain\Support\Collection;
use System\Models\MailTemplate;

/**
 * Model
 */
class Notification extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_notification_notifications';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $attachAuditedBy = true;

    public $belongsTo = [
        'plugin' => [PluginVersions::class, 'key' => 'plugin_id'],
        'channel' => [NotificationChannel::class, 'key' => 'channel_id'],
        'template' => [MailTemplate::class, 'key' => 'template_id'],
        'model_ref' => [ModelModel::class, 'key' => 'model', 'otherKey' => 'model_type'],
    ];
    public $hasMany = [
        'subscribers' => [NotificationSubscriber::class, 'key' => 'notification_id']
    ];

    public function getSubscribers()
    {
        $subscribers = new Collection();
        if (!empty($this->subscribers)) {
            foreach ($this->subscribers as $subscriber) {
                $users = new Collection();
                if (!empty($subscriber->subscriber_group_id)) {
                    $users->concat($subscriber->subscriber_group->users);
                }
                if (!empty($subscriber->subscriber_user_id)) {
                    $users->push($subscriber->subscriber);
                }
            }
        }
        return $subscribers;
    }

    public function send($context)
    {
        $this->channel->sendNotification($this, $context);
    }
}
