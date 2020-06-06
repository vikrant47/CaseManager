<?php namespace Demo\Notification\Models;

use Demo\Core\Classes\Beans\ScriptContext;
use Demo\Core\Classes\Helpers\PluginConnection;
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

    const IGNORE_MODELS = [NotificationLog::class];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_notification_notifications';
public $incrementing = false;

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
        'model_ref' => [ModelModel::class, 'key' => 'model', 'otherKey' => 'model'],
    ];
    public $hasMany = [
        'subscribers' => [NotificationSubscriber::class, 'key' => 'notification_id']
    ];

    public function getSubscribers()
    {
        $subscriberCollection = new Collection();
        if (!empty($this->subscribers)) {
            foreach ($this->subscribers as $subscriber) {
                if (!empty($subscriber->subscriber_group_id)) {
                    $subscriberCollection = $subscriberCollection->concat($subscriber->subscriber_group->users);
                }
                if (!empty($subscriber->subscriber_id)) {
                    $subscriberCollection->push($subscriber->subscriber);
                }
            }
        }
        return $subscriberCollection;
    }

    public function send($context)
    {
        $pluginConnection = PluginConnection::getConnection('demo.notification');
        $logger = $pluginConnection->getPluginLogger();
        $condition = $this->condition;
        $scriptContext = new ScriptContext();
        if (trim(strlen($condition)) === 0 || $scriptContext->execute($condition, $context) === true) {
            $notificationLog = new NotificationLog();
            $notificationLog->notification_id = $this->id;
            try {
                $this->channel->sendNotification($this, $context);
                $notificationLog->delivered = true;
                $notificationLog->status = 'success';
            } catch (\Exception $ex) {
                $notificationLog->delivered = false;
                $notificationLog->status = $ex->getMessage();
                $logger->error('Error while sending notification '.$ex->getMessage());
            }
            if ($this->enable_logging) {
                $notificationLog->save();
            }
        }
    }
}
