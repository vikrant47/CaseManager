<?php namespace Demo\Workflow\Models;

use Model;
use Backend\Models\User;

/**
 * Model
 */
class QueueItemModel extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \Demo\Core\Classes\Traits\ModelHelper;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_workflow_queue_items';

    public $belongsTo = [
        'created_by' => [User::class, 'key' => 'created_by_id'],
        'updated_by' => [User::class, 'key' => 'updated_by_id'],
        'queue' => [QueueModel::class, 'key' => 'queue_id'],
        'plugin' => [\Demo\Core\Models\PluginModel::class, 'key' => 'plugin_id']
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $attachAuditedBy = true;
}
