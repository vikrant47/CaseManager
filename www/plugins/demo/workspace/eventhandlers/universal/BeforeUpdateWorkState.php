<?php


namespace Demo\Workspace\EventHandlers\Universal;


use Demo\Core\Classes\Beans\TemplateEngine;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Workspace\Models\Queue;
use Demo\Workspace\Models\Task;
use Demo\Workspace\Models\Work;
use Demo\Workspace\Models\WorkflowTransition;

class BeforeUpdateWorkState
{
    public $model = Work::class;
    public $events = ['updated'];
    public $sort_order = -1000;

    /**
     * Find all queues based on Model and evaluate them one by one
     * If a queue qualifies than break the loop.
     * Only one queue is allowed to push an item
     */
    public function handler($event, $model)
    {

    }
}
