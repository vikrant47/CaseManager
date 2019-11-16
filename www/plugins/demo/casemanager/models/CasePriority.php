<?php namespace Demo\Casemanager\Models;

use Model;
use Backend\Models\User;
/**
 * Model
 */
class CasePriority extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \Demo\Core\Classes\Traits\ModelHelper;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_casemanager_case_priorities';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'created_by' => [User::class, 'key' => 'created_by_id'],
        'updated_by' => [User::class, 'key' => 'updated_by_id'],
    ];

    public $attachAuditedBy = true;

}
