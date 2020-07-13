<?php


namespace Demo\Core\Services;


use Demo\Core\Classes\Beans\TwigEngine;
use timgws\QueryBuilderParser;

class FilterService
{
    public function applyFilter($query, $filter)
    {
        if ($query instanceof \October\Rain\Database\Builder) {
            $query = $query->getQuery();
        }
        if (is_array($filter)) {
            $filter = json_encode($filter);
        }
        $qbp = new QueryBuilderParser();
        $filter = TwigEngine::eval($filter);
        $qbp->parse($filter, $query);
    }
}