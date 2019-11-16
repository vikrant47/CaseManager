<?php namespace Demo\Core\Models;

use Demo\Core\Classes\Helpers\PluginConnection;
use Model;

/**
 * Model
 */
class EventHandler extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_core_event_handlers';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $attachAuditedBy = true;

    public $belongsTo = [
        'created_by' => [User::class, 'key' => 'created_by_id'],
        'updated_by' => [User::class, 'key' => 'updated_by_id'],
        'plugin' => [PluginVersions::class, 'key' => 'plugin_id']
    ];

    public function getModelOptions()
    {
        return PluginConnection::getAllModelAlias(true);
    }

    public function handler($eventName, $model)
    {
        return eval($this->script);
    }
}
