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
     * @param $user
     */
    public function __construct(User $user)
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
        return SessionCache::get('USER_ROLES', Role::join('users')->where('users.id', '=', $this->user->id)->get());
    }

    /**@return Collection */
    public function getGroups()
    {
        return SessionCache::get('USER_GROUPS', CoreUserGroup::join('users')->where('users.id', '=', $this->user->id)->get());
    }

    public function hasRole(Role $role)
    {
        $roles = $this->getRoles();
        return $roles->filter(function ($userRole) use ($role) {
                return $role->id === $userRole->id;
            })->count() > 0;
    }

    /**@return Collection */
    public function getSecurityPolicies()
    {
        return SessionCache::get('USER_SECURITY_POLICIES', Db::table('demo_core_security_policies')
            ->join('demo_core_role_policy_associations', 'demo_core_role_policy_associations.policy_id', '=', 'demo_core_security_policies.id')
            ->join('demo_core_roles', 'demo_core_roles.id', '=', 'demo_core_role_policy_associations.role_id')
            ->join('demo_core_user_role_associations', 'demo_core_user_role_associations.role_id', '=', 'demo_core_roles.id')
            ->where(['demo_core_user_role_associations.user_id' => $this->user->id])->get());
    }

    /**@return Collection */
    public function getPermissions()
    {
        return SessionCache::get('USER_PERMISSIONS', Db::table('demo_core_permissions')
            ->join('demo_core_permission_policy_associations', 'demo_core_permission_policy_associations.permission_id', '=', 'demo_core_permissions.id')
            ->join('demo_core_security_policies', 'demo_core_security_policies.id', '=', 'demo_core_permission_policy_associations.policy_id')
            ->join('demo_core_role_policy_associations', 'demo_core_role_policy_associations.policy_id', '=', 'demo_core_security_policies.id')
            ->join('demo_core_roles', 'demo_core_roles.id', '=', 'demo_core_role_policy_associations.role_id')
            ->join('demo_core_user_role_associations', 'demo_core_user_role_associations.role_id', '=', 'demo_core_roles.id')
            ->where(['demo_core_user_role_associations.user_id' => $this->user->id])
            ->where('demo_core_permissions.active', '=', true)
            ->get());
    }

    public function getRowLevelPermissions($modelClass, $operation)
    {
        return $this->getPermissions()->filter(function ($permission) use ($modelClass, $operation) {
            return $permission->model === $modelClass && empty($permission->columns) && $permission->operation === $operation;
        });
    }


    public function getColumnLevelPermissions($modelClass, $operation)
    {
        return $this->getPermissions()->filter(function ($permission) use ($modelClass, $operation) {
            return $permission->model === $modelClass && !empty($permission->columns) && $permission->operation === $operation;
        });
    }

    public function hasAstrixPermission($permissions)
    {
        return $permissions->filter(function ($permission) {
            return empty(trim($permission->condition));
        });
    }

    public function mergeConditions($permissions)
    {
        $condition = $permissions->map(function ($permission) {
            return $permission->operation;
        })->join(' ) or ( ');
        return '(' . $condition . ')';
    }
}