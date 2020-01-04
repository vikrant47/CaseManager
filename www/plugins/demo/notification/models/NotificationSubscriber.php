<?php namespace Demo\Notification\Models;

use Backend\Models\User;
use Backend\Models\UserGroup;
use Demo\Core\Models\CoreUser;
use Demo\Core\Models\CoreUserGroup;
use Demo\Core\Models\ModelModel;
use Demo\Core\Models\PluginVersions;
use Illuminate\Validation\UnauthorizedException;
use Model;
use October\Rain\Exception\ApplicationException;
use October\Rain\Exception\ValidationException;
use System\Models\MailTemplate;
use Flash;
/**
 * Model
 */
class NotificationSubscriber extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_notification_subscribers';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'notification' => 'required'
    ];

    public $attachAuditedBy = true;

    public $belongsTo = [
        'plugin' => [PluginVersions::class, 'key' => 'plugin_id'],
        'subscriber' => [CoreUser::class, 'key' => 'subscriber_id'],
        'subscriber_group' => [CoreUserGroup::class, 'key' => 'subscriber_group_id'],
        'notification' => [Notification::class, 'key' => 'notification_id'],
    ];

    public function beforeSave()
    {
        if (empty($this->subscriber_id) && empty($this->subscriber_group_id)) {
            throw new ApplicationException('Both Subscriber and Subscriber Group can not be empty.');
        }
    }
}
