<?php namespace Demo\Notification\Models;

use Demo\Core\Classes\Beans\ScriptContext;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Models\JavascriptLibrary;
use Demo\Core\Models\PluginVersions;
use Illuminate\Support\Facades\Mail;
use Model;

/**
 * Model
 */
class NotificationChannel extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_notification_channels';
public $incrementing = false;

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];


    public $attachAuditedBy = true;

    public $jsonable = ['configuration'];

    public $belongsTo = [
        'plugin' => [PluginVersions::class, 'key' => 'plugin_id'],
    ];

    private $context = [];

    public function getConfig($name)
    {
        if (empty($this->configiration)) {
            return null;
        }
        foreach ($this->configuration as $config) {
            if (array_key_exists($name, $config)) {
                return $config[$name];
            }
        }
        return null;
    }

    public function setContext($context)
    {
        $this->context = $context;
    }

    public function getContext()
    {
        return $this->context;
    }

    public function sendNotification(Notification $notification, $context)
    {
        $pluginConnection = PluginConnection::getConnection('demo.notification');
        $logger = $pluginConnection->getPluginLogger();
        $logger->debug('Sending notification with name ' . $notification->name);
        $this->setContext($context);
        $scriptContext = new ScriptContext();
        $scriptContext->execute($this->script, [
            'notification' => $notification,
            'self' => $this, 'Mail' => Mail::class,
        ]);
        $logger->debug('Notification ' . $notification->name . ' has been sent ');
    }
}
