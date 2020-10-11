<?php


namespace Demo\Workflow\Services;


use Demo\Core\Classes\Utils\ModelUtil;
use Demo\Core\Services\InMemoryQueryFilter;
use Demo\Workflow\Classes\Enums\WorkStatus;
use Demo\Workflow\Models\ServiceChannel;
use Demo\Workflow\Models\Work;
use Demo\Workflow\Models\Workflow;
use Demo\Workflow\Models\WorkflowState;
use October\Rain\Exception\ApplicationException;
use October\Rain\Exception\ValidationException;

class WorkService
{
    /**
     * This will create a work(unsaved) instance for given channel
     * @param $channel ServiceChannel The channel which is matched
     * @return Work newly created work instance
     */
    public function createWork($channel, $model)
    {
        $work = new Work();
        $work->service_channel_id = $channel->id;
        $work->status = WorkStatus::INIT;
        $work->model = get_class($model);
        $work->record_id = get_class($model->id);
        return $work;
    }
}
