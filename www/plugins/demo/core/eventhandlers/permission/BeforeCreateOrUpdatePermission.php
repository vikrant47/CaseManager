<?php

namespace Demo\Core\EventHandlers\Permission;

use Demo\Core\Classes\Utils\ModelUtil;
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
 */
class BeforeCreateOrUpdatePermission
{
    public $model = CustomField::class;
    public $events = ['creating', 'updating'];
    public $sort_order = -1000;

    public function handler($event, $model)
    {
        $modelClass = get_class($model);
        $permissionLevel = 'row';
        if (empty($model->columns)) {
            $permissionLevel = 'column';
        }
        $model->code = strtolower(ModelUtil::getPluginCode($modelClass)) . '::' . strtolower(ModelUtil::getShortName($modelClass)) . '.' . $permissionLevel . '.' . $model->operation;
    }

}
