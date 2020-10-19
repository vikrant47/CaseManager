<?php namespace Demo\Workspace\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use BackendAuth;
use Demo\Core\Controllers\AbstractSecurityController;
use Demo\Workspace\Models\Work;
use Demo\Workspace\Models\Workflow;
use Demo\Workspace\Models\WorkflowState;
use Demo\Workspace\Services\WorkflowService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Request;
use October\Rain\Exception\ApplicationException;

class WorkController extends AbstractSecurityController
{
    public $implement = ['Backend\Behaviors\ListController', 'Backend\Behaviors\FormController', 'Backend\Behaviors\ReorderController'];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Demo.Workflow', 'main-menu-item', 'side-menu-item4');
    }

    public function onGetPossibleTransitionStates()
    {
        $workId = $toState = Request::input('work_id');
        if (empty($workId)) {
            return Response::create([
                'message' => 'Work ID  not provided',
            ], Response::HTTP_BAD_REQUEST);
        }
        $work = Work::with('workflow')->where('id', $workId)->first();
        if (empty($work)) {
            return Response::create([
                'message' => 'No work found for id ' . $workId,
            ], Response::HTTP_NOT_FOUND);
        }
        $workflowService = new WorkflowService();
        $connections = $workflowService->getConnectedStateConfig($work->workflow, $work->workflow_state_id);
        $states = WorkflowState::whereIn('id', $connections->map(function ($connection) {
            return $connection['state_id'];
        }))->get();
        return $connections->map(function ($connection) use ($states) {
            foreach ($states as $state) {
                if ($state->id === $connection['state_id']) {
                    $connection['state'] = $state;
                }
            }
            return $connection;
        });
    }

    public function onGetNextTransitionStates()
    {
        $connections = $this->onGetPossibleTransitionStates();
        if ($connections instanceof Response) {
            return $connections;
        }
        return Response::create($connections->filter(function ($connection) {
            return $connection['backward_direction'] === false;
        }));
    }

    public function onGetPreviousTransitionStates()
    {
        $connections = $this->onGetPossibleTransitionStates();
        if ($connections instanceof Response) {
            return $connections;
        }
        return Response::create($connections->filter(function ($connection) {
            return $connection['backward_direction'] === true;
        }));
    }
}
