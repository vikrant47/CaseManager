<?php namespace Demo\Report\Controllers;

use Backend\Classes\Controller;
use Backend\Classes\WidgetManager;
use BackendMenu;
use Demo\Core\Controllers\AbstractSecurityController;
use Demo\Report\Models\Dashboard;
use Demo\Report\Models\Widget;
use Illuminate\Support\Collection;
use Input;
use October\Rain\Exception\ApplicationException;
use October\Rain\Support\Facades\Flash;
use Lang;
use Request;

class DashboardController extends AbstractSecurityController
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

    /**
     * @return Collection<Widget>
     * @var Dashboard $dashboard
     */
    public function getWidgets($dashboard)
    {
        $config = $dashboard->widgets_config;
        $widgets = Widget::whereIn('id', array_map(function ($widgetConfig) {
            return $widgetConfig['widget'];
        }, $config))->get();
        $widgets->map(function ($widget) use ($config) {
            foreach ($config as $widgetConfig) {
                if ($widgetConfig['widget'] === $widget->id) {
                    $widget->config = $widgetConfig;
                }
            }
        });
        return $widgets;
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

    public function onSaveData($id)
    {
        $dashboard = Dashboard::where('id', $id)->first();
        if (empty($dashboard)) {
            $this->setStatusCode(404);
            Flash::error('Unable to find given dashboard !');
        }
        $dashboard->widgets_config = Input('widgets_config');
        $dashboard->save();
        Flash::success('Dashboard Updated !');

    }

    public function onLoadAddPopup()
    {
        $sizes = [];
        for ($i = 1; $i <= 12; $i++) {
            $sizes[$i] = $i < 12 ? $i : $i . ' (' . Lang::get('backend::lang.dashboard.full_width') . ')';
        }

        $this->vars['sizes'] = $sizes;
        $this->vars['widgets'] = Widget::all();

        return $this->makePartial('new_widget_popup');
    }

    public function onAddWidget()
    {
        $widgetId = trim(Request::input('widgetId'));
        $size = trim(Request::input('size'));

        if (!$widgetId) {
            throw new ApplicationException('Please select a widget to add.');
        }
        $widget = Widget::where('id', $widgetId)->first();
        if (empty($widget)) {
            throw new ApplicationException('The selected widget doesn\'t exist.');
        }

        return [
            'widget' => $widget,
            'size' => $size
        ];
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

    public function design($id)
    {
        $dashboard = Dashboard::where('id', $id)->where('active', 1)->first();
        if (empty($dashboard)) {
            $this->setStatusCode(404);
            return '';
        }
        return $this->makePartial('dashboard_renderer', [
            'dashboard' => $dashboard,
            'context' => 'preview'
        ]);
    }

    public function render($id)
    {
        $dashboard = Dashboard::where('id', $id)->where('active', 1)->first();
        if (empty($dashboard)) {
            $this->setStatusCode(404);
            return '';
        }
        return $this->makePartial('dashboard_renderer', [
            'dashboard' => $dashboard,
            'context' => 'render'
        ]);
    }
}
