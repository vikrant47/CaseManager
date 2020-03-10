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

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'plugin' => [PluginVersions::class, 'key' => 'plugin_id']
    ];

    protected $fillable = ['name', 'url', 'method', 'script', 'plugin_id'];
    public $attachAuditedBy = true;
}
