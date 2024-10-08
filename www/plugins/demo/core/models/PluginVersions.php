<?php namespace Demo\Core\Models;

use Model;
use Backend\Models\User;

/**
 * Model
 */
class PluginVersions extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \Demo\Core\Classes\Traits\ModelTrait;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'system_plugin_versions';
public $incrementing = false;

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    public $attachAuditedBy = true;
}
