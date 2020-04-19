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
                                                                            "id"=> 9,
                                                                                        "created_at"=>"2020-04-13 14:34:58",
                                                                                        "updated_at"=>"2020-04-19 05:48:48",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"view-history",
                                                                                        "label"=>"View History",
                                                                                        "active"=> 1,
                                                                                        "description"=> "",
                                                                                        "script"=>"function(event,engine,action,\$element){\r\n    var location = engine.list.navigate({\r\n            controller:'demo/core/auditlogcontroller'\r\n        },{\r\n        filter:{\r\n            record_id:engine.form.getFormModel().id\r\n        }\r\n    });\r\n    console.log(location);\r\n}",
                                                                                        "sort_order"=> 0,
                                                                                        "icon"=>"oc-icon-history",
                                                                                        "css_class"=> "",
                                                                                        "plugin_id"=> 10,
                                                                                        "model"=>"Demo\Core\Models\UniversalModel",
                                                                                        "form"=> "",
                                                                                        "html_attributes"=>"[{\"name\":\"data-show\",\"value\":\"return this.data.action.modelRecord.audit===true;\"}]",
                                                                                        "context"=>"[\"update\",\"preview\"]",
                                                                                        "display_condition"=> null
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_form_actions')->where('plugin_id', 10)->delete();
            }
}
