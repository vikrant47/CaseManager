<?php namespace Demo\Core\Models;

use Model;
use Backend\Models\User;

/**
 * Model
 */
class PluginVersions extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \Demo\Core\Classes\Traits\ModelHelper;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'system_plugin_versions';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    public $attachAuditedBy = true;
}
