<?php namespace Demo\Workspace\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Demo\Core\Controllers\Abs;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Services\EventHandlerServiceProvider;
use Demo\Core\Controllers\AbstractSecurityController;
use Demo\Workspace\Services\WorkflowService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Request;

class WorkflowController extends AbstractSecurityController
{
    public $implement = ['Backend\Behaviors\ListController', 'Backend\Behaviors\FormController', 'Backend\Behaviors\ReorderController'];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';
    public $requiredPermissions = ['workflow.table.read'];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Demo.Workflow', 'main-menu-item', 'side-menu-item2');
    }

    /*public function onMakeTransition()
    {
        $backward_direction = $toState = Request::input('backward_direction') === "true";
        $workId = $toState = Request::input('work_id');
        $toState = Request::input('to_state');
        if (empty($workId)) {
            return Response::create([
                'message' => 'Work ID  not provided',
            ], Response::HTTP_BAD_REQUEST);
        }
        $work = Work::with('workflow')->where('id', $workId);
        if (empty($work)) {
            return Response::create([
                'message' => 'No work found for id ' . $workId,
            ], Response::HTTP_NOT_FOUND);
        }
        if (empty($work->workflow_id)) {
            return Response::create([
                'message' => 'No workflow associated with work ' . $workId,
            ], Response::HTTP_NOT_FOUND);
        }
        $workflowService = new WorkflowService();
        $workflowService->makeTransition();
    }*/
}
