<?php namespace Demo\Workflow\Models;

use Demo\Core\Models\ModelModel;
use Demo\Core\Services\EventHandlerServiceProvider;
use Model;

/**
 * Model
 */
class ServiceChannel extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_workflow_service_channels';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'plugin' => [\Demo\Core\Models\PluginVersions::class, 'key' => 'plugin_id'],
        'model_ref' => [ModelModel::class, 'key' => 'model', 'otherKey' => 'model'],
    ];

    public function getEventOptions()
    {
        return EventHandlerServiceProvider::$MODEL_EVENTS_OPTIONS;
    }

    public $jsonable = ['event'];

    public $attachAuditedBy = true;

}
