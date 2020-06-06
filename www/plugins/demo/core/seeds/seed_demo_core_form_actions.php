<?php
namespace Demo\Core\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Core d */
class SeedDemoCoreFormActions implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_form_actions')->insert([
            [
                                                                            "created_at"=>"2020-04-13 14:34:58",
                                                                                        "updated_at"=>"2020-04-19 05:48:48",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"view-history",
                                                                                        "label"=>"View History",
                                                                                        "form"=> "",
                                                                                        "model"=>"Demo\Core\Models\UniversalModel",
                                                                                        "active"=> 1,
                                                                                        "description"=> "",
                                                                                        "icon"=>"oc-icon-history",
                                                                                        "css_class"=> "",
                                                                                        "sort_order"=> 0,
                                                                                        "plugin_id"=> 10,
                                                                                        "script"=>"function(event,engine,action,\$element){\r\n    var location = engine.list.navigate({\r\n            controller:'demo/core/auditlogcontroller'\r\n        },{\r\n        filter:{\r\n            record_id:engine.form.getFormModel().id\r\n        }\r\n    });\r\n    console.log(location);\r\n}",
                                                                                        "context"=>"[\"update\",\"preview\"]",
                                                                                        "html_attributes"=>"[{\"name\":\"data-show\",\"value\":\"return this.data.action.modelRecord.audit===true;\"}]",
                                                                                        "id"=>"54e73d14-1a67-4327-91a7-3e5b1aa49a90"
                            ] ,            [
                                                                            "created_at"=>"2020-04-26 15:38:44",
                                                                                        "updated_at"=>"2020-04-27 09:13:03",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"save-close",
                                                                                        "label"=>"Save & Close",
                                                                                        "form"=> "",
                                                                                        "model"=>"Demo\Core\Models\UniversalModel",
                                                                                        "active"=> 1,
                                                                                        "description"=> "",
                                                                                        "icon"=>"oc-icon-save",
                                                                                        "css_class"=> "",
                                                                                        "sort_order"=> -1,
                                                                                        "plugin_id"=> 10,
                                                                                        "script"=> "",
                                                                                        "context"=>"[\"create\",\"update\"]",
                                                                                        "html_attributes"=>"[{\"name\":\"data-request\",\"value\":\"onSave\"},{\"name\":\"data-hotkey\",\"value\":\"ctrl+enter, cmd+enter\"},{\"name\":\"data-load-indicator\",\"value\":\"Saving...\"},{\"name\":\"data-request-data\",\"value\":\"close:1\"}]",
                                                                                        "id"=>"74aa9c40-9618-4fc2-890f-35d98a81b875"
                            ] ,            [
                                                                            "created_at"=>"2020-04-26 15:37:16",
                                                                                        "updated_at"=>"2020-04-27 11:09:54",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"save",
                                                                                        "label"=>"Save",
                                                                                        "form"=> "",
                                                                                        "model"=>"Demo\Core\Models\UniversalModel",
                                                                                        "active"=> 1,
                                                                                        "description"=> "",
                                                                                        "icon"=>"oc-icon-adjust",
                                                                                        "css_class"=> "",
                                                                                        "sort_order"=> -2,
                                                                                        "plugin_id"=> 10,
                                                                                        "script"=>"function(){}",
                                                                                        "context"=>"[\"update\"]",
                                                                                        "html_attributes"=>"[{\"name\":\"data-request\",\"value\":\"onSave\"},{\"name\":\"data-hotkey\",\"value\":\"ctrl+s, cmd+s\"},{\"name\":\"data-load-indicator\",\"value\":\"Saving...\"},{\"name\":\"data-request-data\",\"value\":\"redirect:0\"}]",
                                                                                        "id"=>"60f9be27-c475-462f-a146-40588aa0bc91"
                            ] ,            [
                                                                            "created_at"=>"2020-04-26 15:37:16",
                                                                                        "updated_at"=>"2020-04-27 11:09:54",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"create",
                                                                                        "label"=>"Create",
                                                                                        "form"=> "",
                                                                                        "model"=>"Demo\Core\Models\UniversalModel",
                                                                                        "active"=> 1,
                                                                                        "description"=> "",
                                                                                        "icon"=>"oc-icon-adjust",
                                                                                        "css_class"=> "",
                                                                                        "sort_order"=> -2,
                                                                                        "plugin_id"=> 10,
                                                                                        "script"=>"function(){}",
                                                                                        "context"=>"[\"create\"]",
                                                                                        "html_attributes"=>"[{\"name\":\"data-request\",\"value\":\"onSave\"},{\"name\":\"data-hotkey\",\"value\":\"ctrl+s, cmd+s\"},{\"name\":\"data-load-indicator\",\"value\":\"Saving...\"}]",
                                                                                        "id"=>"0625b4f7-ab22-48ba-9eb2-e748cad64eab"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_form_actions')->where('plugin_id', 10)->delete();
            }
}
