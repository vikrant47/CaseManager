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
                                                                            "created_at"=>"2020-04-11 14:12:05",
                                                                                        "updated_at"=>"2020-05-31 13:24:08",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"test",
                                                                                        "label"=>"test2",
                                                                                        "list"=>"\$/demo/casemanager/models/casemodel/columns.yaml",
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "active"=> false,
                                                                                        "description"=> "",
                                                                                        "icon"=>"oc-icon-adjust",
                                                                                        "css_class"=> "",
                                                                                        "sort_order"=> 0,
                                                                                        "plugin_id"=> 6,
                                                                                        "script"=> "",
                                                                                        "html_attributes"=>"[]",
                                                                                        "id"=>"d6d84ed8-7b59-4538-b9f5-f69f24489aef",
                                                                                        "toolbar"=> false
                            ] ,            [
                                                                            "created_at"=>"2020-05-17 09:24:19",
                                                                                        "updated_at"=>"2020-06-21 05:03:28",
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
                                                                                        "script"=>"function () {\r\n    \$.oc.stripeLoadIndicator.show();\r\n    \$.request('onGetCurrentUserQueues', {\r\n        url: '/backend/demo/workflow/queuecontroller',\r\n        success: function (response) {\r\n            if (response.length === 0) {\r\n                \$.oc.flashMsg({\r\n                    'text': 'You are not assigned in any queue.',\r\n                    'class': 'info',\r\n                    'interval': 5\r\n                });\r\n                \$.oc.stripeLoadIndicator.hide();\r\n                return;\r\n            }\r\n            var options = {};\r\n            for (var i = 0; i < response.length; i++) {\r\n                options[response[i].id] = response[i].name + ' (Total :'+response[i].total+')';\r\n            }\r\n            var form = new EngineForm({\r\n                fields: {\r\n                    queue: {\r\n                        type: 'dropdown',\r\n                        label: 'Queue',\r\n                        span: 'full',\r\n                        emptyOption: '-- select an option --',\r\n                        showSearch: true,\r\n                        options: options,\r\n                    },\r\n                }\r\n            }).build().on('render', function () {\r\n                \$.oc.stripeLoadIndicator.hide();\r\n            });\r\n            form.showInPopup({\r\n                size: 'md',\r\n                title: 'Select a Queue',\r\n                actions: [{\r\n                    name: 'queue-selection',\r\n                    label: 'Select',\r\n                    active: true,\r\n                    icon: '',\r\n                    css_class: 'btn btn-primary',\r\n                    handler: function () {\r\n                        \$.request('onPickItemFromQueue', {\r\n                            url: '/backend/demo/workflow/QueueController',\r\n                            loading: \$.oc.stripeLoadIndicator,\r\n                            data: {\r\n                                queueId: form.getValue('queue')\r\n                            }\r\n                        });\r\n                    }\r\n                }]\r\n            });\r\n        },\r\n    });\r\n}",
                                                                                        "html_attributes"=>"[{\"name\":\"data-trigger-action\",\"value\":\"disable\"},{\"name\":\"data-trigger\",\"value\":\".control-list input[type=checkbox]\"},{\"name\":\"data-trigger-condition\",\"value\":\"checked\"}]",
                                                                                        "id"=>"4f95d22e-7293-4495-81f8-ee194bac2c8b",
                                                                                        "toolbar"=> false
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_list_actions')->where('plugin_id', 6)->delete();
            }
}
