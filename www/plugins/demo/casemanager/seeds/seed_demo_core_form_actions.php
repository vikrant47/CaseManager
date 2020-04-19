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
                                                                                        "active"=> 1,
                                                                                        "description"=> "",
                                                                                        "script"=>"function(){\r\n        alert('Alert from action');\r\n        return false;\r\n}",
                                                                                        "sort_order"=> 0,
                                                                                        "icon"=>"oc-icon-adjust",
                                                                                        "css_class"=> "",
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "form"=>"\$/demo/casemanager/models/casemodel/fields.yaml",
                                                                                        "html_attributes"=>"[]",
                                                                                        "context"=>"[\"create\",\"update\"]",
                                                                                        "display_condition"=> null
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_form_actions')->where('plugin_id', 6)->delete();
            }
}
