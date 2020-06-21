<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Casemanager d */
class SeedDemoReportWidgets implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_report_widgets')->insert([
            [
                                                                            "created_at"=>"2019-12-01 07:42:56",
                                                                                        "updated_at"=>"2020-06-21 17:10:38",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Iteam Bar Chart",
                                                                                        "code"=>"queue-iteam-bar-chart",
                                                                                        "description"=> "",
                                                                                        "template"=> "",
                                                                                        "data"=>"select name, count(*) as value\r\nfrom (select queue.name, item.id as item_id\r\nfrom demo_workflow_queue_items item,\r\ndemo_workflow_queues queue\r\nwhere queue.id = item.queue_id) as queue_data\r\ngroup by name",
                                                                                        "script"=>"var dom = this.getBody();\r\nvar myChart = echarts.init(dom);\r\n\r\noption = {\r\n    tooltip: {\r\n        trigger: 'item',\r\n        formatter: \"{a} <br/>{b}: {c} ({d}%)\"\r\n    },\r\n    legend: {\r\n        orient: 'vertical',\r\n        x: 'left',\r\n        // data:['直接访问','邮件营销','联盟广告','视频广告','搜索引擎']\r\n    },\r\n    series: [{\r\n        name: 'Queue',\r\n        type: 'pie',\r\n        // radius: ['50%', '70%'],\r\n        avoidLabelOverlap: false,\r\n        data: this.store.data\r\n    }]\r\n};\r\nmyChart.setOption(option);\r\nthis.onResize(function () {\r\n    myChart.resize();\r\n});",
                                                                                        "public"=> 0,
                                                                                        "plugin_id"=> 6,
                                                                                        "active"=> 1,
                                                                                        "id"=>"84383d11-89c6-4dac-906c-bb2b08923b53",
                                                                                        "library_id"=>"a65cda17-3942-4dac-995b-fd66fe412d1a"
                            ] ,            [
                                                                            "created_at"=>"2020-06-21 15:26:15",
                                                                                        "updated_at"=>"2020-06-21 17:04:40",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Agent Productivity Report",
                                                                                        "code"=>"agent-productivity-report",
                                                                                        "description"=> "",
                                                                                        "template"=> "",
                                                                                        "data"=>"select usr.first_name,\r\n       usr.last_name,\r\n       usr.login,\r\n       sum(case\r\n             when transition.backward_direction\r\n                     then 1\r\n             else 0\r\n               end)        as backward_direction_count,\r\n       count(transition.*) as total_reviewed,\r\n       count(witems.*)     as total_pending\r\nfrom demo_workflow_workflow_transitions transition\r\n       right join backend_users usr on transition.created_by_id = usr.id\r\n       left join demo_workflow_workflow_items witems on witems.assigned_to_id = usr.id\r\ngroup by usr.id offset {{offset}} limit {{limit}}",
                                                                                        "script"=>"var body = this.getBody();\r\n\$(body).addClass('ag-theme-balham');\r\nvar columnDefs = [{\r\n        headerName: \"SNO\",\r\n        field: \"sno\"\r\n    },\r\n    {\r\n        headerName: \"Name\",\r\n        field: \"name\",\r\n         resizable: true \r\n    },\r\n    {\r\n        headerName: \"Picked\",\r\n        field: \"picked\",\r\n         resizable: true \r\n    },\r\n    {\r\n        headerName: \"Pushed\",\r\n        field: \"pushed\",\r\n         resizable: true \r\n    },\r\n    {\r\n        headerName: \"Rejected\",\r\n        field: \"rejected\",\r\n         resizable: true \r\n    },\r\n    {\r\n        headerName: \"Pending\",\r\n        field: \"pending\",\r\n         resizable: true \r\n    },\r\n];\r\nnew agGrid.Grid(body, {\r\n    columnDefs: columnDefs,\r\n    rowData: this.store.data.map(function (record) {\r\n        return {\r\n            sno: record.sno,\r\n            name: record.first_name + ' ' + record.last_name,\r\n            picked: record.total_reviewed + record.total_pending,\r\n            pushed: record.total_reviewed - record.backward_direction_count,\r\n            rejected: record.backward_direction_count,\r\n            pending: record.total_pending\r\n        };\r\n    })\r\n});",
                                                                                        "public"=> 0,
                                                                                        "plugin_id"=> 6,
                                                                                        "active"=> 1,
                                                                                        "id"=>"8be0d030-b3d3-11ea-90ed-bfdae0c12a09",
                                                                                        "library_id"=> null
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_report_widgets')->where('plugin_id', 6)->delete();
            }
}
