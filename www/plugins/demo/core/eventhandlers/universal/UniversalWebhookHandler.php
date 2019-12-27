<?php

namespace Demo\Notification\EventHandlers\Universal;

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
        if(!in_array($model,Webhook::IGNORE_MODELS)) {
            $webhooks = Webhook::where(['event' => $event, 'model' => get_class($model), 'active' => true])->get();
            foreach ($webhooks as $webhook) {
                $webhooks->execute(['event' => $event, 'model' => $model]);
            }
        }
    }
}
