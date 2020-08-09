<?php
//
//
//namespace Demo\Core\Services;
//
//
//use Demo\Core\Classes\Beans\Filter\SqlStatements;
//use Illuminate\Support\Collection;
//use PhpParser\Error;
//use stdClass;
//use timgws\QBPFunctions;
//
//class SqlFilter
//{
//    use QBPFunctions;
//
//    /**
//     * @class SqlSupport
//     * @memberof module:plugins
//     * @description Allows to export rules as a SQL WHERE statement as well as populating the builder from an SQL query->
//     * @param {object} [options]
//     * @param {boolean} [options->boolean_as_integer=true] - `true` to convert boolean values to integer in the SQL output
//     */
//    // operators for internal -> SQL conversion
//    const sqlOperators = [
//        'equal' => ['op' => '= ?'],
//        'not_equal' => ['op' => '!= ?'],
//        'in' => ['op' => 'IN(?)', 'sep' => ', '],
//        'not_in' => ['op' => 'NOT IN(?)', 'sep' => ', '],
//        'less' => ['op' => '< ?'],
//        'less_or_equal' => ['op' => '<= ?'],
//        'greater' => ['op' => '> ?'],
//        'greater_or_equal' => ['op' => '>= ?'],
//        'between' => ['op' => 'BETWEEN ?', 'sep' => ' AND '],
//        'not_between' => ['op' => 'NOT BETWEEN ?', 'sep' => ' AND '],
//        'begins_with' => ['op' => 'LIKE(?)', 'mod' => '[0]%'],
//        'not_begins_with' => ['op' => 'NOT LIKE(?)', 'mod' => '[0]%'],
//        'contains' => ['op' => 'LIKE(?)', 'mod' => '%[0]%'],
//        'not_contains' => ['op' => 'NOT LIKE(?)', 'mod' => '%[0]%'],
//        'ends_with' => ['op' => 'LIKE(?)', 'mod' => '%[0]'],
//        'not_ends_with' => ['op' => 'NOT LIKE(?)', 'mod' => '%[0]'],
//        'is_empty' => ['op' => '= \'\''],
//        'is_not_empty' => ['op' => '!= \'\''],
//        'is_null' => ['op' => 'IS NULL'],
//        'is_not_null' => ['op' => 'IS NOT NULL']
//    ];
//    /**@var $sqlStatements SqlStatements */
//    protected $sqlStatements;
//    protected $settings = (object)[
//        'default_condition' => 'AND',
//    ];
//
//    public function __construct()
//    {
//        $this->sqlStatements = new SqlStatements();
//    }
//
//    public function getOperatorByType($type) {
//        if ("-1" == $type) {
//            return null;
//        }
//        foreach ($this->operators as $key=>$op){
//            if ($op['type'] == $type) {
//                return $op;
//            }
//        }
//        throw new Error('UndefinedOperator : Undefined operator "{0}"', $type);
//    }
//
////    function parse($group, $nl)
////    {
////        $nl = $nl ? '\n' : ' ';
////        $boolean_as_integer = false;
////        if (!$group['condition']) {
////            $group['condition'] = $this->settings->default_condition;
////        }
////        if (!in_array(strtoupper($group['condition']), ['AND', 'OR'])) {
////            throw new Error('UndefinedSQLCondition : Unable to build SQL query with condition "{0}"', $group['condition']);
////        }
////
////        if (!$group['rules']) {
////            return '';
////        }
////
////        $parts = [];
////
////        $rules = Collection::make($group['rules']);
////        $rules->forEach(function ($rule) use ($nl) {
////            if ($rule['rules'] && count($rule['rules']) > 0) {
////                array_push($parts, '(' . $nl . $this->parse($rule, $nl) . $nl . ')' . $nl);
////            } else {
////                $sql = self::sqlOperators[$rule['operator']];
////                $ope = $this->getOperatorByType($rule['operator']);
////                $value = '';
////
////                if (empty($sql)) {
////                    throw new Error('UndefinedSQLOperator : Unknown SQL operation for operator "{0}"', $rule['operator']);
////                }
////
////                if ($ope->nb_inputs !== 0) {
////                    if (!($rule['value'] instanceof Array)) {
////                        $rule['value'] = [$rule['value']];
////                    }
////
////                        $rule['value']->forEach(function (v, i) {
////                            if (i > 0) {
////                                value += sql->sep;
////                        }
////
////                            if ($rule['type'] == 'boolean' && boolean_as_integer) {
////                                v = v ? 1 : 0;
////                            } else if (!$stmt && $rule['type'] !== 'integer' && $rule['type'] !== 'double' && $rule['type'] !== 'boolean') {
////                                v = Utils->escapeString(v);
////                        }
////
////                            if (sql->mod) {
////                                v = Utils->fmt(sql->mod, v);
////                        }
////
////                        if ($stmt) {
////                            value += $stmt->add(rule, v);
////                        } else {
////                            if (typeof v == 'string') {
////                                v = '\'' + v + '\'';
////                            }
////
////                                value += v;
////                            }
////                    });
////                    }
////
////                $sqlFn = function (v) {
////                    return sql->op->replace('?', function () {
////                        return v;
////                    });
////                };
////
////                /**
////                 * Modifies the SQL field used by a rule
////                 * @event changer:getSQLField
////                 * @memberof module:plugins->SqlSupport
////                 * @param {string} field
////                 * @param {Rule} rule
////                 * @returns {string}
////                 */
////                $field = $this->change('getSQLField', $rule['field'], rule);
////
////                $ruleExpression = field + ' ' + sqlFn(value);
////
////                /**
////                 * Modifies the SQL generated for a rule
////                 * @event changer:ruleToSQL
////                 * @memberof module:plugins->SqlSupport
////                 * @param {string} expression
////                 * @param {Rule} rule
////                 * @param {*} value
////                 * @param {function} valueWrapper - function that takes the value and adds the operator
////                 * @returns {string}
////                 */
////                parts->push($this->change('ruleToSQL', ruleExpression, rule, value, sqlFn));
////            }
////        });
////
////        $groupExpression = parts->join(' ' + $group['condition'] + $nl);
////
////            /**
////             * Modifies the SQL generated for a $group
////             * @event changer:groupToSQL
////             * @memberof module:plugins->SqlSupport
////             * @param {string} expression
////             * @param {Group} $group
////             * @returns {string}
////             */
////            return $this->change('groupToSQL', groupExpression, $group);
////        }
////
////    /**
////     * Returns rules as a SQL query
////     * @param {boolean|string} [$stmt] - use prepared statements: false, 'question_mark', 'numbered', 'numbered(@)', 'named', 'named(@)'
////     * @param {boolean} [$nl=false] output with new lines
////     * @param {object} [$data] - current rules by default
////     * @return {module:plugins->SqlSupport->SqlQuery}
////     * @throws Error
////     */
////    function getSQL($stmt, $nl, $data)
////    {
////        $data = empty($data) ? $this->getRules() : $data;
////
////        if (!$data) {
////            return null;
////        }
////
////        if ($stmt === true) {
////            $stmt = 'question_mark';
////        }
////        if (is_string($stmt) == 'string') {
////            $config = $this->getStmtConfig($stmt);
////            $stmt = $this->settings->sqlStatements[$config[1]]($config[2]);
////        }
////
////        $sql = $this->parse($data);
////
////        if ($stmt) {
////            return [
////                'sql' => $sql,
////                'params' => $stmt->run()
////            ];
////        } else {
////            return [
////                'sql' => $sql
////            ];
////        }
////    }
////
////    /**
////     * @param stdClass $rule
////     */
////    protected function checkRuleCorrect(stdClass $rule)
////    {
////        // TODO: Implement checkRuleCorrect() method.
////    }
//}