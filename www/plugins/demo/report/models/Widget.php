<?php namespace Demo\Report\Models;

use Demo\Core\Classes\Beans\ScriptContext;
use Demo\Core\Classes\Beans\TwigEngine;
use Demo\Core\Models\JavascriptLibrary;
use Demo\Core\Models\PluginVersions;
use Model;
use Db;

/**
 * Model
 */
class Widget extends Model
{
    private $loadedData = null;
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

    public function loadData()
    {
        if (empty($this->loadedData)) {
            $dataScript = $this->data;
            if ($this->isSqlScript($dataScript)) {
                return Db::select(Db::raw($dataScript));
            }
            $context = new ScriptContext();
            $this->loadedData = $context->execute($dataScript);
        }
        return $this->loadedData;
    }

    public function loadTemplate()
    {
        if (empty($this->template)) {
            return null;
        }
        $twigEngine = new TwigEngine();
        return $twigEngine->compile($this->template)->render(['data' => $this->loadData()]);
    }

    public function loadScript()
    {
        if (empty($this->script)) {
            return null;
        }
        $twigEngine = new TwigEngine();
        return $twigEngine->compile($this->script)->render(['data' => $this->loadData()]);
    }

    public function evaluate()
    {
        $original = $this->getOriginal();
        $original['data'] = $this->loadData();
        $original['script'] = $this->loadScript();
        $original['template'] = $this->loadTemplate();
        return $original;
    }
}
