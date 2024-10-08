<?php namespace Demo\Casemanager\Models;

use Model;
use Backend\Models\User;

/**
 * Model
 */
class CasePriority extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \Demo\Core\Classes\Traits\ModelTrait;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_casemanager_case_priorities';
    public $incrementing = false;

    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => 'required',
        'value' => 'required|numeric|min:0',
    ];

    public $belongsTo = [
        'created_by' => [User::class, 'key' => 'created_by_id'],
        'updated_by' => [User::class, 'key' => 'updated_by_id'],
    ];

    public $attachAuditedBy = true;

}
