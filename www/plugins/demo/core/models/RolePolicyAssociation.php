<?php namespace Demo\Core\Models;

use Backend\Models\UserRole;
use Model;

/**
 * Model
 */
class RolePolicyAssociation extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_core_role_policy_associations';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'role_id' => 'required',
        'policy_id' => 'required',
        'plugin_id' => 'required',
    ];

    public $belongsTo = [
        'plugin' => [PluginVersions::class, 'key' => 'plugin_id'],
        'policy' => [PermissionPolicy::class, 'key' => 'policy_id'],
        'role' => [UserRole::class, 'key' => 'role_id'],
    ];

    public $attachAuditedBy = true;
}

