<?php namespace Demo\Core\Models;

use Model;

/**
 * Model
 */
class Iframe extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_core_iframes';
public $incrementing = false;

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $attachAuditedBy = true;

    public $jsonable = ['backend_menu'];

    public $belongsTo = [
        'plugin' => [PluginVersions::class,'nameFrom'=>'code', 'key' => 'plugin_id']
    ];
}
