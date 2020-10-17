<?php namespace Demo\Workspace\Models;

use Model;

/**
 * Model
 */
class QueueRoutingRule extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_workspace_queue_routing_rules';
public $incrementing = false;

    public $belongsTo = [
        'application' => [\Demo\Core\Models\EngineApplication::class, 'key' => 'engine_application_id']
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $attachAuditedBy = true;
}
