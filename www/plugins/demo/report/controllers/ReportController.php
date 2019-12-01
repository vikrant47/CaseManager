<?php namespace Demo\Report\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Demo\Report\Models\Report;
use Input;

class ReportController extends Controller
{
    public $implement = ['Backend\Behaviors\ListController', 'Backend\Behaviors\FormController', 'Backend\Behaviors\ReorderController'];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Demo.Report', 'main-menu-item', 'side-menu-item');
    }

    public function onData($id)
    {
        // $id = Input::get('id');
        $report = Report::where('id', $id)->first();
        if (empty($report)) {
            $this->setStatusCode(404);
            return [];
        }
        $reportJson = $report->getOriginal();
        $reportJson['data'] = $report->executeData();
        return json_encode($reportJson);
    }

    public function onPreview($id)
    {
        $report = Report::where('id', $id)->first();
        if (empty($report)) {
            $this->setStatusCode(404);
            return '';
        }
        $this->vars['report'] = $report;
        return  ['report' => $report->getOriginal()];
    }

    public function renderReport($id)
    {
        $report = Report::where('id', $id)->first();
        if (empty($report)) {
            $this->setStatusCode(404);
            return '';
        }
        return $this->makePartial('report_renderer', ['report' => $report]);
    }
}
