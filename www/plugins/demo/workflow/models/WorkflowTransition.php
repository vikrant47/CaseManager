<?php namespace Demo\Workflow\Models;

use Model;
use Backend\Models\User;
/**
 * Model
 */
class WorkflowTransition extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \Demo\Core\Classes\Traits\ModelHelper;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_workflow_workflow_transitions';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    public $attachAuditedBy = true;

    public $belongsTo = [
        'created_by' => [User::class, 'key' => 'created_by_id'],
        'updated_by' => [User::class, 'key' => 'updated_by_id'],
        'workflow_entity' => [WorkflowItem::class, 'key' => 'workflow_entity_id'],
        'from_state' => [WorkflowState::class, 'key' => 'from_state_id'],
        'to_state' => [WorkflowState::class, 'key' => 'to_state_id'],
        'plugin' => [\Demo\Core\Models\PluginVersions::class, 'key' => 'plugin_id']
    ];
}
