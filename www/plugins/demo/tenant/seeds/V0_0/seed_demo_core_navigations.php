<?php
namespace Demo\Tenant\Seeds\V0_0;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds tenant d */
class SeedDemoCoreNavigations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_navigations')->insert([
            [
                                                                            "id"=>"a1e64d30-df01-11ea-a07e-45079aa792c5",
                                                                                        "created_at"=>"2020-08-15 14:14:29",
                                                                                        "updated_at"=>"2020-08-15 14:14:29",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 0,
                                                                                        "label"=>"Tenants",
                                                                                        "icon"=>"oc-icon-code-fork",
                                                                                        "tooltip"=> null,
                                                                                        "position"=>"sidebar",
                                                                                        "type"=>"list",
                                                                                        "active"=> 1,
                                                                                        "name"=>"tenants",
                                                                                        "description"=> "",
                                                                                        "url"=> "",
                                                                                        "model"=>"Demo\Tenant\Models\Tenant",
                                                                                        "list"=>"\$/demo/tenant/models/tenant/columns.yaml",
                                                                                        "form"=> null,
                                                                                        "view"=> "",
                                                                                        "script"=> null,
                                                                                        "uipage_id"=> null,
                                                                                        "record_id"=> null,
                                                                                        "dashboard_id"=> null,
                                                                                        "widget_id"=> null,
                                                                                        "nav_application_id"=>"dc81b635-1d0a-4f3e-83af-13642d56abe4",
                                                                                        "engine_application_id"=>"801c3e91-8be6-402e-9872-69d6ea29fe06",
                                                                                        "parent_id"=>"c1021025-5a8e-4344-af1e-178dd1d1d29e",
                                                                                        "sort_order"=> 0
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_navigations')->where('engine_application_id', '801c3e91-8be6-402e-9872-69d6ea29fe06')->delete();
            }
}
