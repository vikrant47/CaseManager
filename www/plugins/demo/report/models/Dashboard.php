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
public $incrementing = false;

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];


    public $attachAuditedBy = true;


    public $belongsTo = [
        'plugin' => [PluginVersions::class,'nameFrom'=>'code', 'key' => 'plugin_id'],
        'widget' => [Widget::class]
    ];

    public $jsonable = ['widgets_config'];
}
