<?php namespace Demo\Casemanager\Controllers;

use Backend\Classes\Controller;
use Backend\Facades\BackendAuth;
use BackendMenu;
use Demo\Core\Controllers\AbstractSecurityController;
use Demo\Workspace\Classes\Traits\WorkflowControllerTrait;
use Demo\Casemanager\Models\CaseModel;
use Demo\Workspace\Models\Work;
use Illuminate\Support\Facades\Request;
use Model;
use October\Rain\Exception\ApplicationException;
use October\Rain\Support\Facades\Flash;
use Db;

class CaseController extends AbstractSecurityController
{
    use WorkflowControllerTrait;
    public $implement = ['Backend\Behaviors\ListController', 'Backend\Behaviors\FormController', 'Backend\Behaviors\ReorderController'];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Demo.Casemanager', 'main-menu-item', 'side-menu-item');
    }

    public function onPushCase($id)
    {
        Db::transaction(function () use ($id) {
            $model = $this->formFindModelObject($id);
            if ($model->assigned_to_id === $this->user->id) {
                $work = Work::where(['model' => get_class($model), 'record_id' => $id])->first();
                if (empty($work)) {
                    throw new ApplicationException('No active workflow item found for case ', $id);
                }
                $work->makeForwardTransition();
                Flash::success('Case pushed successfully');
            } else {
                Flash::error('Unable to push case as it\'s not assigned to you !');
            }
        });
    }

    public function onRevertCase($id)
    {
        Db::transaction(function () use ($id) {
            $remark = request()->request->get('remark');
            if (empty($remark) || empty(trim($remark))) {
                Flash::error('Please enter a remark !');
                return;
            }
            $model = $this->formFindModelObject($id);
            if ($model->assigned_to_id === $this->user->id) {
                /**@var $work Work */
                $work = Work::where(['model' => get_class($model), 'record_id' => $id])->first();
                if (empty($work)) {
                    throw new ApplicationException('No active workflow item found for case ', $id);
                }
                $work->makeBackwardTransition([
                    'remark' => $remark
                ]);
                Flash::success('Case pushed successfully');
            } else {
                Flash::error('Unable to revert case as it\'s not assigned to you !');
            }
        });
    }

    /**
     * Before read permission can be evaluated here
     */
    public function listExtendQuery($query)
    {
        parent::listExtendQuery($query);
        $list = Request::input('list');
        if ($list === 'mycases') {
            $user = BackendAuth::getUser();
            $query->where('assigned_to_id', $user->id);
        } else if (empty($list) || $list === 'allCases') {
            /*$queueIds = [];
            $queueId = Request::input('queueId');
            if (!empty($queueId)) {
                $queueIds = [$queueId];
            }
            $query->where('assigned_to_id', null);//->join('demo_work','demo_work.');*/
        }
    }

}
