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
                                                                            "created_at"=>"2020-04-27 09:24:16",
                                                                                        "updated_at"=>"2020-05-31 13:23:42",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"reorder",
                                                                                        "label"=>"Reorder",
                                                                                        "list"=> "",
                                                                                        "model"=>"Demo\Core\Models\UniversalModel",
                                                                                        "active"=> false,
                                                                                        "description"=> "",
                                                                                        "icon"=>"oc-icon-list",
                                                                                        "css_class"=> "",
                                                                                        "sort_order"=> -2,
                                                                                        "plugin_id"=> 10,
                                                                                        "script"=>"function(event,engine){\r\n    engine.list.navigate(engine.ui.getModelRecord(),{},'reorder');\r\n}",
                                                                                        "html_attributes"=>"[]",
                                                                                        "id"=>"72d7f744-e5d4-4f88-8b2f-e16b4132ab42",
                                                                                        "toolbar"=> false
                            ] ,            [
                                                                            "created_at"=>"2020-04-27 09:24:16",
                                                                                        "updated_at"=>"2020-07-12 11:24:24",
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
                                                                                        "sort_order"=> 1,
                                                                                        "plugin_id"=> 10,
                                                                                        "script"=>"function(event,engine){\r\n    EngineList.getCurrentList().navigate('create');\r\n}",
                                                                                        "html_attributes"=>"[]",
                                                                                        "id"=>"7fc66991-e2ac-4d1f-9aec-282d485287eb",
                                                                                        "toolbar"=> false
                            ] ,            [
                                                                            "created_at"=>"2020-04-27 09:24:16",
                                                                                        "updated_at"=>"2020-07-12 11:24:49",
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
                                                                                        "sort_order"=> 2,
                                                                                        "plugin_id"=> 10,
                                                                                        "script"=>"function(){\r\n    \$(this).data('request-data', {\r\n        checked: \$('.control-list').listWidget('getChecked')\r\n    })\r\n}",
                                                                                        "html_attributes"=>"[{\"name\":\"data-request\",\"value\":\"onDelete\"},{\"name\":\"data-request-confirm\",\"value\":\"Delete the selected records?\"},{\"name\":\"data-request-success\",\"value\":\"\$(this).prop('disabled', true)\"},{\"name\":\"data-trigger-action\",\"value\":\"enable\"},{\"name\":\"data-trigger\",\"value\":\".control-list input[type=checkbox]\"},{\"name\":\"data-stripe-load-indicator\",\"value\":\"\"},{\"name\":\"disabled\",\"value\":\"disabled\"},{\"name\":\"data-trigger-condition\",\"value\":\"checked\"}]",
                                                                                        "id"=>"362fa0f2-16ac-4d0d-b11b-79d954c87bd1",
                                                                                        "toolbar"=> false
                            ] ,            [
                                                                            "created_at"=>"2020-04-19 05:47:48",
                                                                                        "updated_at"=>"2020-08-01 08:03:02",
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
                                                                                        "sort_order"=> 5,
                                                                                        "plugin_id"=> 10,
                                                                                        "script"=>"function(event,engine){\r\n    var selected = engine.list.getSelectedRecordIds();\r\n    if(selected.length === 0 || selected.length > 1){\r\n        \$.oc.flashMsg({\r\n            'text': 'Please select only a single record ro view.',\r\n            'class': 'error',\r\n            'interval': 5\r\n        });\r\n        return;\r\n    }\r\n    engine.form.navigate(engine.ui.getModelRecord(),selected[0],'audit-form-view');\r\n}",
                                                                                        "html_attributes"=>"[{\"name\":\"disabled\",\"value\":\"disabled\"},{\"name\":\"data-trigger-action\",\"value\":\"enable\"},{\"name\":\"data-trigger\",\"value\":\".control-list input[type=checkbox]\"},{\"name\":\"data-trigger-condition\",\"value\":\"checked\"}]",
                                                                                        "id"=>"8f870606-9895-47d9-aa57-0c7e9cf99880",
                                                                                        "toolbar"=> false
                            ] ,            [
                                                                            "created_at"=>"2020-07-12 11:23:47",
                                                                                        "updated_at"=>"2020-08-11 06:51:06",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"filter",
                                                                                        "label"=> "",
                                                                                        "list"=> "",
                                                                                        "model"=>"Demo\Core\Models\UniversalModel",
                                                                                        "active"=> 1,
                                                                                        "description"=>"<p>Advance Search</p>",
                                                                                        "icon"=>"oc-icon-filter",
                                                                                        "css_class"=>"btn mr-0",
                                                                                        "sort_order"=> 0,
                                                                                        "plugin_id"=> 10,
                                                                                        "script"=>"{\r\n    afterRender: function (event) {\r\n        const _this = this;\r\n        \$('#Toolbar-listToolbar').append('<div class=\"filter-breadcrumb\"><ulclass=\"filter-breadcrumb breadcrumb\"><li id=\"item-all\" class=\"breadcrumb-item breadcrumb-item-all\">       <a href=\"javascript:void(0)\">All</a>          </li></ul></div>')\r\n        const ui = Engine.instance.ui;\r\n        const params = ui.parseParams();\r\n        let urlFilter = {};\r\n        if (params.urlFilter) {\r\n            urlFilter = params.urlFilter;\r\n        }\r\n        var filter = engine.data.Filter.create({\r\n            breadcrumbContainer:'#Toolbar-listToolbar .filter-breadcrumb',\r\n        }).apply(function () {\r\n            ui.navigateByQueryString('urlFilter', filter.getRules());\r\n            if(!filter.isEmpty()){\r\n                \$(_this).css('color', 'red');\r\n            }\r\n            filter.closePopup();\r\n        });\r\n        filter.setModel(ui.getModel());\r\n        filter.build(urlFilter).then(function(){\r\n            if(!filter.isEmpty()){\r\n                \$(_this).css('color', 'red');\r\n            }\r\n        });\r\n        /*var template = filter.getBreadcrumbTemplate(urlFilter);\r\n        \$('#Toolbar-listToolbar').append(template);*/\r\n        console.log('button rendered');\r\n        \$(this).data('filter',filter);\r\n    },\r\n    handler: function (event, action) {\r\n        \$(this).data('filter').showInPopup({\r\n            title: 'Advance Search'\r\n        });\r\n    }\r\n}",
                                                                                        "html_attributes"=>"[]",
                                                                                        "id"=>"2741f560-c432-11ea-8b7b-b38010411630",
                                                                                        "toolbar"=> 1
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_list_actions')->where('plugin_id', 10)->delete();
            }
}
