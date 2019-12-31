<?php namespace Demo\Core\Models;

use Backend\Models\UserRole;
use Model;

/**
 * Model
 */
class Role extends UserRole {
    protected $table = 'backend_user_roles';
}
