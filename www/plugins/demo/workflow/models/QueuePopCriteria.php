<?php namespace Demo\Workflow\Models;

use Model;

/**
 * Model
 */
class QueuePopCriteria extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_workflow_queue_pop_criterias';

    public $belongsTo = [
        'plugin' => [\Demo\Core\Models\PluginVersions::class, 'key' => 'plugin_id']
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $attachAuditedBy = true;
}
