<?php


namespace Demo\Core\Classes\Beans\Filter;


use PhpParser\Error;

class SqlRuleOperator
{
    const config = [
        '=' => 'equal',
        '!=' => 'notEqual',
        '<' => 'lt',
        '<=' => 'lte',
        '>' => 'gt',
        '>=' => 'gte',
        'LIKE' => 'like',
        'ILIKE' => 'iLike',
        'NOT LIKE' => 'notLike',
        'IN' => 'in',
        'NOT IN' => 'notIn',
        'BETWEEN' => 'between',
        'NOT BETWEEN' => 'notBetween',
        'IS' => 'is',
        'IS NOT' => 'isNot',
    ];
    const inverseOperators = [
        'contains' => 'not_contains',
        'ends_with' => 'not_ends_with',
        'begins_with' => 'not_begins_with',
    ];

    public function get($operator, $value)
    {
        return $this->{self::config[$operator]}($value);
    }

    public function equal($v)
    {
        return [
            'val' => $v,
            'op' => $v === '' ? 'is_empty' : 'equal'
        ];
    }

    public function notEqual($v)
    {
        return [
            'val' => $v,
            'op' => $v === '' ? 'is_not_empty' : 'not_equal'
        ];
    }

    function like($v)
    {
        if (starts_with($v, '%') && ends_with($v, '%')) {
            return [
                'val' => substr($v, 1, strlen($v) - 2),
                'op' => 'contains'
            ];
        } else if (starts_with($v, '%')) {
            return [
                'val' => substr($v, 1),
                'op' => 'ends_with'
            ];
        } else if (ends_with($v, '%')) {
            return [
                'val' => substr($v, 0, strlen($v) - 2),
                'op' => 'begins_with'
            ];
        } else {
            throw new Error('SQLParse : Invalid value for LIKE operator "[0]"', $v);
        }
    }

    function iLike($v)
    {
        return $this->like($v);
    }

    function notLike($v)
    {
        $like = $this->like($v);
        $like['op'] = self::inverseOperators[$like['op']];
        return $like;
    }

    function in($v)
    {
        return ['val' => $v, 'op' => 'in'];
    }

    function notIn($v)
    {
        return ['val' => $v, 'op' => 'not_in'];
    }

    function lt($v)
    {
        return ['val' => $v, 'op' => 'less'];
    }

    function lte($v)
    {
        return ['val' => $v, 'op' => 'less_or_equal'];
    }

    function gt($v)
    {
        return ['val' => $v, 'op' => 'greater'];
    }

    function gte($v)
    {
        return ['val' => $v, 'op' => 'greater_or_equal'];
    }

    function between($v)
    {
        return ['val' => $v, 'op' => 'between'];
    }

    function notBetween($v)
    {
        return ['val' => $v, 'op' => 'not_between'];
    }

    function is($v)
    {
        if ($v !== null) {
            throw new Error('SQLParse : Invalid value for IS operator');
        }
        return ['val' => null, 'op' => 'is_null'];
    }

    function isNot($v)
    {
        if ($v !== null) {
            throw new Error('SQLParse : Invalid value for IS operator');
        }
        return ['val' => null, 'op' => 'is_not_null'];
    }
}