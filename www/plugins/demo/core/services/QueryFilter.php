<?php


namespace Demo\Core\Services;


use Demo\Core\Classes\Beans\TwigEngine;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use timgws\QBPFunctions;
use timgws\QueryBuilderParser;

class QueryFilter extends QueryBuilderParser
{
    /**Overriding default Operator and query mapping*/
    protected $operator_sql = array(
        'equal' => array('operator' => '='),
        'not_equal' => array('operator' => '!='),
        'in' => array('operator' => 'IN'),
        'not_in' => array('operator' => 'NOT IN'),
        'less' => array('operator' => '<'),
        'less_or_equal' => array('operator' => '<='),
        'greater' => array('operator' => '>'),
        'greater_or_equal' => array('operator' => '>='),
        'between' => array('operator' => 'BETWEEN'),
        'not_between' => array('operator' => 'NOT BETWEEN'),
        'begins_with' => array('operator' => 'ILIKE', 'prepend' => '%'),
        'not_begins_with' => array('operator' => 'NOT ILIKE', 'prepend' => '%'),
        'contains' => array('operator' => 'ILIKE', 'append' => '%', 'prepend' => '%'),
        'not_contains' => array('operator' => 'NOT ILIKE', 'append' => '%', 'prepend' => '%'),
        'ends_with' => array('operator' => 'ILIKE', 'append' => '%'),
        'not_ends_with' => array('operator' => 'NOT ILIKE', 'append' => '%'),
        'is_empty' => array('operator' => '='),
        'is_not_empty' => array('operator' => '!='),
        'is_null' => array('operator' => 'NULL'),
        'is_not_null' => array('operator' => 'NOT NULL')
    );
    protected $fields;

    /**@var $query Builder */
    protected $query;
    protected $filter;

    /**@return Builder */
    static function getQuery($options)
    {
        $table = $options['table'];
        $limit = $options['limit'];
        $offset = $options['offset'];
        $modelClass = $options['model'];
        $filter = $options['filter'];
        $attributes = $options['attributes'];
        if (empty($table)) {
            $modelInstance = new $modelClass();
            $table = $modelInstance->getTable();
        }
        /**@var $query \October\Rain\Database\Builder */
        $query = Db::table($table);
        if (!empty($filter)) {
            $filterService = new QueryFilter($query, $filter);
            $filterService->applyFilter();
        }
        if (!empty($limit)) {
            $query->limit($limit);
        }
        if (!empty($offset)) {
            $query->offset($offset);
        }
        if (!empty($attributes)) {
            $query->select($attributes);
        }
        return $query;
    }

    static function execute($options)
    {
        $query = self::getQuery($options);
        return $query->get();
    }

    public function __construct($query, $filter, array $fields = null)
    {
        parent::__construct($fields);
        if (is_string($query)) {
            $query = DB::table($query);
        }
        $this->query = $query;
        if (is_array($filter)) {
            $filter = json_encode($filter);
        }
        $this->filter = $filter;
    }

    public function __toString()
    {
        return $this->sql();
    }

    public function isEmpty()
    {
        return strlen($this->filter) === 0;
    }

    /**@param $fields array */
    public function setField($fields = null)
    {
        $this->fields = $fields;
    }

    public function evalFilter()
    {
        $this->filter = TwigEngine::eval($this->filter);
    }

    /**
     * @param string $prepend
     * @param null $alias
     * @return string
     */
    public function sql($prepend = '', $alias = null)
    {
        if (!$this->isEmpty()) {
            $this->applyFilter();
            $sql = $this->query->toSql();
            if (strlen($sql) > 0) {
                $whereIndex = strpos($sql, 'where');
                if ($whereIndex) {
                    $sql = substr($sql, $whereIndex + 5); // removing everything before where
                } else {
                    return '';
                }
            }
            if ($alias) {
                // $fields = $this->query->
            }
            if (strlen($sql) > 0) {
                return $prepend . ' ' . $sql;
            }
        }
        return '';
    }

    public function applyFilter()
    {
        if (!$this->isEmpty()) {
            $query = $this->query;
            if ($query instanceof \October\Rain\Database\Builder) {
                $query = $query->getQuery();
            }
            $this->evalFilter();
            $this->parse($this->filter, $query);
        }
    }

}