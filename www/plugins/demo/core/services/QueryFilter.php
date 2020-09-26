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
    protected $rules;
    protected $alias;
    protected $eval;

    /**@return Builder */
    static function getQuery($options)
    {
        $table = $options['table'];
        /**@var $pagination QueryPagination */
        $pagination = $options['pagination'];
        $modelClass = $options['model'];
        $rules = $options['where'];
        $attributes = $options['attributes'];
        if (empty($table)) {
            $modelInstance = new $modelClass();
            $table = $modelInstance->getTable();
        }
        /**@var $query \October\Rain\Database\Builder */
        $query = Db::table($table);
        if (!empty($rules)) {
            $rulesService = new QueryFilter($query, $rules);
            $rulesService->applyFilter();
        }
        if (!empty($pagination)) {
            $query->offset($pagination->offset);
            if ($pagination->hasLimit()) {
                $query->limit($pagination->limit);
            }
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

    public function __construct($query, $rules, $alias = null, array $fields = null, $eval = true)
    {
        parent::__construct($fields);
        if (is_string($query)) {
            $query = DB::table($query);
        }
        $this->query = $query;
        if (is_array($rules)) {
            $rules = json_encode($rules);
        }
        $this->rules = $rules;
        $this->alias = $alias;
        $this->eval = $eval;
    }

    public function __toString()
    {
        return $this->sql();
    }

    public function isEmpty()
    {
        return strlen($this->rules) === 0;
    }

    /**@param $fields array */
    public function setField($fields = null)
    {
        $this->fields = $fields;
    }

    public function evalFilter()
    {
        $this->rules = TwigEngine::eval($this->rules);
    }

    /**@param $query Builder */
    public function toRawSql($query)
    {
        return array_reduce($query->getBindings(), function ($sql, $binding) {
            return preg_replace('/\?/', is_numeric($binding) ? $binding : "'" . $binding . "'", $sql, 1);
        }, $query->toSql());
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
            $sql = $this->toRawSql($this->query);
            if (strlen($sql) > 0) {
                $whereIndex = strpos($sql, 'where');
                if ($whereIndex !== false) {
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

    public function appendAlias(array $rules)
    {
        foreach ($rules as $rule) {
            /*
             * If makeQuery does not see the correct fields, it will return the QueryBuilder without modifications
             */
            if (strpos($rule['field'], '.')) {
                throw new \Exception('Fields already aliased unable to add alias');
            }
            $rule['field'] = $this->alias . '.' . $rule['field'];
            if ($this->isNested($rule)) {
                return $this->appendAlias($rule['rules']);
            }
        }
        return $this;
    }

    public function applyFilter()
    {
        if (!$this->isEmpty()) {
            $query = $this->query;
            if ($query instanceof \October\Rain\Database\Builder) {
                $query = $query->getQuery();
            }
            if ($this->eval) {
                $this->evalFilter();
            }
            $this->parse($this->rules, $query);
        }
    }

}
