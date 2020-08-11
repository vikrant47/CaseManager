<?php


namespace Demo\Core\Classes\Beans;

use Demo\Core\Services\QueryPagination;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Db;

class EvalSql
{
    protected $sql;
    protected $pagination;

    public function __construct($sql, $pagination = true)
    {
        $this->sql = $sql;
        $this->pagination = $pagination;
    }

    /**
     * @param array $context
     * @param bool $APPEND_TOTAL
     * @return array []
     */
    public function eval($context = [], $APPEND_TOTAL = false)
    {
        $dataScript = TwigEngine::eval($this->sql, $context);
        $data = Db::select(Db::raw($dataScript));
        $totalRecords = -1;
        /**@var $pagination QueryPagination */
        $pagination = $context['pagination'];
        if (!empty($pagination) && $APPEND_TOTAL) {
            $pagination->clean();
            $dataScript = TwigEngine::eval($this->sql, $context);
            $totalRecords = Db::count(Db::raw($dataScript));
            $pagination->restore();
        }
        $result = [
            'data' => $data, 'pagination' => $pagination->toArray($totalRecords)
        ];
        return $result;

    }
}