<?php
namespace Demo\Casemanager\Seeds\V0_0;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds casemanager d */
class SeedDemoCoreFormActions implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_form_actions')->insert([
            [
                                                                            "id"=>"27909423-8ed9-4465-801c-c0f081f286fc",
                                                                                        "created_at"=>"2020-05-31 14:09:07",
                                                                                        "updated_at"=>"2020-06-07 05:32:17",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"rever-case",
                                                                                        "label"=>"Revert",
                                                                                        "form"=> "",
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "active"=> 1,
                                                                                        "toolbar"=> false,
                                                                                        "description"=> "",
                                                                                        "icon"=>"oc-icon-undo",
                                                                                        "css_class"=>"btn-default",
                                                                                        "sort_order"=> 5,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "script"=>"function () {\r\n    var form = new EngineForm({\r\n        fields: {\r\n            remark: {\r\n                type: 'richeditor',\r\n                label: 'Enter you remark',\r\n                span: 'full',\r\n            },\r\n        }\r\n    }).build();\r\n    form.showInPopup({\r\n        size: 'md',\r\n        title: 'Are you sure?',\r\n        actions: [{\r\n            name: 'revert-case',\r\n            label: 'Revert',\r\n            active: true,\r\n            icon: '',\r\n            css_class: 'btn btn-primary',\r\n            handler: function () {\r\n                \$.request('onRevertCase', {\r\n                    url: EngineForm.getCurrentForm().\$el.find('form').prop('action'),\r\n                    loading: \$.oc.stripeLoadIndicator,\r\n                    data: {\r\n                        remark: form.getValue('remark')\r\n                    }\r\n                });\r\n            }\r\n        }]\r\n    });\r\n}",
                                                                                        "context"=>"[\"update\"]",
                                                                                        "html_attributes"=>"[{\"name\":\"data-show\",\"value\":\"return action.form.getFormModel().assigned_to_id === me.id\"}]"
                            ] ,            [
                                                                            "id"=>"801aec17-c33e-4dd1-9a97-560e2534cf3c",
                                                                                        "created_at"=>"2020-04-12 08:37:37",
                                                                                        "updated_at"=>"2020-04-19 04:40:45",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"test",
                                                                                        "label"=>"Test",
                                                                                        "form"=>"\$/demo/casemanager/models/casemodel/fields.yaml",
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "active"=> 1,
                                                                                        "toolbar"=> false,
                                                                                        "description"=> "",
                                                                                        "icon"=>"oc-icon-adjust",
                                                                                        "css_class"=> "",
                                                                                        "sort_order"=> 0,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "script"=>"function(){\r\n        alert('Alert from action');\r\n        return false;\r\n}",
                                                                                        "context"=>"[\"create\",\"update\"]",
                                                                                        "html_attributes"=>"[]"
                            ] ,            [
                                                                            "id"=>"fa00326d-63d6-4d51-84ee-9567cd8bf986",
                                                                                        "created_at"=>"2020-05-31 14:09:07",
                                                                                        "updated_at"=>"2020-10-20 03:30:18",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"push-case",
                                                                                        "label"=>"Push",
                                                                                        "form"=> "",
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "active"=> 1,
                                                                                        "toolbar"=> false,
                                                                                        "description"=> "",
                                                                                        "icon"=>"oc-icon-arrow-circle-up",
                                                                                        "css_class"=>"btn-secondary",
                                                                                        "sort_order"=> 4,
                                                                                        "engine_application_id"=>"df07f9b4-26c1-40ca-ba1f-1b77b1692b83",
                                                                                        "script"=>"{\r\n    beforeRender: function (event, scope, action) {\r\n        action.hidden = action.form.getFormModel().assigned_to_id !== me.id;\r\n    },\r\n    handler: function (event, scope) {\r\n        const RestQuery = engine.data.RestQuery;\r\n        const form = scope.form;\r\n        const workId = form.getValue('work');\r\n        const makeTransition = function (workId, stateId) {\r\n            return new RestQuery('Workflow Transition').create({\r\n                work_id: workId,\r\n                to_state_id: stateId,\r\n            }).then(function () {\r\n                \$.oc.flashMsg({\r\n                    text: 'Pushed Successfully.',\r\n                    'class': 'success',\r\n                    'interval': 5,\r\n                });\r\n                if (form.isNew()) {\r\n                    window.location.reload();\r\n                } else {\r\n                    form.reload();\r\n                }\r\n            }).catch(function (e) {\r\n                \$.oc.flashMsg({\r\n                    text: 'Error Occured ' + e,\r\n                    'class': 'error',\r\n                    'interval': 5,\r\n                });\r\n            });\r\n        };\r\n        const nextStates = RestQuery.invokeAPI({\r\n            endpoint: '/demo/workspace/workcontroller/on-get-next-transition-states',\r\n            data: {\r\n                currentState: form.getValue('current_state'),\r\n                work_id: workId,\r\n            },\r\n        }).then(function (response) {\r\n            if (response.length > 1) {\r\n                const popupForm = new engine.ui.Form({\r\n                    formConfig: {\r\n                        fields: {\r\n                            state: {\r\n                                label: 'State',\r\n                                required: 1,\r\n                                type: 'dropdown',\r\n                                options: response.reduce(function (options, state) {\r\n                                    options[state.id] = state.name;\r\n                                }, {})\r\n                            }\r\n                        }\r\n                    },\r\n                }).build().showInPopup({\r\n                    actions: [{\r\n                        label: 'Ok',\r\n                        handler: function () {\r\n                            makeTransition(workId, popupForm.getValue('state'));\r\n                        },\r\n                    }]\r\n                })\r\n            } else {\r\n                makeTransition(workId, response[0].state_id);\r\n            }\r\n        });\r\n    }\r\n}",
                                                                                        "context"=>"[\"update\"]",
                                                                                        "html_attributes"=>"[{\"name\":\"data-request-flash\",\"value\":\"\"},{\"name\":\"data-request-success\",\"value\":\"\$(this).hide()\"},{\"name\":\"data-load-indicator\",\"value\":\"Pushing\"},{\"name\":\"data-request-confirm\",\"value\":\"Are you sure?\"},{\"name\":\"data-show\",\"value\":\"return action.form.getFormModel().assigned_to_id === me.id\"}]"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_form_actions')->where('engine_application_id', 'df07f9b4-26c1-40ca-ba1f-1b77b1692b83')->delete();
            }
}
