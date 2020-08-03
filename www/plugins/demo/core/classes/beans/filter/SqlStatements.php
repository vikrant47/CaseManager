<?php


namespace Demo\Core\Classes\Beans\Filter;


use PhpParser\Error;

class SqlStatements
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

    function question_mark()
    {
        $params = [];
        return [
            'add' => function ($rule, $value) use ($params) {
                array_push($params, $value);
                return '?';
            },
            'run' => function () use ($params) {
                return $params;
            }
        ];
    }

    function numbered($char)
    {
        $index = 0;
        $params = [];
        if (!$char || strlen($char) > 1) $char = '$';
        return [
            'add' => function ($rule, $value) use ($params, $index, $char) {
                array_push($params, $value);
                $index++;
                return $char . $index;
            },
            'run' => function () use ($params, $index) {
                return $params;
            }
        ];
    }


    function named($char)
    {
        $indexes = [];
        $params = [];
        if (!$char || strlen($char) > 1) $char = ':';
        return [
            'add' => function ($rule, $value) use ($params, $indexes, $char) {
                if (empty($indexes[$rule['field']])) {
                    $indexes[$rule['field']] = 1;
                }
                $key = $rule['field'] . '_' . ($indexes[$rule['field']]++);
                $params[$key] = $value;
                return $char . $key;
            },
            'run' => function () use ($params, $indexes) {
                return $params;
            }
        ];
    }
}