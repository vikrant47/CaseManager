<?php namespace Demo\Core\Models;

use Model;

/**
 * Model
 */
class PermissionPolicyAssociation extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_core_permission_policy_associations';
public $incrementing = false;

    /**
     * @var array Validation rules
     */
    public $rules = [
        'permission_id' => 'required',
        'policy_id' => 'required',
        'plugin_id' => 'required',
    ];

    public $belongsTo = [
        'plugin' => [PluginVersions::class, 'key' => 'plugin_id'],
        'policy' => [SecurityPolicy::class, 'key' => 'policy_id'],
        'permission' => [Permission::class, 'key' => 'permission_id'],
    ];

    public $attachAuditedBy = true;
}
