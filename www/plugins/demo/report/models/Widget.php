<?php namespace Demo\Report\Models;

use Demo\Core\Classes\Beans\ScriptContext;
use Demo\Core\Classes\Beans\TwigEngine;
use Demo\Core\Classes\Utils\ModelUtil;
use Demo\Core\Models\JavascriptLibrary;
use Demo\Core\Models\PluginVersions;
use Doctrine\DBAL\Query\QueryBuilder;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Model;
use Db;

/**
 * Model
 */
class Widget extends Model implements FromCollection
{
    use \Maatwebsite\Excel\Concerns\Exportable;
    const SUPPORTED_EXPORT_FORMATS = ['xls', 'pdf', 'csv'];

    private $loadedData = null;
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_report_widgets';
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
    public $belongsToMany = [
        'libraries' => [
            JavascriptLibrary::class,
            'table' => 'demo_report_widget_library_associations',
            'key' => 'widget_id',
            'otherKey' => 'library_id'
        ],
    ];

    public function isSqlScript($script)
    {
        $startWord = substr(trim($script), 0, 6);
        return strtolower($startWord) === 'select';
    }

    public function loadData($page = 1, $perPage = 20)
    {
        $dataScript = $this->data;
        if ($this->isSqlScript($dataScript)) {
            $dataScript = TwigEngine::eval($dataScript, [
                'offset' => ($page - 1) * $perPage,
                'limit' => $page * $perPage - 1,
            ]);
            $data = Db::select(Db::raw($dataScript));
            $paginator = new Paginator(Collection::make($data), $perPage, $page);
            return $paginator;
        }
        $context = new ScriptContext();
        $context->setAttribute('page', $page);
        $data = $context->execute($dataScript);
        if ($data instanceof QueryBuilder) {
            return $data->paginate($page);
        }
        return $data;
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

    /**Excel collection export implementation*/
    public function collection()
    {
        $data = $this->loadData();
        if (is_array($data)) {
            $data = new Collection($data);
        }
        return $data;
    }

    public function beforeSave()
    {
        ModelUtil::fillDefaultColumnsInBelongsToMany($this->libraries(), $this->libraries, $this->plugin_id);
    }
}
