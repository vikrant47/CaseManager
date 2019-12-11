<?php


namespace Demo\Report\Classes\Beans;


use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use October\Rain\Database\QueryBuilder;

class ExcelQueryExporter implements FromQuery
{
    use Exportable;
    /**@var $query QueryBuilder */
    private $query;

    public function setQuery($query)
    {
        $this->query = $query;
    }

    public function query()
    {
        return $this->query;
    }
}