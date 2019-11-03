<?php


namespace Demo\Reports\Classes\Report\Renderers;

use \koolreport\core\Utility as Util;
use \koolreport\datagrid\DataTables;

class TableRenderer extends BaseReportRenderer
{

    public function renderUI()
    {
        DataTables::create(array(
            'name' => 'DataTable1',
            'dataSource' => function () {
                return $this->src('pgsql')
                    ->query('select * from case_manager');
                // ->query("select concat(e.first_name, ' ', e.last_name) as emp_name,
                // s.* from salaries s left join employees e on s.emp_no = e.emp_no");
            },
            'scope' => $this->params,
            "options" => array(
                "searching" => true,
                "paging" => true,
                "colReorder" => true,
                "order" => [],
                "ordering" => false,
                "pageLength" => 25,
                //"pagingType" => "input",
                //"dom" => '<"top"ipfl<"clear">>rt<"bottom"ipfl<"clear">>'
                // "dom" => '<"top"iflp<"clear">>rt<"bottom"ip<"clear">>'
            ),
            // "columns"=>array(
            //     "customerName" => array("label" => "Customer"),
            //     "productLine" => array("label" => "Category"),
            //     "productName" => array("label" => "Product"),
            // ),
            "showFooter" => true,
            "serverSide" => true,
            "themeBase" => "bs4",
            // "method"=>'post', //default method = 'get'
        ));
    }
}