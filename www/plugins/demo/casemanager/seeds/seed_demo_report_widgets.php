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
                                                                                        "updated_at"=>"2020-06-20 06:03:17",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Iteam Bar Chart",
                                                                                        "code"=>"queue-iteam-bar-chart",
                                                                                        "description"=> "",
                                                                                        "template"=> "",
                                                                                        "data"=>"select name, count(*) as value\r\nfrom (select queue.name, item.id as item_id\r\nfrom demo_workflow_queue_items item,\r\ndemo_workflow_queues queue\r\nwhere queue.id = item.queue_id) as queue_data\r\ngroup by name",
                                                                                        "script"=>"var dom = this.getBody();\r\nvar myChart = echarts.init(dom);\r\n\r\noption = {\r\n    tooltip: {\r\n        trigger: 'item',\r\n        formatter: \"{a} <br/>{b}: {c} ({d}%)\"\r\n    },\r\n    legend: {\r\n        orient: 'vertical',\r\n        x: 'left',\r\n        // data:['直接访问','邮件营销','联盟广告','视频广告','搜索引擎']\r\n    },\r\n    series: [{\r\n        name: 'Queue',\r\n        type: 'pie',\r\n        // radius: ['50%', '70%'],\r\n        avoidLabelOverlap: false,\r\n        data: this.data.data\r\n    }]\r\n};\r\nmyChart.setOption(option);\r\nthis.onResize(function () {\r\n    myChart.resize();\r\n});",
                                                                                        "public"=> 0,
                                                                                        "plugin_id"=> 6,
                                                                                        "active"=> 1,
                                                                                        "id"=>"84383d11-89c6-4dac-906c-bb2b08923b53",
                                                                                        "library_id"=>"a65cda17-3942-4dac-995b-fd66fe412d1a"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_report_widgets')->where('plugin_id', 6)->delete();
            }
}
