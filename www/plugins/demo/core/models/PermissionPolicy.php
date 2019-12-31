<?php namespace Demo\Core\Models;

use Demo\Core\Classes\Utils\ModelUtil;
use Demo\Core\Services\SecurityService;
use Model;

/**
 * Model
 */
class PermissionPolicy extends Model
{
    use \October\Rain\Database\Traits\Validation;



    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_core_permission_policies';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => 'required',
        'plugin_id' => 'required',
    ];

    public $belongsTo = [
        'plugin' => [PluginVersions::class, 'key' => 'plugin_id'],
    ];

    public $belongsToMany = [
        'permissions' => [
            Permission::class,
            'table' => 'demo_core_permission_policy_associations',
            'key' => 'permission_id',
            'otherKey' => 'policy_id'
        ],
    ];

    public $attachAuditedBy = true;

    public function beforeSave()
    {
        ModelUtil::fillDefaultColumnsInBelongsToMany($this->permissions(),$this->permissions,$this->plugin_id);
        // TODO : for now setting date and plugin nullable in demo_core_role_permission_associations
    }
}
