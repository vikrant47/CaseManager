<?php

namespace Demo\Workflow\EventHandlers\Universal;


use Demo\Core\Classes\Beans\ScriptContext;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Classes\Utils\ModelUtil;
use Demo\Workflow\Models\Workflow;
use Demo\Workflow\Models\WorkflowItem;
use Demo\Workflow\Models\WorkflowTransition;
use Log;
use October\Rain\Exception\ApplicationException;
use System\Models\EventLog;

class SearchWorkflowBeforePersist
{
    public $model = 'universal';
    public $events = ['creating', 'updating', 'deleting', 'created', 'updated', 'deleted'];
    public $sort_order = -1000;

    /**
     * Find all queues based on Item Type and evaluate them one by one
     * If a queue qualifies than break the loop.
     * Only one queue is alloed to push an item
     */
    public function handler($event, $model)
    {
        $logger = PluginConnection::getCurrentLogger();
        $ignoreModels = [WorkflowItem::class, WorkflowTransition::class, EventLog::class];
        $includedPackage = ['Workflow'];
        if (!in_array(get_class($model), $ignoreModels) /*&& in_array(explode('\\', get_class($model))[1], $includedPackage)*/) {
            /**@var $workflows Collection<Workflow> */
            $workflows = Workflow::where('active', 1)->where('event', $event)
                ->where('item_type', '=', get_class($model))->orderBy('sort_order', 'ASC')->get();
            $logger->info('Evaluating workflows to accept item' . ModelUtil::toString($model) . '. total = ' . $workflows->count());
            /**@var  $workflow Workflow */
            foreach ($workflows as $workflow) {
                $context = new ScriptContext();
                $value = $context->execute($workflow->input_condition, ['workflow' => $workflow, 'event' => $event, 'model' => $model]);
                if ($value === true) {
                    $logger->info('Staring the workflow ' . $workflow->name . ' for model id ' . $model->id);
                    $workflow->start($model);
                }

            }
        }
    }
}
