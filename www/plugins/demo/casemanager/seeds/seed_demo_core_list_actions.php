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
                                                                                        "active"=> 1,
                                                                                        "description"=> "",
                                                                                        "icon"=>"oc-icon-adjust",
                                                                                        "css_class"=> "",
                                                                                        "sort_order"=> 0,
                                                                                        "script"=> "",
                                                                                        "plugin_id"=> 6,
                                                                                        "model"=>"Demo\Casemanager\Models\CaseModel",
                                                                                        "list"=>"\$/demo/casemanager/models/casemodel/columns.yaml",
                                                                                        "html_attributes"=>"[]"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_list_actions')->where('plugin_id', 6)->delete();
            }
}
