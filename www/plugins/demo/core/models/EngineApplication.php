<?php namespace Demo\Core\Models;

use Backend\Models\UserRole;
use Demo\Core\Classes\Helpers\PluginConnection;
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

    const ENGINE_APP_ID = 'dc81b635-1d0a-4f3e-83af-13642d56abe4';
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
    /**@return EngineApplication */
    public static function getCurrentApplication()
    {
        $request = request();
        $currentApplication = $request->attributes->get('CURRENT_APPLICATION_INSTANCE');
        $currentPluginCode = PluginConnection::getCurrentPlugin();
        if (empty($currentApplication)) {
            $currentApplication = EngineApplication::where(['plugin_code' => $currentPluginCode])->first();
            if (empty($currentApplication)) {
                $currentApplication = new EngineApplication();
                $currentApplication->id = EngineApplication::ENGINE_APP_ID;
                $currentApplication->code = 'engine';
                $currentApplication->plugin_code = $currentPluginCode;
            }
            $request->attributes->set('CURRENT_APPLICATION_INSTANCE', $currentApplication);
        }
        return $currentApplication;
    }
}
