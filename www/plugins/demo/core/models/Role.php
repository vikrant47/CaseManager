<?php namespace Demo\Core\Models;

use Backend\Models\UserRole;
use Demo\Core\Classes\Utils\ModelUtil;
use Demo\Report\Models\Dashboard;
use Demo\Report\Models\Widget;
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
        'name' => 'required|between:2,128|unique:demo_core_roles',
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
    public $morphedByMany = [
        'navigations' => [
            Navigation::class,
            'name' => 'viewable',
            'table' => 'demo_core_view_role_associations',
            'key' => 'role_id',
            'otherKey' => 'record_id',
            'morphTypeKey' => 'model',
        ],
        'uipages' => [
            UiPage::class,
            'name' => 'viewable',
            'table' => 'demo_core_view_role_associations',
            'key' => 'role_id',
            'otherKey' => 'record_id',
            'morphTypeKey' => 'model',
        ],
        'list_actions' => [
            ListAction::class,
            'name' => 'viewable',
            'table' => 'demo_core_view_role_associations',
            'key' => 'role_id',
            'otherKey' => 'record_id',
            'morphTypeKey' => 'model',
        ],
        'form_actions' => [
            FormAction::class,
            'name' => 'viewable',
            'table' => 'demo_core_view_role_associations',
            'key' => 'role_id',
            'otherKey' => 'record_id',
            'morphTypeKey' => 'model',
        ],
        'widgets' => [
            Widget::class,
            'name' => 'viewable',
            'table' => 'demo_core_view_role_associations',
            'key' => 'role_id',
            'otherKey' => 'record_id',
            'morphTypeKey' => 'model',
        ],
        'dashboards' => [
            Dashboard::class,
            'name' => 'viewable',
            'table' => 'demo_core_view_role_associations',
            'key' => 'role_id',
            'otherKey' => 'record_id',
            'morphTypeKey' => 'model',
        ]
    ];

    /* public $morphToMany = [
         'navigations' => [Navigation::class, 'name' => 'model']
     ];*/

    public $attachAuditedBy = true;

    public function beforeSave()
    {
        ModelUtil::fillDefaultColumnsInBelongsToMany($this->policies(), $this->policies, $this->plugin_id);
        ModelUtil::fillDefaultColumnsInBelongsToMany($this->navigations(), $this->navigations, $this->plugin_id);
        ModelUtil::fillDefaultColumnsInBelongsToMany($this->uipages(), $this->uipages, $this->plugin_id);
        ModelUtil::fillDefaultColumnsInBelongsToMany($this->list_actions(), $this->list_actions, $this->plugin_id);
        ModelUtil::fillDefaultColumnsInBelongsToMany($this->form_actions(), $this->form_actions, $this->plugin_id);
        ModelUtil::fillDefaultColumnsInBelongsToMany($this->widgets(), $this->widgets, $this->plugin_id);
        ModelUtil::fillDefaultColumnsInBelongsToMany($this->dashboards(), $this->dashboards, $this->plugin_id);
        // TODO : for now setting date and plugin nullable in demo_core_role_permission_associations
    }
}
