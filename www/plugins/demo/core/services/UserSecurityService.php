<?php


namespace Demo\Core\Services;


use Backend\Models\User;
use Demo\Core\Classes\Beans\SessionCache;
use Demo\Core\Classes\Utils\StringUtil;
use BackendAuth;
use Demo\Core\Models\CoreUserGroup;
use Demo\Core\Models\Role;
use Db;
use October\Rain\Support\Collection;

class UserSecurityService
{
    /**@var $user User */
    protected $user;

    /**
     * SecurityService constructor.
     * @param User $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**@return UserSecurityService */
    public static function getInstance()
    {
        return new UserSecurityService(BackendAuth::getUser());
    }

    /**@return Collection */
    public function getRoles()
    {
        $self = $this;
        return SessionCache::get('USER_ROLES', function () use ($self) {
            return Db::table('demo_core_roles')
                ->join('demo_core_user_role_associations', 'demo_core_user_role_associations.role_id', '=', 'demo_core_roles.id')
                ->where('demo_core_user_role_associations.user_id', '=', $this->user->id)->get();
        });
    }

    /**@return Collection */
    public function getGroups()
    {
        $self = $this;
        return SessionCache::get('USER_GROUPS', function () use ($self) {
            return CoreUserGroup::join('users')->where('users.id', '=', $self->user->id)->get();
        });
    }

    public function hasRole($roleCode)
    {
        $roles = $this->getRoles();
        return $roles->filter(function ($userRole) use ($roleCode) {
                return $userRole->code === $roleCode;
            })->count() > 0;
    }

    /**@return Collection */
    public function getSecurityPolicies()
    {
        $self = $this;
        return SessionCache::get('USER_SECURITY_POLICIES', function () use ($self) {
            return Db::table('demo_core_security_policies')
                ->join('demo_core_role_policy_associations', 'demo_core_role_policy_associations.policy_id', '=', 'demo_core_security_policies.id')
                ->join('demo_core_roles', 'demo_core_roles.id', '=', 'demo_core_role_policy_associations.role_id')
                ->join('demo_core_user_role_associations', 'demo_core_user_role_associations.role_id', '=', 'demo_core_roles.id')
                ->where(['demo_core_user_role_associations.user_id' => $self->user->id])->get();
        });
    }

    public function getAdminOverridePermissions()
    {
        return Db::table('demo_core_permissions')->where(['active' => true, 'admin_override' => true])->get();
    }

    public function getPermissionsByRole(Role $role)
    {
        return Db::table('demo_core_permissions')
            ->join('demo_core_permission_policy_associations', 'demo_core_permission_policy_associations.permission_id', '=', 'demo_core_permissions.id')
            ->join('demo_core_security_policies', 'demo_core_security_policies.id', '=', 'demo_core_permission_policy_associations.policy_id')
            ->join('demo_core_role_policy_associations', 'demo_core_role_policy_associations.policy_id', '=', 'demo_core_security_policies.id')
            ->join('demo_core_roles', 'demo_core_roles.id', '=', 'demo_core_role_policy_associations.role_id')
            ->where(['demo_core_roles.id' => $role->id])
            ->where('demo_core_permissions.active', '=', true)
            ->get();
    }

    /**
     * Steps:-
     * Step 1. Find all the permission for current user or Everyone Role
     * Step 2. Check if user is admin
     * Step 3. If user is an admin them merge admin permission with user permission
     * Step 4. Save permissions in cache.
     * @return Collection of permissions
     */
    public function getPermissions()
    {
        $self = $this;
        return SessionCache::get('USER_PERMISSIONS', function () use ($self) {
            $permissions = Db::table('demo_core_permissions')
                ->join('demo_core_permission_policy_associations', 'demo_core_permission_policy_associations.permission_id', '=', 'demo_core_permissions.id')
                ->join('demo_core_security_policies', 'demo_core_security_policies.id', '=', 'demo_core_permission_policy_associations.policy_id')
                ->join('demo_core_role_policy_associations', 'demo_core_role_policy_associations.policy_id', '=', 'demo_core_security_policies.id')
                ->join('demo_core_roles', 'demo_core_roles.id', '=', 'demo_core_role_policy_associations.role_id')
                ->join('demo_core_user_role_associations', 'demo_core_user_role_associations.role_id', '=', 'demo_core_roles.id')
                ->where(function ($query) use ($self) {
                    $query->where('demo_core_user_role_associations.user_id', '=', $self->user->id)
                        ->orWhere('demo_core_roles.code', '=', Role::EVERYONE);
                })->where('demo_core_permissions.active', '=', true)->get();
            if ($self->hasRole(Role::ADMIN)) {
                $permissions = $permissions->concat($self->getAdminOverridePermissions());
            }
            return $permissions;
        });
    }

    /**
     * Return the row level permissions among user's permission for givrn model and operation
     * Row Level = Columns should be empty
     */
    public function getRowLevelPermissions($modelClass, $operation)
    {
        return $this->getPermissions()->filter(function ($permission) use ($modelClass, $operation) {
            return $permission->model === $modelClass && empty($permission->columns) && $permission->operation === $operation;
        });
    }

    /**
     * Return the Column level permissions among user's permission for givrn model and operation
     * Column Level = Columns should not be empty
     */
    public function getColumnLevelPermissions($modelClass, $operation)
    {
        return $this->getPermissions()->filter(function ($permission) use ($modelClass, $operation) {
            return $permission->model === $modelClass && !empty($permission->columns) && $permission->operation === $operation;
        });
    }

    /**
     * This will check if given permissions do have any permission without a condition
     * return true if an permission with empty condition found
     */
    public function hasAstrixPermission($permissions)
    {
        return $permissions->filter(function ($permission) {
            return empty(trim($permission->condition));
        });
    }

    /**
     * This will merge all the permissions condition with or operator
     */
    public function mergeConditions($permissions)
    {
        $condition = $permissions->map(function ($permission) {
            return $permission->operation;
        })->join(' ) or ( ');
        return '(' . $condition . ')';
    }

    public function flushCache()
    {
        SessionCache::flush();
    }
}