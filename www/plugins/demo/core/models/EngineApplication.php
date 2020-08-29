<?php namespace Demo\Core\Models;

use Backend\Models\UserRole;
use Demo\Core\Classes\Utils\ModelUtil;
use Demo\Report\Models\Dashboard;
use Demo\Report\Models\Widget;
use Model;

/**
 * Model
 */
class EngineApplication extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_core_applications';
    public $incrementing = false;

    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => 'required|between:2,128|unique:demo_core_applications',
        'code' => 'unique:demo_core_applications',
    ];

    public $belongsTo = [
        'application' => [EngineApplication::class,'nameFrom'=>'code', 'key' => 'plugin_code'],
    ];
}
