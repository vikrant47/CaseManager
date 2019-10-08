<?php namespace Demo\Casemanager\Models;

use Briddle\Workflow\Models\Workflow;
use Model;
use Backend\Models\User;

/**
 * Model
 */
class WorkflowEntitiesModel extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \Demo\CaseManager\Classes\Traits\UserAuditSupport;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_casemanager_workflow_entities';

    public $belongsTo = [
        'created_by' => [User::class, 'key' => 'created_by_id'],
        'updated_by' => [User::class, 'key' => 'updated_by_id'],
        'assigned_to' => [User::class, 'key' => 'assigned_to_id'],
        'workflow' => [Workflow::class, 'key' => 'workflow_id'],
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];


}
