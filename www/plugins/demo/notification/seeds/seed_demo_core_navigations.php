<?php
namespace Demo\Notification\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Notification d */
class SeedDemoCoreNavigations implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_navigations')->insert([
            [
                                                                            "id"=> 52,
                                                                                        "created_at"=>"2020-05-10 10:28:19",
                                                                                        "updated_at"=>"2020-05-10 14:43:33",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "version"=> 2,
                                                                                        "label"=>"Dashboard2",
                                                                                        "type"=>"list",
                                                                                        "active"=> 1,
                                                                                        "name"=>"dashboard",
                                                                                        "description"=> "",
                                                                                        "url"=> "",
                                                                                        "model"=>"Demo\Report\Models\Dashboard",
                                                                                        "list"=>"\$/demo/report/models/dashboard/columns.yaml",
                                                                                        "form"=> "",
                                                                                        "record_id"=> null,
                                                                                        "plugin_id"=> 3,
                                                                                        "parent_id"=> 26,
                                                                                        "sort_order"=> 2,
                                                                                        "icon"=>"oc-icon-adjust"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_navigations')->where('plugin_id', 3)->delete();
            }
}
