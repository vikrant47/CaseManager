<?php namespace Demo\Core\Models;

use Demo\Core\Classes\Beans\TwigEngine;
use Model;

/**
 * Model
 */
class UiPage extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_core_ui_pages';
public $incrementing = false;

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $attachAuditedBy = true;


    public $belongsTo = [
        'plugin' => [PluginVersions::class, 'key' => 'plugin_id'],
    ];
}
