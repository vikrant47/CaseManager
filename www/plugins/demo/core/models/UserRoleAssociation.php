<?php namespace Demo\Core\Models;

use Backend\Models\User;
use Backend\Models\UserRole;
use Model;

/**
 * Model
 */
class UserRoleAssociation extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_core_user_role_associations';
public $incrementing = false;

    /**
     * @var array Validation rules
     */
    public $rules = [
        'role_id' => 'required',
        'user_id' => 'required',
        'engine_application_id' => 'required',
    ];

    public $belongsTo = [
        'application' => [EngineApplication::class,'nameFrom'=>'name', 'key' => 'engine_application_id'],
        'user' => [User::class, 'key' => 'user_id'],
        'role' => [UserRole::class, 'key' => 'role_id'],
    ];

    public $attachAuditedBy = true;
}
