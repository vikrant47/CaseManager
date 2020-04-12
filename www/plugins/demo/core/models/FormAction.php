<?php namespace Demo\Core\Models;

use Demo\Core\Classes\Helpers\PluginConnection;
use Model;
use RainLab\Builder\Classes\IconList;

/**
 * Model
 */
class FormAction extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_core_form_actions';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $attachAuditedBy = true;
    public $jsonable = ['dom_attributes', 'context'];
    public $belongsTo = [
        'plugin' => [PluginVersions::class, 'key' => 'plugin_id'],
        'model_ref' => [ModelModel::class, 'key' => 'model', 'otherKey' => 'model'],
    ];

    public function getIconOptions()
    {
        return IconList::getList();
    }

    public function getFormOptions($value, $data)
    {
        if (isset($data->model)) {
            return PluginConnection::getFormsAlias($data->model);
        }
        return PluginConnection::getAllFormsAlias();
    }

}
