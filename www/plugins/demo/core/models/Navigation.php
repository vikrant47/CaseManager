<?php namespace Demo\Core\Models;

use Demo\Core\Classes\Helpers\PluginConnection;
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

    public function getIconOptions()
    {
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
    }
}
