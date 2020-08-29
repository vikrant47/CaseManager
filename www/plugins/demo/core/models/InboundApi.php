<?php namespace Demo\Core\Models;

use Model;
use Backend\Models\User;

/**
 * Model
 */
class InboundApi extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \Demo\Core\Classes\Traits\ModelTrait;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_core_inbound_api';
public $incrementing = false;

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'application' => [EngineApplication::class,'nameFrom'=>'name', 'key' => 'engine_application_id']
    ];

    protected $fillable = ['name', 'url', 'method', 'script', 'engine_application_id'];
    public $attachAuditedBy = true;
}
