<?php


namespace Demo\Core\Models;


use Backend\Models\User;
use Backend\Models\UserGroup;
use Demo\Core\Classes\Utils\ModelUtil;

class CoreUserGroup extends UserGroup
{
    /**
     * @var array Relations
     */
    public $belongsToMany = [
        'users' => [User::class, 'table' => 'backend_users_groups', 'otherKey' => 'user_id',
            'key' => 'user_group_id'],
        'users_count' => [User::class, 'table' => 'backend_users_groups', 'count' => true, 'otherKey' => 'user_id',
            'key' => 'user_group_id']
    ];

}