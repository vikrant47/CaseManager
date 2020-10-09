<?php namespace Demo\Casemanager\Models;

use Demo\Workflow\Models\Queue;
use Demo\Workflow\Models\Work;
use Demo\Workflow\Models\WorkflowState;
use Model;
use Backend\Models\User;

/**
 * Model
 */
class CaseModel extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \Demo\Core\Classes\Traits\ModelTrait;
    use \Demo\Workflow\Classes\Traits\WorkTrait;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_casemanager_cases';
    public $incrementing = false;

    public $belongsTo = [
        'assigned_to' => [User::class, 'key' => 'assigned_to_id'],
        'created_by' => [User::class, 'key' => 'created_by_id'],
        'updated_by' => [User::class, 'key' => 'updated_by_id'],
        'priority' => [CasePriority::class, 'key' => 'priority_id'],
        'workflow_state' => [WorkflowState::class, 'key' => 'workflow_state_id'],
        'queue' => [Queue::class, 'key' => 'queue_id'],
        'work' => [Work::class, 'key' => 'work_id'],

    ];
    public $attachMany = [
        'documents' => 'System\Models\File'
    ];
    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    public $attachAuditedBy = true;

}
