<?php


namespace Demo\Core\Models;


use Backend\Models\User;
use Backend\Models\UserGroup;
use Demo\Core\Classes\Utils\ModelUtil;
use Demo\Core\Services\SecurityService;

class CoreUser extends User
{
    /**
     * Relations
     */
    public $belongsToMany = [
        'groups' => [
            CoreUserGroup::class,
            'table' => 'backend_users_groups',
            'key' => 'user_id',
            'otherKey' => 'user_group_id'
        ],
        'roles' => [
            Role::class,
            'table' => 'demo_core_user_role_associations',
            'key' => 'user_id',
            'otherKey' => 'role_id'
        ]
    ];

    public function beforeSave()
    {
        ModelUtil::fillDefaultColumnsInBelongsToMany($this->roles(),$this->roles,$this->plugin_id);
        // TODO : for now setting date and plugin nullable in demo_core_role_permission_associations
        parent::beforeSave();
    }
}