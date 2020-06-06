<?php namespace Demo\Core\Models;

use Backend\Models\UserGroup;
use Backend\Models\UserRole;
use Demo\Core\Classes\Utils\ModelUtil;
use Demo\Core\Services\SecurityService;
use Model;
use October\Rain\Auth\Models\Role;
use October\Rain\Database\Collection;
use Schema;

/**
 * Model
 */
class Permission extends Model
{
    use \October\Rain\Database\Traits\Validation;

    const READ = 'read';
    const WRITE = 'write';
    const DELETE = 'delete';
    const CREATE = 'create';
    const VIEW = 'view';

    const TYPES = [self::READ, self::WRITE, self::CREATE, self::DELETE];
    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_core_permissions';
public $incrementing = false;

    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => 'required',
        'model' => 'required',
        'plugin_id' => 'required',
        'operation' => 'required'
    ];

    public $belongsTo = [
        'plugin' => [PluginVersions::class, 'key' => 'plugin_id'],
        'model_ref' => [ModelModel::class, 'key' => 'model', 'otherKey' => 'model'],
    ];

    public $belongsToMany = [
        'policies' => [
            SecurityPolicy::class,
            'table' => 'demo_core_permission_policy_associations',
            'key' => 'permission_id',
            'otherKey' => 'policy_id'
        ]
    ];

    public $jsonable = ['columns'];

    public $attachAuditedBy = true;

    public function getColumnsOptions()
    {
        $options = [];
        if (!empty($this->model)) {
            $modelRef = new $this->model();
            $columns = Schema::getColumnListing($modelRef->table);
            foreach ($columns as $column) {
                $options[$column] = $column;
            }
        }
        return $options;
    }

    public function beforeSave()
    {
        $securityService = new SecurityService();
        $level = empty($this->columns) ? 'row' : 'column';
        $this->code = $securityService->getPermissionPrefix($this->model) . '.' . $level . '.' . $this->operation;
        ModelUtil::fillDefaultColumnsInBelongsToMany($this->policies(), $this->policies, $this->plugin_id);
        // TODO : for now setting date and plugin nullable in demo_core_role_permission_associations
    }
}
