<?php namespace Demo\Report\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Demo\Report\Models\Dashboard;
use Input;
use October\Rain\Support\Facades\Flash;

class DashboardController extends Controller
{
    public $implement = ['Backend\Behaviors\ListController', 'Backend\Behaviors\FormController', 'Backend\Behaviors\ReorderController'];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Demo.Report', 'main-menu-item', 'side-menu-item2');
    }

    public function onData($id)
    {
        // $id = Input::get('id');
        $dashboard = Dashboard::where('id', $id)->first();
        if (empty($dashboard)) {
            $this->setStatusCode(404);
            return [];
        }
        $dashboardJson = $dashboard->getOriginal();
        $dashboardJson['data'] = $dashboard->executeData();
        return json_encode($dashboardJson);
    }

    public function onSaveData($slug)
    {
        $dashboard = Dashboard::where('slug', $slug)->first();
        if (empty($dashboard)) {
            $this->setStatusCode(404);
            return [];
        }
        $dashboard->reports_config = Input('reports_config');
        $dashboard->save();
        Flash::success('Dashboard Updated !');

    }

    public function onPreview($id)
    {
        $dashboard = Dashboard::where('id', $id)->first();
        if (empty($dashboard)) {
            $this->setStatusCode(404);
            return '';
        }
        $this->vars['dashboard'] = $dashboard;
        $this->vars['preview'] = true;
        return ['dashboard' => $dashboard->getOriginal()];
    }

    public function renderDashboard($slug)
    {
        $dashboard = Dashboard::where('slug', $slug)->where('active', 1)->first();
        if (empty($dashboard)) {
            $this->setStatusCode(404);
            return '';
        }
        return $this->makePartial('dashboard_renderer', ['dashboard' => $dashboard, 'preview' => false]);
    }
}
