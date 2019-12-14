<?php namespace Demo\Core\Models;

use Demo\Core\Classes\Helpers\PluginConnection;
use Model;

/**
 * Model
 */
class CustomField extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_core_custom_fields';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $attachAuditedBy = true;

    public $belongsTo = [
        'plugin' => [PluginVersions::class, 'key' => 'plugin_id']
    ];

    public function getModelOptions()
    {
        return PluginConnection::getAllModelAlias(true);
    }

}
