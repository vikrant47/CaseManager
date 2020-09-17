<?php namespace Demo\Core\Models;

use Backend\Facades\Backend;
use Demo\Core\Classes\Helpers\ControllerHelper;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Classes\Utils\ModelUtil;
use Demo\Core\Controllers\NavigationController;
use Demo\Core\Controllers\UiPageController;
use Demo\Report\Controllers\DashboardController;
use Demo\Report\Controllers\WidgetController;
use Demo\Report\Models\Dashboard;
use Demo\Report\Models\Widget;
use Demo\Tenant\Services\TenantService;
use Model;
use October\Rain\Exception\ApplicationException;
use RainLab\Builder\Classes\IconList;

/**
 * Model
 */
class Navigation extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_core_navigations';
    public $incrementing = false;

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $attachAuditedBy = true;
    public $belongsTo = [
        'application' => [EngineApplication::class, 'nameFrom' => 'name', 'key' => 'engine_application_id'],
        'parent' => [Navigation::class, 'key' => 'parent_id'],
        'dashboard' => [Dashboard::class, 'key' => 'dashboard_id'],
        'widget' => [Widget::class, 'key' => 'widget_id'],
        'uipage' => [UiPage::class, 'key' => 'uipage_id'],
        'model_ref' => [ModelModel::class, 'key' => 'model', 'otherKey' => 'model'],
    ];
    public $morphToMany = [
        'roles' => [
            Role::class,
            'name' => 'viewable',
            'table' => 'demo_core_view_role_associations',
            'key' => 'record_id',
            'otherKey' => 'role_id',
            'morphTypeKey' => 'model',
        ]
    ];

    public function getIconOptions($model)
    {
        if (strpos(request()->getRequestUri(), 'audit-form-view') > 0) {
            return ModelUtil::getIconListWitoutIconClass();
        }
        return IconList::getList();
    }

    public function getListOptions($value, $data)
    {
        if (isset($data->model)) {
            return PluginConnection::getListsAlias($data->model);
        }
        return PluginConnection::getAllListsAlias();
    }

    public function getViewOptions($value, $data)
    {
        if (isset($data->model)) {
            return PluginConnection::getControllerViewsAlias($data->model_ref->controller);
        }
        return [];
    }

    public function getFormOptions($value, $data)
    {
        if (isset($data->model)) {
            return PluginConnection::getFormsAlias($data->model);
        }
        return PluginConnection::getAllFormsAlias();
    }

    public function isCyclic($navigation, $parent, $cycle = '')
    {
        if (!empty($parent)) {
            $cycle = $cycle . ' -> ' . $parent->name . ' ->' . $navigation->name;
            if ($parent->name === $navigation->name) {
                return ['cyclic' => true, 'cycle' => $cycle];
            }
            return $this->isCyclic($navigation, $parent->parent, $cycle);
        }
        return ['cyclic' => false, 'cycle' => $cycle];
    }

    public static function isDefaultList($model, $list)
    {
        return $list == 'default' || ends_with($list, strtolower(str_replace('\\', '/', $model)) . '/columns.yaml');
    }

    public function beforeSave()
    {
        $result = $this->isCyclic($this, $this->parent);
        if ($result['cyclic'] === true) {
            throw new ApplicationException('Circular dependancy ' . $result['cyclic']);
        }
        ModelUtil::fillDefaultColumnsInBelongsToMany($this->roles(), $this->roles, $this->engine_application_id);
    }

    public static function getUrl($navigation)
    {
        $tenant = request()->attributes->get('tenant');
        $generatedUrl = '';//$navigation->generated_url;
        if ($navigation->type === 'url') {
            $generatedUrl = TenantService::generateUrl($tenant, NavigationController::class) . '/embed/' . $navigation->id;
        } else if ($navigation->type === 'dashboard') {
            $index = TenantService::generateUrl($tenant, DashboardController::class);
            $generatedUrl = $index . '/render/' . $navigation->dashboard_id;
        } else if ($navigation->type === 'widget') {
            $index = TenantService::generateUrl($tenant, WidgetController::class);
            $generatedUrl = $index . '/render/' . $navigation->widget_id;
        } else if ($navigation->type === 'uipage') {
            $index = TenantService::generateUrl($tenant, UiPageController::class);
            $generatedUrl = $index . '/render/' . $navigation->uipage_id;
        } else if ($navigation->type === 'list') {
            /*try {*/

            $model = $navigation->model_ref;
            $index = TenantService::generateUrl($tenant, $model->controller);
            if (!empty($navigation->view) && $navigation->view !== 'default') {
                $generatedUrl = $index . '?view=' . $navigation->view;
            } else {
                $generatedUrl = $index;
            }
            if (!empty($navigation->list) && !Navigation::isDefaultList($navigation->model, $navigation->list)) {
                $list = $navigation->list;
                $index = strripos($list, '/');
                if ($index) {
                    $list = str_replace('.yaml', '', substr($list, $index + 1));
                }
                $navigation->url = 'list=' . $list . (!empty($navigation->url) ? '&' . $navigation->url : '');
            }
            /*} catch (\Exception $e) {
                throw $e;
            }*/
        } else if ($navigation->type === 'form') {
            $model = $navigation->model_ref;
            $index = TenantService::generateUrl($tenant, $model->controller);
            if (empty($navigation->record_id)) {
                $generatedUrl = $index . '/update' . $navigation->record_id;
            } else {
                $generatedUrl = $index . '/create';
            }
            if (!empty($navigation->view) && $navigation->view !== 'default') {
                $generatedUrl = $generatedUrl . '?view=' . $navigation->view;
            }
        } else {
            $generatedUrl = Backend::url($navigation->name);
        }
        if (!empty($navigation->url)) {
            if (strpos($navigation->url, '?') !== false) {
                $queryStartIndex = strpos($generatedUrl, '?');
                if ($queryStartIndex !== false) {
                    $generatedUrl = substr($generatedUrl, 0, $queryStartIndex) . $navigation->url . '&' . substr($generatedUrl, $queryStartIndex + 1);
                } else {
                    $generatedUrl = $generatedUrl . $navigation->url;
                }
            } else {
                $generatedUrl = $generatedUrl . $navigation->url;
            }

        }
        return $generatedUrl;
    }

    public static function isActiveNavigation()
    {
        return false;
    }


}
