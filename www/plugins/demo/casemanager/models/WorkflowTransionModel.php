<?php namespace Demo\Casemanager\Models;

use Model;
use Backend\Models\User;
/**
 * Model
 */
class WorkflowTransionModel extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \Demo\CaseManager\Classes\Traits\ModelHelper;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_casemanager_workflow_transitions';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    public $attachAuditedBy = true;

    public $belongsTo = [
        'created_by' => [User::class, 'key' => 'created_by_id'],
        'updated_by' => [User::class, 'key' => 'updated_by_id'],
        'workflow_entity' => [WorkflowEntitiesModel::class, 'key' => 'workflow_entity_id'],
        'from_state' => [WorkflowStateModel::class, 'key' => 'from_state_id'],
        'to_state' => [WorkflowStateModel::class, 'key' => 'to_state_id'],
    ];
}
