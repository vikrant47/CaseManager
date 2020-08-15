<?php namespace Demo\Tenant\Models;

use Model;

/**
 * Model
 */
class TenantApplication extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_tenant_applications';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
