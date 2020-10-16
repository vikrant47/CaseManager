<?php namespace Demo\Workspace\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Demo\Core\Controllers\AbstractSecurityController;
use Demo\Workspace\Models\Queue;
use Illuminate\Support\Facades\Request;
use October\Rain\Support\Facades\Flash;

class QueueController extends AbstractSecurityController
{
    public $implement = ['Backend\Behaviors\ListController', 'Backend\Behaviors\FormController', 'Backend\Behaviors\ReorderController'];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Demo.Workflow', 'main-menu-item', 'side-menu-item');
    }

    public function onPickItemFromQueue()
    {
        $queueId = Request::input('queueId');
        if (empty($queueId)) {
            $this->setStatusCode(400);
            Flash::error('Please select a queue to pick a case');
            return;
        }
        /**@var $queue Queue */
        $queue = Queue::find($queueId);
        if (empty($queue)) {
            $this->setStatusCode(400);
            Flash::success('Unable to find queue with given id');
            return;
        }
        $queue->popAndAssign();
        Flash::success('A item has been assigned');
        return $this->makeRedirect('-close');
    }

    public function onGetCurrentUserQueues()
    {
        return Queue::getQueuesForCurrentUser();
    }
}
