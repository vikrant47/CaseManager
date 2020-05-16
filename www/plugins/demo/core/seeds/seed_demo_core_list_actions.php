<?php
namespace Demo\Core\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Core d */
class SeedDemoCoreListActions implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_list_actions')->insert([
            [
                                                                            "id"=> 5,
                                                                                        "created_at"=>"2020-04-27 09:24:16",
                                                                                        "updated_at"=>"2020-04-27 09:27:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"reorder",
                                                                                        "label"=>"Reorder",
                                                                                        "list"=> "",
                                                                                        "model"=>"Demo\Core\Models\UniversalModel",
                                                                                        "active"=> 1,
                                                                                        "description"=> "",
                                                                                        "icon"=>"oc-icon-list",
                                                                                        "css_class"=> "",
                                                                                        "sort_order"=> -2,
                                                                                        "plugin_id"=> 10,
                                                                                        "script"=>"function(event,engine){\r\n    engine.list.navigate(engine.ui.getModelRecord(),{},'reorder');\r\n}",
                                                                                        "html_attributes"=>"[]"
                            ] ,            [
                                                                            "id"=> 4,
                                                                                        "created_at"=>"2020-04-27 09:24:16",
                                                                                        "updated_at"=>"2020-04-27 10:43:43",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"delete",
                                                                                        "label"=>"Delete",
                                                                                        "list"=> "",
                                                                                        "model"=>"Demo\Core\Models\UniversalModel",
                                                                                        "active"=> 1,
                                                                                        "description"=> "",
                                                                                        "icon"=>"oc-icon-trash-o",
                                                                                        "css_class"=>"control-disabled",
                                                                                        "sort_order"=> -1,
                                                                                        "plugin_id"=> 10,
                                                                                        "script"=>"function(){\r\n    \$(this).data('request-data', {\r\n        checked: \$('.control-list').listWidget('getChecked')\r\n    })\r\n}",
                                                                                        "html_attributes"=>"[{\"name\":\"data-request\",\"value\":\"onDelete\"},{\"name\":\"data-request-confirm\",\"value\":\"Delete the selected records?\"},{\"name\":\"data-request-success\",\"value\":\"\$(this).prop('disabled', true)\"},{\"name\":\"data-trigger-action\",\"value\":\"enable\"},{\"name\":\"data-trigger\",\"value\":\".control-list input[type=checkbox]\"},{\"name\":\"data-stripe-load-indicator\",\"value\":\"\"},{\"name\":\"disabled\",\"value\":\"disabled\"},{\"name\":\"data-trigger-condition\",\"value\":\"checked\"}]"
                            ] ,            [
                                                                            "id"=> 3,
                                                                                        "created_at"=>"2020-04-19 05:47:48",
                                                                                        "updated_at"=>"2020-04-27 10:44:08",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"view",
                                                                                        "label"=>"View",
                                                                                        "list"=>"\$/demo/core/models/auditlog/columns.yaml",
                                                                                        "model"=>"Demo\Core\Models\AuditLog",
                                                                                        "active"=> 1,
                                                                                        "description"=> "",
                                                                                        "icon"=>"oc-icon-eye",
                                                                                        "css_class"=>"btn-default",
                                                                                        "sort_order"=> 0,
                                                                                        "plugin_id"=> 10,
                                                                                        "script"=>"function(event,engine){\r\n    var selected = engine.list.getSelectedRecordIds();\r\n    if(selected.length === 0 || selected.length > 1){\r\n        \$.oc.flashMsg({\r\n            'text': 'Please select only a single record ro view.',\r\n            'class': 'error',\r\n            'interval': 5\r\n        });\r\n        return;\r\n    }\r\n    engine.form.navigate(engine.ui.getModelRecord(),selected[0],'audit-form-view');\r\n}",
                                                                                        "html_attributes"=>"[{\"name\":\"disabled\",\"value\":\"disabled\"},{\"name\":\"data-trigger-action\",\"value\":\"enable\"},{\"name\":\"data-trigger\",\"value\":\".control-list input[type=checkbox]\"},{\"name\":\"data-trigger-condition\",\"value\":\"checked\"}]"
                            ] ,            [
                                                                            "id"=> 1,
                                                                                        "created_at"=>"2020-04-27 09:24:16",
                                                                                        "updated_at"=>"2020-05-16 05:53:59",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"create",
                                                                                        "label"=>"Create",
                                                                                        "list"=> "",
                                                                                        "model"=>"Demo\Core\Models\UniversalModel",
                                                                                        "active"=> 1,
                                                                                        "description"=> "",
                                                                                        "icon"=>"oc-icon-plus",
                                                                                        "css_class"=> "",
                                                                                        "sort_order"=> -3,
                                                                                        "plugin_id"=> 10,
                                                                                        "script"=>"function(event,engine){\r\n    engine.listService.getCurrentList().navigate('create');\r\n}",
                                                                                        "html_attributes"=>"[]"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_list_actions')->where('plugin_id', 10)->delete();
            }
}
