<?php

namespace Demo\Core\EventHandlers\Universal;

use BackendAuth;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Models\ModelModel;
use Demo\Core\Models\Webhook;
use Demo\Notification\Models\Notification;

class UniversalWebhookHandler
{
    public $model = 'universal';
    public $events = ['created', 'updated', 'deleted'];
    public $sort_order = 10000;

    public function handler($event, $model)
    {
        /*if(!in_array($model,Webhook::IGNORE_MODELS)) {
            $logger = PluginConnection::getCurrentLogger();
            $webhooks = Webhook::where(['event' => $event, 'model' => get_class($model), 'active' => true])->get();
            $logger->debug($webhooks->count().' webhooks eligible to be executed');
            foreach ($webhooks as $webhook) {
                $webhook->execute(['event' => $event, 'model' => $model]);
            }
        }*/
    }
}
