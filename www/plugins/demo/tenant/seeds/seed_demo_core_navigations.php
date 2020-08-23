<?php
namespace Demo\Tenant\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Tenant d */
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
                                                                                        "type"=>"list",
                                                                                        "active"=> 1,
                                                                                        "name"=>"tenants",
                                                                                        "description"=> "",
                                                                                        "url"=> "",
                                                                                        "model"=>"Demo\Tenant\Models\Tenant",
                                                                                        "list"=>"\$/demo/tenant/models/tenant/columns.yaml",
                                                                                        "form"=> null,
                                                                                        "view"=> "",
                                                                                        "uipage_id"=> null,
                                                                                        "record_id"=> null,
                                                                                        "dashboard_id"=> null,
                                                                                        "widget_id"=> null,
                                                                                        "plugin_id"=> 12,
                                                                                        "parent_id"=>"c1021025-5a8e-4344-af1e-178dd1d1d29e",
                                                                                        "sort_order"=> 0
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_navigations')->where('plugin_id', 12)->delete();
            }
}
