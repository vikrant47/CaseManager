<?php namespace Demo\Core\Models;

use Demo\Core\Classes\Beans\ScriptContext;
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
public $incrementing = false;

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $attachAuditedBy = true;

    public $belongsTo = [
        'plugin' => [PluginVersions::class,'nameFrom'=>'code', 'key' => 'plugin_id'],
        'model_ref' => [ModelModel::class, 'key' => 'model', 'otherKey' => 'model'],
    ];

    public function getModelOptions()
    {
        return PluginConnection::getAllModelAlias(true);
    }

    public function handler($eventName, $model)
    {
        $context = new ScriptContext();
        return $context->execute($this->script, ['eventName' => $context, 'model' => $model]);
    }
}
