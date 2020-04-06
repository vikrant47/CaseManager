<?php
namespace Demo\Workflow\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Workflow d */
class SeedDemoCoreSecurityPolicies implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_security_policies')->insert([
            [
                                                                            "id"=> 14,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Workflow Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Workflow",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 15,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Workflow Item Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Workflow Item",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 16,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Workflow State Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Workflow State",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 17,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Workflow Transition Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Workflow Transition",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 18,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Webhook Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Webhook",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 19,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Widget Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Widget",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 20,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-28 14:43:57",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Dashboard Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Dashboard",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 111,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Queue",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 112,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Item Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Queue Item",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 113,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Pop Criteria Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Queue Pop Criteria",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 114,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Routing Rule Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Queue Routing Rule",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 1,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Queue",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 2,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Item Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Queue Item",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 3,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Pop Criteria Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Queue Pop Criteria",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 4,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Routing Rule Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Queue Routing Rule",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 5,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Workflow Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Workflow",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 6,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Workflow Item Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Workflow Item",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 7,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Workflow State Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Workflow State",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 8,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Workflow Transition Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Workflow Transition",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 9,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Webhook Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Webhook",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 10,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Queue",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 11,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Item Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Queue Item",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 12,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Pop Criteria Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Queue Pop Criteria",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 13,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Routing Rule Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Queue Routing Rule",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 115,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Report Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Report",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 116,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Report Item Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Report Item",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 117,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Report State Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Report State",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 118,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Report Transition Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Report Transition",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 120,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Queue",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 121,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Item Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Queue Item",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 122,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Pop Criteria Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Queue Pop Criteria",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 123,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Queue Routing Rule Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Queue Routing Rule",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 124,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Report Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Report",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 125,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Report Item Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Report Item",
                                                                                        "plugin_id"=> 11
                            ] ,            [
                                                                            "id"=> 126,
                                                                                        "created_at"=>"2019-12-20 14:15:39",
                                                                                        "updated_at"=>"2019-12-20 14:15:39",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"Report State Security Policy",
                                                                                        "description"=>"Security Policy for all operations on Report State",
                                                                                        "plugin_id"=> 11
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_security_policies')->where('plugin_id', 11)->delete();
            }
}
