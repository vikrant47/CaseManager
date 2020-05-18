<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Casemanager d */
class SeedDemoCoreListActions implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_list_actions')->insert([
            [
                                                                            "id"=> 2,
                                                                                        "created_at"=>"2020-04-11 14:12:05",
                                                                                        "updated_at"=>"2020-04-12 08:36:42",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"test",
                                                                                        "label"=>"test2",
                                                                                        "list"=>"\$/demo/casemanager/models/casemodel/columns.yaml",
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "active"=> 1,
                                                                                        "description"=> "",
                                                                                        "icon"=>"oc-icon-adjust",
                                                                                        "css_class"=> "",
                                                                                        "sort_order"=> 0,
                                                                                        "plugin_id"=> 6,
                                                                                        "script"=> "",
                                                                                        "html_attributes"=>"[]"
                            ] ,            [
                                                                            "id"=> 6,
                                                                                        "created_at"=>"2020-05-17 09:24:19",
                                                                                        "updated_at"=>"2020-05-17 12:58:46",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"pick-case",
                                                                                        "label"=>"Pick Case",
                                                                                        "list"=>"\$/demo/casemanager/models/casemodel/columns.yaml",
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "active"=> 1,
                                                                                        "description"=> "",
                                                                                        "icon"=>"oc-icon-anchor",
                                                                                        "css_class"=> "",
                                                                                        "sort_order"=> 4,
                                                                                        "plugin_id"=> 6,
                                                                                        "script"=>"function(){\r\n    \$.request('onPickItemFromQueue', {\r\n        data: {queueId: \$('#queueDropdown').val()}\r\n    });\r\n}",
                                                                                        "html_attributes"=>"[{\"name\":\"data-show\",\"value\":\"return engine.listService.getCurrentList().getTotalRecord()\"}]"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_list_actions')->where('plugin_id', 6)->delete();
            }
}
