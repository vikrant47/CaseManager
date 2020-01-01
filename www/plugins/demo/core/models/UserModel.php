<?php


namespace Demo\Core\Models;


use Backend\Models\User;
use Backend\Models\UserGroup;

class UserModel extends User
{
    /**
     * Relations
     */
    public $belongsToMany = [
        'groups' => [
            UserGroupModel::class,
            'table' => 'backend_users_groups',
            'key' => 'user_id',
            'otherKey' => 'user_group_id'
        ]
    ];
}