<?php namespace Demo\Core\Models;

use Demo\Core\Classes\Helpers\PluginConnection;
use Model;
use RainLab\Builder\Classes\IconList;

/**
 * Model
 */
class ListAction extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_core_list_actions';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $attachAuditedBy = true;

    public $belongsTo = [
        'plugin' => [PluginVersions::class, 'key' => 'plugin_id'],
        'model_ref' => [ModelModel::class, 'key' => 'model', 'otherKey' => 'model_type'],
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

}
