<?php namespace Demo\Core\Models;

use Demo\Core\Classes\Beans\ScriptContext;
use Demo\Core\Classes\Helpers\PluginConnection;
use Model;

/**
 * Model
 */
class Command extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_core_commands';
public $incrementing = false;

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'created_by' => [User::class, 'key' => 'created_by_id'],
        'updated_by' => [User::class, 'key' => 'updated_by_id'],
        'plugin' => [PluginVersions::class,'nameFrom'=>'code', 'key' => 'plugin_id']
    ];
    public $attachAuditedBy = true;

    public $jsonable = ['parameters', 'arguments'];

    public function getModelOptions()
    {
        return PluginConnection::getAllModelAlias(true);
    }

    public function execute()
    {
        $context = new ScriptContext();
        return $context->execute($this->script, ['command' => $this]);
    }
}
