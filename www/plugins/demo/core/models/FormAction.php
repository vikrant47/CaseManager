<?php namespace Demo\Core\Models;

use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Classes\Utils\ModelUtil;
use Model;
use October\Rain\Exception\ApplicationException;
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
    public $incrementing = false;

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $attachAuditedBy = true;
    public $jsonable = ['html_attributes', 'context'];
    protected $nullable = ['form'];
    public $belongsTo = [
        'application' => [EngineApplication::class,'nameFrom'=>'name', 'key' => 'engine_application_id'],
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

    public function beforeSave()
    {
        ModelUtil::fillDefaultColumnsInBelongsToMany($this->roles(), $this->roles, $this->engine_application_id);
    }

}
