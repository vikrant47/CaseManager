<?php namespace Demo\Notification\Models;

use Demo\Core\Models\PluginVersions;
use Model;

/**
 * Model
 */
class NotificationLog extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_notification_logs';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $attachAuditedBy = true;

    public $belongsTo = [
        'notification' => [Notification::class, 'key' => 'notification_id']
    ];
}
