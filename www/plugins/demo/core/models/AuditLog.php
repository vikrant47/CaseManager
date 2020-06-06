<?php namespace Demo\Core\Models;

use Model;

/**
 * Model
 */
class AuditLog extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_core_audit_logs';
public $incrementing = false;

    public $jsonable = ['previous'];
    public $attachAuditedBy = true;
    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
