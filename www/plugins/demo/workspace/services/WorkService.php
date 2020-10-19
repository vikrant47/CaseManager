<?php


namespace Demo\Workspace\Services;


use Demo\Core\Classes\Utils\ModelUtil;
use Demo\Core\Services\InMemoryQueryFilter;
use Demo\Workspace\Classes\Enums\WorkStatus;
use Demo\Workspace\Models\ServiceChannel;
use Demo\Workspace\Models\Work;
use Demo\Workspace\Models\Workflow;
use Demo\Workspace\Models\WorkflowState;
use October\Rain\Exception\ApplicationException;
use October\Rain\Exception\ValidationException;
use Backend\Facades\BackendAuth;

class WorkService
{
    /**
     * This will create a work(unsaved) instance for given channel
     * @param $channel ServiceChannel The channel which is matched
     * @return Work newly created work instance
     */
    public function newWork($channel, $model)
    {
        $currentUser = BackendAuth::getUser();
        $work = new Work();
        $work->service_channel_id = $channel->id;
        $work->status = WorkStatus::INIT;
        $work->model = get_class($model);
        $work->record_id = $model->id;
        $work->assigned_to_id = $currentUser->id;
        return $work;
    }
}
