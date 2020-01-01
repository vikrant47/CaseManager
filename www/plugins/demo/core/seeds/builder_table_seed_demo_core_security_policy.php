<?php

namespace Demo\Core\Seeds;

use Demo\Core\Models\ModelModel;
use Schema;
use Seeder;
use Db;

class BuilderTableSeedDemoCoreSecurityPolicy extends Seeder
{
    /*select row_number() OVER () as id,
           model.plugin_id,
           model.created_at,
           model.updated_at,
           model.created_by_id,
           model.updated_by_id,
           concat(model.name,' Security Policy') as name,
           concat('Security Policy for all operations on ',model.name) as description
    from demo_core_models model
           join system_plugin_versions plugin on plugin.id = model.plugin_id;*/
    public function run()
    {
        Db::table('demo_core_security_policies')->insert([
            [
                'id' => 1,
                'plugin_id' => 11,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Queue Security Policy',
                'description' => 'Security Policy for all operations on Queue'
            ],
            [
                'id' => 2,
                'plugin_id' => 11,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Queue Item Security Policy',
                'description' => 'Security Policy for all operations on Queue Item'
            ],
            [
                'id' => 3,
                'plugin_id' => 11,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Queue Pop Criteria Security Policy',
                'description' => 'Security Policy for all operations on Queue Pop Criteria'
            ],
            [
                'id' => 4,
                'plugin_id' => 11,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Queue Routing Rule Security Policy',
                'description' => 'Security Policy for all operations on Queue Routing Rule'
            ],
            [
                'id' => 5,
                'plugin_id' => 11,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Workflow Security Policy',
                'description' => 'Security Policy for all operations on Workflow'
            ],
            [
                'id' => 6,
                'plugin_id' => 11,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Workflow Item Security Policy',
                'description' => 'Security Policy for all operations on Workflow Item'
            ],
            [
                'id' => 7,
                'plugin_id' => 11,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Workflow State Security Policy',
                'description' => 'Security Policy for all operations on Workflow State'
            ],
            [
                'id' => 8,
                'plugin_id' => 11,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Workflow Transition Security Policy',
                'description' => 'Security Policy for all operations on Workflow Transition'
            ],
            [
                'id' => 9,
                'plugin_id' => 11,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Webhook Security Policy',
                'description' => 'Security Policy for all operations on Webhook'
            ],
            [
                'id' => 10,
                'plugin_id' => 11,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Queue Security Policy',
                'description' => 'Security Policy for all operations on Queue'
            ],
            [
                'id' => 11,
                'plugin_id' => 11,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Queue Item Security Policy',
                'description' => 'Security Policy for all operations on Queue Item'
            ],
            [
                'id' => 12,
                'plugin_id' => 11,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Queue Pop Criteria Security Policy',
                'description' => 'Security Policy for all operations on Queue Pop Criteria'
            ],
            [
                'id' => 13,
                'plugin_id' => 11,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Queue Routing Rule Security Policy',
                'description' => 'Security Policy for all operations on Queue Routing Rule'
            ],
            [
                'id' => 14,
                'plugin_id' => 11,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Workflow Security Policy',
                'description' => 'Security Policy for all operations on Workflow'
            ],
            [
                'id' => 15,
                'plugin_id' => 11,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Workflow Item Security Policy',
                'description' => 'Security Policy for all operations on Workflow Item'
            ],
            [
                'id' => 16,
                'plugin_id' => 11,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Workflow State Security Policy',
                'description' => 'Security Policy for all operations on Workflow State'
            ],
            [
                'id' => 17,
                'plugin_id' => 11,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Workflow Transition Security Policy',
                'description' => 'Security Policy for all operations on Workflow Transition'
            ],
            [
                'id' => 18,
                'plugin_id' => 11,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Webhook Security Policy',
                'description' => 'Security Policy for all operations on Webhook'
            ],
            [
                'id' => 19,
                'plugin_id' => 11,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Widget Security Policy',
                'description' => 'Security Policy for all operations on Widget'
            ],
            [
                'id' => 20,
                'plugin_id' => 11,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-28 14:43:57',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Dashboard Security Policy',
                'description' => 'Security Policy for all operations on Dashboard'
            ],
            [
                'id' => 21,
                'plugin_id' => 10,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Models Model Security Policy',
                'description' => 'Security Policy for all operations on Models Model'
            ],
            [
                'id' => 22,
                'plugin_id' => 10,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Custom Field Security Policy',
                'description' => 'Security Policy for all operations on Custom Field'
            ],
            [
                'id' => 23,
                'plugin_id' => 10,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Form Field Security Policy',
                'description' => 'Security Policy for all operations on Form Field'
            ],
            [
                'id' => 24,
                'plugin_id' => 10,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Event Handler Security Policy',
                'description' => 'Security Policy for all operations on Event Handler'
            ],
            [
                'id' => 25,
                'plugin_id' => 10,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Inbound Api Security Policy',
                'description' => 'Security Policy for all operations on Inbound Api'
            ],
            [
                'id' => 26,
                'plugin_id' => 10,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Command Security Policy',
                'description' => 'Security Policy for all operations on Command'
            ],
            [
                'id' => 27,
                'plugin_id' => 10,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Iframe Security Policy',
                'description' => 'Security Policy for all operations on Iframe'
            ],
            [
                'id' => 28,
                'plugin_id' => 10,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Javascript Library Security Policy',
                'description' => 'Security Policy for all operations on Javascript Library'
            ],
            [
                'id' => 29,
                'plugin_id' => 10,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Webhook Security Policy',
                'description' => 'Security Policy for all operations on Webhook'
            ],
            [
                'id' => 30,
                'plugin_id' => 10,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Model Association Security Policy',
                'description' => 'Security Policy for all operations on Model Association'
            ],
            [
                'id' => 31,
                'plugin_id' => 10,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Role Security Policy',
                'description' => 'Security Policy for all operations on Role'
            ],
            [
                'id' => 32,
                'plugin_id' => 10,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Permission Security Policy',
                'description' => 'Security Policy for all operations on Permission'
            ],
            [
                'id' => 33,
                'plugin_id' => 10,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Security Policy Security Policy',
                'description' => 'Security Policy for all operations on Security Policy'
            ],
            [
                'id' => 34,
                'plugin_id' => 10,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Security Policy Association Security Policy',
                'description' => 'Security Policy for all operations on Security Policy Association'
            ],
            [
                'id' => 35,
                'plugin_id' => 10,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'Role Policy Association Security Policy',
                'description' => 'Security Policy for all operations on Role Policy Association'
            ],
            [
                'id' => 36,
                'plugin_id' => 10,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'User Security Policy',
                'description' => 'Security Policy for all operations on User'
            ],
            [
                'id' => 37,
                'plugin_id' => 10,
                'created_at' => '2019-12-20 14:15:39',
                'updated_at' => '2019-12-20 14:15:39',
                'created_by_id' => 1,
                'updated_by_id' => 1,
                'name' => 'User Security Policy',
                'description' => 'Security Policy for all operations on User'
            ]
        ]);
    }
}
