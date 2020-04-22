<?php

namespace Demo\Core\EventHandlers\Model;

use Demo\Core\Classes\Utils\ModelUtil;
use Demo\Core\Models\ModelModel;
use Demo\Core\Models\Permission;
use Demo\Core\Models\PermissionPolicyAssociation;
use Demo\Core\Models\SecurityPolicy;
use October\Rain\Exception\ApplicationException;
use Schema;
use BackendAuth;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Models\CustomField;
use Doctrine\DBAL\Schema\Table;
use RainLab\Builder\Classes\DatabaseTableSchemaCreator;
use RainLab\Builder\Classes\MigrationColumnType;

/**
 * This will auto generate permission code
 * Steps -
 * Step 1. Create policy for the model
 * Step 2. Create Permissions for the model
 */
class BeforeCreateModels
{
    public $model = ModelModel::class;
    public $events = ['creating'];
    public $sort_order = -1000;

    public function handler($event, $model)
    {
        $policy = SecurityPolicy::create([
            'name' => $model->name . ' Policy',
            'plugin_id' => $model->plugin_id,
        ]);
        $operations = ['create', 'update', 'delete', 'read'];
        $permissions = [];
        foreach ($operations as $operation) {
            $permission = Permission::create([
                'name' => $model->name . ' ' . $operation . ' Permission',
                'model' => $model->model,
                'description' => 'This is the system generated permission for ' . $model->name . ' ' . $operation,
                'active' => true,
                'system' => true,
                'admin_override' => true,
                'operation' => $operation,
                'plugin_id' => $model->plugin_id,
            ]);
            PermissionPolicyAssociation::create([
                'permission_id' => $permission->id,
                'policy_id' => $policy->id,
                'plugin_id' => $model->plugin_id,
            ]);
        }
    }

}
