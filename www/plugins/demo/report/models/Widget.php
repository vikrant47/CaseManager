<?php namespace Demo\Report\Models;

use Demo\Core\Classes\Beans\EvalArray;
use Demo\Core\Classes\Beans\EvalSql;
use Demo\Core\Classes\Beans\TemplateEngine;
use Demo\Core\Classes\Beans\TwigEngine;
use Demo\Core\Classes\Utils\ModelUtil;
use Demo\Core\Models\JavascriptLibrary;
use Demo\Core\Models\EngineApplication;
use Demo\Core\Services\QueryFilter;
use Demo\Core\Services\QueryPagination;
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
        'application' => [EngineApplication::class, 'nameFrom' => 'name', 'key' => 'engine_application_id'],
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

    public function loadData($context = [])
    {
        $context['widget'] = $this;
        /**@var $pagination QueryPagination */
        $pagination = $context['pagination'];
        $dataScript = $this->data;
        if ($this->isSqlScript($dataScript)) {
            $evalSql = new EvalSql($dataScript, true);
            return $evalSql->eval($context);
        }
        $templateEngine = new TemplateEngine();
        $data = $templateEngine->execute($dataScript, $context);
        if ($data instanceof QueryBuilder) {
            $query = $data;
            $filter = new QueryFilter($query);
            $filter->applyFilter($context['rules'] ?? []);
            $data = $query->get();
            $totalRecords = $query->count();
            return [
                'data' => $data, 'pagination' => $pagination->toArray($totalRecords)
            ];
        }
        if ($data instanceof EvalSql) {
            return $data->eval($context);
        }
        return $data;
    }

    public function loadTemplate($context = [])
    {
        if (empty($this->template)) {
            return null;
        }
        $twigEngine = new TwigEngine();
        return $twigEngine->compile($this->template)->render(['data' => $this->loadData($context)]);
    }

    public function loadScript($context = [])
    {
        if (empty($this->script)) {
            return null;
        }
        $twigEngine = new TwigEngine();
        return $twigEngine->compile($this->script)->render(['data' => $this->loadData($context)]);
    }

    public function evaluate($context)
    {
        $original = $this->getOriginal();
        $original['data'] = $this->loadData($context);
        $original['script'] = $this->loadScript($context);
        $original['template'] = $this->loadTemplate($context);
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
        ModelUtil::fillDefaultColumnsInBelongsToMany($this->libraries(), $this->libraries, $this->engine_application_id);
    }
}
