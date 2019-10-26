<?php namespace Demo\Core\Models;

use Model;

/**
 * Model
 */
class CommandModel extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_core_commands';

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
