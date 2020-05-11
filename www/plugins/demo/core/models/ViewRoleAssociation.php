<?php namespace Demo\Core\Models;

use Backend\Models\UserRole;
use Model;

/**
 * Model
 */
class ViewRoleAssociation extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_core_view_role_associations';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'role_id' => 'required',
        'navigation_id' => 'required',
        'plugin_id' => 'required',
    ];

    public $belongsTo = [
        'plugin' => [PluginVersions::class, 'key' => 'plugin_id'],
        'navigation' => [Navigation::class, 'key' => 'navigation_id'],
        'role' => [UserRole::class, 'key' => 'role_id'],
    ];
}
