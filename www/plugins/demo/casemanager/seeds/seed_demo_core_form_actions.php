<?php
namespace Demo\Casemanager\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Casemanager d */
class SeedDemoCoreFormActions implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_form_actions')->insert([
            [
                                                                            "id"=> 8,
                                                                                        "created_at"=>"2020-04-12 08:37:37",
                                                                                        "updated_at"=>"2020-04-19 04:40:45",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"test",
                                                                                        "label"=>"Test",
                                                                                        "form"=>"\$/demo/casemanager/models/casemodel/fields.yaml",
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "active"=> 1,
                                                                                        "description"=> "",
                                                                                        "icon"=>"oc-icon-adjust",
                                                                                        "css_class"=> "",
                                                                                        "sort_order"=> 0,
                                                                                        "plugin_id"=> 6,
                                                                                        "script"=>"function(){\r\n        alert('Alert from action');\r\n        return false;\r\n}",
                                                                                        "context"=>"[\"create\",\"update\"]",
                                                                                        "html_attributes"=>"[]"
                            ] ,            [
                                                                            "id"=> 5,
                                                                                        "created_at"=>"2020-05-31 14:09:07",
                                                                                        "updated_at"=>"2020-05-31 14:14:42",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"push-case",
                                                                                        "label"=>"Push",
                                                                                        "form"=> "",
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "active"=> 1,
                                                                                        "description"=> "",
                                                                                        "icon"=>"oc-icon-arrow-circle-up",
                                                                                        "css_class"=>"btn-secondary",
                                                                                        "sort_order"=> 4,
                                                                                        "plugin_id"=> 6,
                                                                                        "script"=>"function(){\r\n}",
                                                                                        "context"=>"[\"update\"]",
                                                                                        "html_attributes"=>"[{\"name\":\"data-request\",\"value\":\"onPushCase\"},{\"name\":\"data-request-flash\",\"value\":\"\"},{\"name\":\"data-request-success\",\"value\":\"\$(this).hide()\"},{\"name\":\"data-load-indicator\",\"value\":\"Pushing\"},{\"name\":\"data-request-confirm\",\"value\":\"Are you sure?\"}]"
                            ] ,            [
                                                                            "id"=> 11,
                                                                                        "created_at"=>"2020-05-31 14:09:07",
                                                                                        "updated_at"=>"2020-05-31 14:26:32",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"rever-case",
                                                                                        "label"=>"Revert",
                                                                                        "form"=> "",
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "active"=> 1,
                                                                                        "description"=> "",
                                                                                        "icon"=>"oc-icon-undo",
                                                                                        "css_class"=>"btn-default",
                                                                                        "sort_order"=> 5,
                                                                                        "plugin_id"=> 6,
                                                                                        "script"=>"function () {\r\n    var form = new EngineForm({\r\n        fields: {\r\n            remark: {\r\n                type: 'richeditor',\r\n                label: 'Enter you remark',\r\n                span: 'full',\r\n            },\r\n        }\r\n    }).build();\r\n    form.showInPopup({\r\n        size: 'md',\r\n        title: 'Are you sure?',\r\n        actions: [{\r\n            name: 'revert-case',\r\n            label: 'Revert',\r\n            active: true,\r\n            icon: '',\r\n            css_class: 'btn btn-primary',\r\n            handler: function () {\r\n                \$.request('onRevertCase', {\r\n                    url: '/backend/demo/casemanager/CaseController/'+EngineForm.getCurrentForm().getValue('id'),\r\n                    loading: \$.oc.stripeLoadIndicator,\r\n                    data: {\r\n                        remark: form.getValue('remark')\r\n                    }\r\n                });\r\n            }\r\n        }]\r\n    });\r\n}",
                                                                                        "context"=>"[\"update\"]",
                                                                                        "html_attributes"=>"[]"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_form_actions')->where('plugin_id', 6)->delete();
            }
}
