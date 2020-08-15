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
                                                                            "created_at"=>"2020-08-15 14:14:29",
                                                                                        "updated_at"=>"2020-08-15 14:14:29",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> null,
                                                                                        "label"=>"Tenants",
                                                                                        "type"=>"list",
                                                                                        "active"=> 1,
                                                                                        "name"=>"tenants",
                                                                                        "description"=> "",
                                                                                        "url"=> "",
                                                                                        "model"=>"Demo\Tenant\Models\Tenant",
                                                                                        "view"=> "",
                                                                                        "form"=> null,
                                                                                        "plugin_id"=> 12,
                                                                                        "sort_order"=> 0,
                                                                                        "icon"=>"oc-icon-code-fork",
                                                                                        "id"=>"a1e64d30-df01-11ea-a07e-45079aa792c5",
                                                                                        "record_id"=> null,
                                                                                        "parent_id"=>"c1021025-5a8e-4344-af1e-178dd1d1d29e",
                                                                                        "dashboard_id"=> null,
                                                                                        "widget_id"=> null,
                                                                                        "uipage_id"=> null,
                                                                                        "list"=>"\$/demo/tenant/models/tenant/columns.yaml"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_navigations')->where('plugin_id', 12)->delete();
            }
}
