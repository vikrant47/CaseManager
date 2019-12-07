<?php namespace Demo\Report\Models;

use Demo\Core\Models\JavascriptLibrary;
use Demo\Core\Models\PluginVersions;
use Model;

/**
 * Model
 */
class Dashboard extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_report_dashboards';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];


    public $attachAuditedBy = true;


    public $belongsTo = [
        'plugin' => [PluginVersions::class, 'key' => 'plugin_id'],
        'report' => [Widget::class]
    ];

    public $jsonable = ['reports_config'];
}
