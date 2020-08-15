<?php namespace Demo\Tenant\Models;

use Demo\Core\Models\PluginVersions;
use Model;

/**
 * Model
 */
class Tenant extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;
    public $incrementing = false;
    public $attachAuditedBy = true;
    public $attachOne = [
        'logo' => 'System\Models\File'
    ];
    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_tenant_tenants';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    public $belongsToMany = [
        'applications' => [
            PluginVersions::class,
            'table' => 'demo_tenant_applications',
            'key' => 'tenant_id',
            'otherKey' => 'application_id',
            'where'=>['code','ILIKE','Demo%'],
        ],
    ];
}
