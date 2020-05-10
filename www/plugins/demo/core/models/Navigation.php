<?php namespace Demo\Core\Models;

use Backend\Facades\Backend;
use Demo\Core\Classes\Helpers\ControllerHelper;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Classes\Utils\ModelUtil;
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

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $attachAuditedBy = true;
    public $belongsTo = [
        'plugin' => [PluginVersions::class, 'key' => 'plugin_id'],
        'parent' => [Navigation::class, 'key' => 'parent_id'],
        'model_ref' => [ModelModel::class, 'key' => 'model', 'otherKey' => 'model'],
    ];
    public $belongsToMany = [
        'roles' => [
            Role::class,
            'table' => 'demo_core_view_role_associations',
            'key' => 'navigation_id',
            'otherKey' => 'role_id'
        ],
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

    public function beforeSave()
    {
        $result = $this->isCyclic($this, $this->parent);
        if ($result['cyclic'] === true) {
            throw new ApplicationException('Circular dependancy ' . $result['cyclic']);
        }
        ModelUtil::fillDefaultColumnsInBelongsToMany($this->roles(), $this->roles, $this->plugin_id);
    }

    public static function getUrl($navigation)
    {

        $generatedUrl = '';//$navigation->generated_url;
        if ($navigation->type !== 'folder' && $navigation->type !== 'seperator') {
            /*try {*/
            if ($navigation->type === 'url') {
                $generatedUrl = $navigation->url;
            }
            $model = $navigation->model_ref;
            $index = Backend::url(str_replace('\\', '/', strtolower(str_replace('\\Controllers', '', $model->controller))));
            if ($navigation->type === 'list') {
                $generatedUrl = $index;
            }
            if ($navigation->type === 'form') {
                if (empty($navigation->record_id)) {
                    $generatedUrl = $index . '/update' . $navigation->record_id;
                } else {
                    $generatedUrl = $index . '/create';
                }
            }
            /*} catch (\Exception $e) {
                throw $e;
            }*/
        } else {
            $generatedUrl = Backend::url($navigation->name);
        }
        return $generatedUrl;
    }

    public static function isActiveNavigation()
    {
        return false;
    }


}
