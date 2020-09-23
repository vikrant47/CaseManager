<?php


namespace Demo\Core\Services;


use Demo\Core\Classes\Beans\TwigEngine;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class RestQuery
{
    /**@var $queryBuilder Builder */
    protected $queryBuilder;
    protected $json;
    protected $model;

    public function __construct($queryBuilder, $json, array $fields = null, $model = null)
    {
        if (is_string($queryBuilder)) {
            $queryBuilder = DB::table($queryBuilder);
        }
        $this->queryBuilder = $queryBuilder;
        $this->json = self::evalJSON($json);
        if (!empty($model)) {
            $this->json['model'] = $model;
        }
    }

    public static function evalJSON($json)
    {
        if (is_array($json)) {
            $json = json_encode($json);
        }
        $json = TwigEngine::eval($json);
        return json_decode($json, true);
    }

    public function apply()
    {
        return $this->parse($this->json, $this->queryBuilder);
    }

    /***Parse filter and build query
     * @param $json array
     * @param Builder $queryBuilder
     * @return Builder
     * @throws \timgws\QBParseException
     */
    public function parse($json, $queryBuilder)
    {
        $sourceModelInstance = new $json['model']();
        $sourceTable = $sourceModelInstance->getTable();
        if (array_key_exists('include', $json) && is_array($json['include'])) {
            foreach ($json['include'] as $join) {
                $includedModel = new $join['model']();
                $includedTable = $includedModel->getTable();
                $join['alias'] = array_key_exists('alias', $join) ? $join['alias'] : $includedTable;
                $queryBuilder->join(
                    $includedTable,
                    $join['alias'] . '.' . $join['key'],
                    '=',
                    $sourceTable . '.' . $join['targetKey']
                );
                $this->parse($join, $queryBuilder);
            }
        }
        if (!empty($json['where'])) {
            $queryFilter = new QueryFilter($queryBuilder, $json['where'] ?? [], $json['alias'] ?? null, $json['fields'] ?? null, false);
            $queryFilter->applyFilter();
        }
    }
}