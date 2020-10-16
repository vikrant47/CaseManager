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
    protected $alias;

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
            $rulesService = new QueryFilter($query);
            $rulesService->applyFilter($rules);
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

    public function __construct($query, $alias = null, array $fields = null)
    {
        parent::__construct($fields);
        $this->alias = $alias;
        $this->setQuery($query);
    }

    public function makeRules($rules)
    {
        if (is_array($rules)) {
            return json_encode($rules);
        }
        return $rules;
    }

    /**
     * @param Builder|string $query
     * @param null|string $connection The connection string
     */
    public function setQuery($query, $connection = null)
    {
        if (is_string($query)) {
            if ($connection !== null) {
                $query = DB::connection($connection)->table($query);
            } else {
                $query = DB::table($query);
            }
        }
        $this->query = $query;
    }

    /**
     * This will merge all the permissions condition with or operator
     * @param $conditions
     * @param bool $eval weather or not evaluate the given condition expression
     * @return array
     */
    public static function mergeConditions($conditions, $operator = 'AND', $eval = true)
    {
        if ($eval === true) {
            $conditions = json_decode(TwigEngine::eval(json_encode($conditions), []), true);
        }
        return [
            'condition' => $operator,
            'rules' => $conditions,
        ];
    }

    public function __toString()
    {
        return $this->sql();
    }

    public function isEmptyRules($rules)
    {
        return strlen($rules) === 0;
    }

    /**@param $fields array */
    public function setField($fields = null)
    {
        $this->fields = $fields;
    }

    public function evalFilter($rules)
    {
        return TwigEngine::eval($rules);
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
     * @param array $rules
     * @param bool $eval
     * @return string
     */
    public function sql($prepend = '', $rules = [], $eval = true)
    {
        if (!$this->isEmptyRules()) {
            $this->applyFilter($rules, $eval);
            $sql = $this->toRawSql($this->query);
            if (strlen($sql) > 0) {
                $whereIndex = strpos($sql, 'where');
                if ($whereIndex !== false) {
                    $sql = substr($sql, $whereIndex + 5); // removing everything before where
                } else {
                    return '';
                }
            }
            if ($this->alias) {
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

    public function applyFilter($rules = null, $eval = true)
    {
        if ($rules !== null) {
            $rules = $this->makeRules($rules);
        }
        $query = $this->query;
        if (!$this->isEmptyRules($rules)) {
            if ($query instanceof \October\Rain\Database\Builder) {
                $query = $query->getQuery();
            }
            if ($eval === true) {
                $rules = $this->evalFilter($rules);
            }
            $this->parse($rules, $query);
        }
        return $query;
    }

    public static function apply($query, $rules = null, $eval = true)
    {
        $qf = new QueryFilter($query);
        return $qf->applyFilter($rules, $eval);
    }
}
