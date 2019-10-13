<?php namespace Demo\Casemanager\Models;

use Model;
use Backend\Models\User;

/**
 * Model
 */
class CaseModel extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \Demo\CaseManager\Classes\Traits\ModelHelper;
    use \Demo\CaseManager\Classes\Traits\WorkflowEntity;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_casemanager_cases';

    public $belongsTo = [
        'created_by' => [User::class, 'key' => 'created_by_id'],
        'updated_by' => [User::class, 'key' => 'updated_by_id'],
        'priority' => [CasePriorityModel::class, 'key' => 'priority_id'],
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    public $attachAuditedBy = true;

}
