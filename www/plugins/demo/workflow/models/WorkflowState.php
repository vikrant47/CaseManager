<?php namespace Demo\Workflow\Models;

use Model;
use Backend\Models\User;

/**
 * Model
 */
class WorkflowState extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \Demo\Core\Classes\Traits\ModelTrait;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_workflow_workflow_states';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    public $attachAuditedBy = true;

    public $belongsTo = [
        'created_by' => [User::class, 'key' => 'created_by_id'],
        'updated_by' => [User::class, 'key' => 'updated_by_id'],
        'plugin' => [\Demo\Core\Models\PluginVersions::class, 'key' => 'plugin_id']
    ];
}
