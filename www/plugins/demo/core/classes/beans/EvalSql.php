<?php


namespace Demo\Core\Classes\Beans;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

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
     * @return []
     */
    public function eval($context = [], $page = 1, $perPage = 20)
    {
        $paginationContext = [
            'offset' => ($page - 1) * $perPage,
            'limit' => INF,
        ];
        if ($this->pagination) {
            $paginationContext = [
                'offset' => ($page - 1) * $perPage,
                'limit' => $page * $perPage - 1,
            ];

        }
        $dataScript = TwigEngine::eval($this->sql, $paginationContext);
        $data = Db::select(Db::raw($dataScript));
        if ($this->pagination) {
            $data = new Paginator(Collection::make($data), $perPage, $page);
        }
        return $data;

    }
}