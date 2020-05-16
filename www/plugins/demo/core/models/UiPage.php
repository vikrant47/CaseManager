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
    public $table = 'demo_core_ui_page';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $attachAuditedBy = true;


    public $belongsTo = [
        'plugin' => [PluginVersions::class, 'key' => 'plugin_id'],
    ];

    public function renderTemplate($controller)
    {
        if (empty($this->template)) {
            return '';
        }
        $twigEngine = new TwigEngine();
        return $twigEngine->compile($this->template)->render([
            'model' => $this,
            'controller' => $controller
        ]);
    }
}
