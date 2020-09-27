<?php
namespace Demo\Core\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds universal d */
class SeedDemoCoreNavigations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_navigations')->insert([
            [
                                                                            "id"=>"c0d96860-ffd0-11ea-9efe-21afb4e6d919",
                                                                                        "created_at"=>"2020-09-26 08:17:44",
                                                                                        "updated_at"=>"2020-09-27 12:56:34",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "label"=> "",
                                                                                        "icon"=>"oc-icon-th",
                                                                                        "type"=>"folder",
                                                                                        "active"=> 1,
                                                                                        "name"=>"switch-apps",
                                                                                        "description"=>"<p>Switch the apps&nbsp;</p>",
                                                                                        "url"=> "",
                                                                                        "model"=> null,
                                                                                        "list"=> "",
                                                                                        "form"=> null,
                                                                                        "view"=> "",
                                                                                        "uipage_id"=> null,
                                                                                        "record_id"=> null,
                                                                                        "dashboard_id"=> null,
                                                                                        "widget_id"=> null,
                                                                                        "engine_application_id"=>"68473c10-0017-11eb-a76c-5f4eddcf828f",
                                                                                        "parent_id"=> null,
                                                                                        "sort_order"=> 0,
                                                                                        "position"=>"topnav",
                                                                                        "script"=>"function (event, scope) {\r\n    const \$this = \$(this);\r\n    const \$container = \$this.parent();\r\n    if (\$container.find('.app-list').length === 0) {\r\n        const template = '<div class=\"app-list container\" style=\"width:200px;font-size:12px;color:black;\">' +\r\n                '   <div class=\"card row p-2\" style=\"display:initial;\">' +\r\n                '       {{~it.apps :app:index}}' +\r\n                '           <div class=\"col-md-6 p-1\" id=\"{{=app.id}}\" data-code={{=app.code}}>' +\r\n                '               <a class=\"app-link\" href=\"#\"><i class=\"{{=app.icon}}\"/> <span>{{=app.name}}<span></a>' +\r\n                '           </div>' +\r\n                '       {{~}}' +\r\n                '   </div>' +\r\n            '</div>'\r\n        new engine.data.RestQuery('Demo.Core.Models.EngineApplication').findAll({\r\n            where: {\r\n                active: true,\r\n            },\r\n        }).then(function (apps) {\r\n            const \$template = \$(doT.template(template)({\r\n                apps: apps\r\n            }));\r\n            \$template.appendTo(\$container).find('.app-link').click(function () {\r\n                const \$this = \$(this);\r\n                Engine.instance.ui.navigateToApp(\$this.parent().prop('id'));\r\n            });\r\n            new Popper(\$this.get(0), \$template.get(0), {\r\n                placement: 'bottom',\r\n            });\r\n            \$this.click();\r\n        });\r\n    }\r\n}",
                                                                                        "tooltip"=>"Applications",
                                                                                        "nav_application_id"=>"68473c10-0017-11eb-a76c-5f4eddcf828f"
                            ] ,            [
                                                                            "id"=>"f24a26a0-009a-11eb-80bf-e5293917c1ec",
                                                                                        "created_at"=>"2020-09-27 08:25:05",
                                                                                        "updated_at"=>"2020-09-27 14:09:28",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "label"=>"Case Manager",
                                                                                        "icon"=>"oc-icon-ambulance",
                                                                                        "type"=>"script",
                                                                                        "active"=> 1,
                                                                                        "name"=>"case-manager",
                                                                                        "description"=> "",
                                                                                        "url"=> "",
                                                                                        "model"=> null,
                                                                                        "list"=> "",
                                                                                        "form"=> null,
                                                                                        "view"=> "",
                                                                                        "uipage_id"=> null,
                                                                                        "record_id"=> null,
                                                                                        "dashboard_id"=> null,
                                                                                        "widget_id"=> null,
                                                                                        "engine_application_id"=>"68473c10-0017-11eb-a76c-5f4eddcf828f",
                                                                                        "parent_id"=>"c0d96860-ffd0-11ea-9efe-21afb4e6d919",
                                                                                        "sort_order"=> 2,
                                                                                        "position"=>"topnav",
                                                                                        "script"=>"function(){\r\n    Engine.instance.ui.navigateToApp('casemanager');\r\n}",
                                                                                        "tooltip"=>"Case Manager",
                                                                                        "nav_application_id"=>"68473c10-0017-11eb-a76c-5f4eddcf828f"
                            ] ,            [
                                                                            "id"=>"53136540-009a-11eb-a329-7bfb79f81dcc",
                                                                                        "created_at"=>"2020-09-27 08:20:38",
                                                                                        "updated_at"=>"2020-09-27 08:22:47",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "label"=>"Engine",
                                                                                        "icon"=>"oc-icon-adjust",
                                                                                        "type"=>"script",
                                                                                        "active"=> 1,
                                                                                        "name"=>"top-engine-app",
                                                                                        "description"=> "",
                                                                                        "url"=> "",
                                                                                        "model"=> null,
                                                                                        "list"=> "",
                                                                                        "form"=> null,
                                                                                        "view"=> "",
                                                                                        "uipage_id"=> null,
                                                                                        "record_id"=> null,
                                                                                        "dashboard_id"=> null,
                                                                                        "widget_id"=> null,
                                                                                        "engine_application_id"=>"68473c10-0017-11eb-a76c-5f4eddcf828f",
                                                                                        "parent_id"=>"c0d96860-ffd0-11ea-9efe-21afb4e6d919",
                                                                                        "sort_order"=> 1,
                                                                                        "position"=>"topnav",
                                                                                        "script"=>"function(e){\r\n    Engine.instance.ui.navigateToApp('engine');\r\n}",
                                                                                        "tooltip"=>"Engine",
                                                                                        "nav_application_id"=>"68473c10-0017-11eb-a76c-5f4eddcf828f"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_navigations')->where('engine_application_id', '68473c10-0017-11eb-a76c-5f4eddcf828f')->delete();
            }
}
