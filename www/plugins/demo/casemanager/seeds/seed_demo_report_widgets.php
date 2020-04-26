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
                                                                            "id"=> 1,
                                                                                        "created_at"=>"2019-12-01 07:42:56",
                                                                                        "updated_at"=>"2019-12-08 08:02:10",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Iteam Bar Chart",
                                                                                        "slug"=>"queue-iteam-bar-chart",
                                                                                        "description"=> "",
                                                                                        "template"=> "",
                                                                                        "data"=>"select name, count(*) as value\r\nfrom (select queue.name, item.id as item_id\r\nfrom demo_workflow_queue_items item,\r\ndemo_workflow_queues queue\r\nwhere queue.id = item.queue_id) as queue_data\r\ngroup by name",
                                                                                        "script"=>"var dom = this.getBody();\r\nvar myChart = echarts.init(dom);\r\n\r\noption = {\r\ntooltip: {\r\ntrigger: 'item',\r\nformatter: \"{a} <br/>{b}: {c} ({d}%)\"\r\n},\r\nlegend: {\r\norient: 'vertical',\r\nx: 'left',\r\n// data:['直接访问','邮件营销','联盟广告','视频广告','搜索引擎']\r\n},\r\nseries: [\r\n{\r\nname:'Queue',\r\ntype:'pie',\r\n// radius: ['50%', '70%'],\r\navoidLabelOverlap: false,\r\ndata:this.data.data\r\n}\r\n]\r\n};\r\nmyChart.setOption(option);\r\nthis.onResize(function(){\r\nmyChart.resize();\r\n});",
                                                                                        "public"=> 0,
                                                                                        "library_id"=> 1,
                                                                                        "plugin_id"=> 6,
                                                                                        "active"=> 1
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_report_widgets')->where('plugin_id', 6)->delete();
            }
}
