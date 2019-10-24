<?php namespace Demo\Core\Models;

use Model;
use Backend\Models\User;
/**
 * Model
 */
class InboundApiModel extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \Demo\Core\Classes\Traits\ModelHelper;
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


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
        'created_by' => [User::class, 'key' => 'created_by_id'],
        'updated_by' => [User::class, 'key' => 'updated_by_id'],
        'plugin' => [PluginModel::class, 'key' => 'plugin_id']
    ];
    public $attachAuditedBy = true;
}
