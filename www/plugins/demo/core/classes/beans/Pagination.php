<?php


namespace Demo\Core\Classes\Beans;


use Illuminate\Database\Query\Builder;

class Pagination
{
    /**@var $queryBuilder Builder */
    protected $queryBuilder;
    protected $perPage = 20;
    protected $page = 1;

    public function __construct($queryBuilder, $perPage)
    {
        $this->queryBuilder = $queryBuilder;
        $this->perPage = $perPage;
    }

    public function paginateByOffset($offset = 0, $limit = 100)
    {

    }
}
