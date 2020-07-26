<?php


namespace Demo\Core\Services;


use Demo\Core\Classes\Beans\TwigEngine;
use timgws\QBPFunctions;
use timgws\QueryBuilderParser;

class FilterService extends QueryBuilderParser
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

    public function __construct(array $fields = null)
    {
        parent::__construct($fields);
    }

    /**@param $fields array */
    public function setField($fields = null)
    {
        $this->fields = $fields;
    }

    public function applyFilter($query, $filter)
    {
        if ($query instanceof \October\Rain\Database\Builder) {
            $query = $query->getQuery();
        }
        if (is_array($filter)) {
            $filter = json_encode($filter);
        }
        $filter = TwigEngine::eval($filter);
        $this->parse($filter, $query);
    }
}