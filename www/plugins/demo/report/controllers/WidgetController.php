<?php namespace Demo\Report\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Demo\Report\Models\Widget;
use Input;

class WidgetController extends Controller
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
        $id = Input::get('id');
        $widget = Widget::where('id', $id)->first();
        if (empty($widget)) {
            $this->setStatusCode(404);
            return [];
        }
        $widgetJson = $widget->getOriginal();
        $widgetJson['data'] = $widget->executeData();
        return json_encode($widgetJson);
    }

    public function onPreview($id)
    {
        $widget = Widget::where('id', $id)->first();
        if (empty($widget)) {
            $this->setStatusCode(404);
            return '';
        }
        $this->vars['widget'] = $widget;
        $this->vars['preview'] = true;
        $this->vars['dashboard'] = false;
        if (Input::get('dashboardId')) {
            $this->vars['dashboard'] = true;
            $this->vars['preview'] = false;
        }
        return ['widget' => $widget->getOriginal()];
    }

    public function addAssets($controller, Widget $widget)
    {
        foreach ($widget->library->getCssFiles() as $file) {
            $controller->addCss($file);
        }
        foreach ($widget->library->getJsFiles() as $file) {
            $controller->addJs($file);
        }
    }

    public function renderWidget($id)
    {
        if ($id instanceof Widget) {
            $widget = $id;
        } else {
            $widget = Widget::where('id', $id)->first();
        }
        if (empty($widget)) {
            $this->setStatusCode(404);
            return '';
        }
        return $this->makePartial('widget_renderer', ['widget' => $widget, 'preview' => false, 'dashboard' => false]);
    }
}
