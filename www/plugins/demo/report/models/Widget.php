<?php namespace Demo\Report\Models;

use Demo\Core\Classes\Beans\ScriptContext;
use Demo\Core\Models\JavascriptLibrary;
use Demo\Core\Models\PluginVersions;
use Model;
use Db;

/**
 * Model
 */
class Widget extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_report_widgets';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $attachAuditedBy = true;


    public $belongsTo = [
        'plugin' => [PluginVersions::class, 'key' => 'plugin_id'],
        'library' => [JavascriptLibrary::class, 'key' => 'library_id'],
    ];

    public function isSqlScript($script)
    {
        $startWord = substr(trim($script), 0, 6);
        return strtolower($startWord) === 'select';
    }

    public function executeData()
    {
        $dataScript = $this->data;
        if ($this->isSqlScript($dataScript)) {
            return Db::select(Db::raw($dataScript));
        }
        $context = new ScriptContext();
        return $context->execute($dataScript);
    }
}
