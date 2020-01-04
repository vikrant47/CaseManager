<?php namespace Demo\Report\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Demo\Core\Classes\Beans\AbstractSecurityController;
use Demo\Report\Models\Widget;
use Input;
use Maatwebsite\Excel\Excel;

class WidgetController extends AbstractSecurityController
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
        return json_encode($widget->evaluate());
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
        if (!empty($widget->library)) {
            $widget->library->addAssets($controller);
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

    /**
     * This will export data in given format
     */
    public function export($id, $format)
    {

        if (array_search($format, Widget::SUPPORTED_EXPORT_FORMATS) < 0) {
            $this->setStatusCode(400);
            return 'Invalid format ' . $format;
        }
        $widget = Widget::where('id', $id)->first();
        if (empty($widget)) {
            $this->setStatusCode(404);
            return '';
        }
        if ($format === 'json') {
            return $widget->collection()->toJson();
        }
        return $widget->download(camel_case($widget->name) . '.' . $format);
    }
}
