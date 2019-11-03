<?php


namespace Demo\Reports\Classes\Report\Renderers;


abstract class BaseReportRenderer extends \koolreport\KoolReport
{
    function settings()
    {
        $datasource = include 'database.php';
        $datasource = $datasource['pgsql'];
        return array(
            "dataSources" => array(
                "pgsql" => array(
                    "connectionString" => $datasource['driver'] . ':host=' . $datasource['host'] . ';dbname=' . $datasource['database'],
                    "username" => $datasource['root'],
                    "password" => $datasource['password'],
                    "charset" => "utf8"
                ),
            )
        );
    }

    protected function setup()
    {

    }

    public abstract function renderUI();

}