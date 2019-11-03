<?php namespace Demo\Reports\Models;

use Demo\Core\Models\PluginModel;
use Model;

/**
 * Model
 */
class ReportModel extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_reports_reports';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'plugin' => [PluginModel::class, 'key' => 'plugin_id']
    ];
    public $attachAuditedBy = true;
}
