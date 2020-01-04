<?php namespace Demo\Core\Models;

use Backend\Models\UserRole;
use Model;

/**
 * Model
 */
class Role extends Model
{
    use \October\Rain\Database\Traits\Validation;

    const ADMIN = 'admin';
    const EVERYONE = 'everyone';
    const SUPER_ADMIN = 'super_admin';
    const SYSTEM_ROLES = [self::ADMIN, self::EVERYONE, self::SUPER_ADMIN];
    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_core_roles';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => 'required|between:2,128|unique:backend_user_roles',
        'code' => 'unique:backend_user_roles',
    ];

    public $belongsTo = [
        'plugin' => [PluginVersions::class, 'key' => 'plugin_id'],
    ];

    public $belongsToMany = [
        'policies' => [
            SecurityPolicy::class,
            'table' => 'demo_core_role_policy_associations',
            'key' => 'role_id',
            'otherKey' => 'policy_id'
        ],
        'users' => [
            SecurityPolicy::class,
            'table' => 'demo_core_user_role_associations',
            'key' => 'role_id',
            'otherKey' => 'user_id'
        ],
    ];

    public $attachAuditedBy = true;
}
