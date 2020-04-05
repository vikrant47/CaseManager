<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
/**Auto generated using cmd _: php artisan core:run-seeds Demo.Casemanager d */
class SeedDemoReportWidgets implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_report_widgets')->insert([
            [
                                                'id'=>'1',
                                                            'created_at'=>'2019-12-01 07:42:56',
                                                            'updated_at'=>'2019-12-08 08:02:10',
                                                            'created_by_id'=>'1',
                                                            'updated_by_id'=>'1',
                                                            'name'=>'Queue Iteam Bar Chart',
                                                            'slug'=>'queue-iteam-bar-chart',
                                                            'description'=>'',
                                                            'data'=>'select name, count(*) as value\n \n from (select queue.name, item.id as item_id\n \n       from demo_workflow_queue_items item,\n \n            demo_workflow_queues queue\n \n       where queue.id = item.queue_id) as queue_data\n \n group by name',
                                                            'script'=>'var dom = this.getBody();\n \n var myChart = echarts.init(dom);\n \n \n \n option = {\n \n     tooltip: {\n \n         trigger: \'item\',\n \n         formatter: "{a} <br/>{b}: {c} ({d}%)"\n \n     },\n \n     legend: {\n \n         orient: \'vertical\',\n \n         x: \'left\',\n \n         // data:[\'直接访问\',\'邮件营销\',\'联盟广告\',\'视频广告\',\'搜索引擎\']\n \n     },\n \n     series: [\n \n         {\n \n             name:\'Queue\',\n \n             type:\'pie\',\n \n             // radius: [\'50%\', \'70%\'],\n \n             avoidLabelOverlap: false,\n \n             data:this.data.data\n \n         }\n \n     ]\n \n };\n \n myChart.setOption(option);\n \n this.onResize(function(){\n \n     myChart.resize();\n \n });',
                                                            'public'=>'0',
                                                            'plugin_id'=>'6',
                                                            'library_id'=>'1',
                                                            'template'=>''
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_report_widgets')->where('plugin_id', 6)->delete();
            }
}
