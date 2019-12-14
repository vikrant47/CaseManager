<?php

namespace Demo\Core\EventHandlers\CustomField;

use Schema;
use BackendAuth;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Models\CustomField;
use Doctrine\DBAL\Schema\Table;
use RainLab\Builder\Classes\DatabaseTableSchemaCreator;
use RainLab\Builder\Classes\MigrationColumnType;

class BeforeCreateOrUpdateCustomField
{
    public $model = CustomField::class;
    public $events = ['creating', 'updating', 'deleting'];
    public $sort_order = -1000;

    public function handler($event, $model)
    {
        if ($event === 'creating') {
            $this->handlerCreated($model);
        } else if ($event === 'updating') {
            $this->handlerUpdated($model);
        } else if ($event === 'deleting') {
            $this->handlerDeleted($model);
        }
    }

    public function handlerCreated($model)
    {
        $targetModel = new $model->model();
        $this->addColumn($targetModel->table, $model->attributes);
    }

    public function handlerUpdated($model)
    {
        $targetModel = new $model->model();
        $this->updateColumn($targetModel->table, $model->name, $this->attributes);
    }

    public function handlerDeleted($model)
    {
        $targetModel = new $model->model();
        $this->dropColumn($targetModel->table, $model->name);
    }

    public function dropColumn($tableName, $columnName)
    {
        Schema::table($tableName, function ($table) use ($columnName) {
            $table->dropColumn($columnName);
        });
    }

    public function updateColumn($tableName, $columnName, $options)
    {
        $self = $this;
        Schema::table($tableName, function ($table) use ($columnName, $options, $self) {
            $column = $table->getColumn($columnName);
            $column->setOptions($self->formatOptions($options));
        });
    }

    /**
     * @param string $name Specifies the table name.
     * @param array $columns A list of the table columns.
     * @return \Doctrine\DBAL\Schema\Table Returns the table schema.
     */
    public function addColumn($tableName, $column)
    {
        $self = $this;
        Schema::table($tableName, function ($table) use ($column, $self) {
            $primaryKeyColumns = [];
            $type = trim($column['type']);
            $typeName = MigrationColumnType::toDoctrineTypeName($type);
            $options = $self->formatOptions($type, $column);
            $table->addColumn($typeName, $column['name'], $options);
            /*if ($column['primary_key']) {
                $primaryKeyColumns[] = $column['name'];
            }
            if ($primaryKeyColumns) {
                $schema->setPrimaryKey($primaryKeyColumns);
            }*/
        });
    }

    /**
     * Converts column options to a format supported by Doctrine\DBAL\Schema\Column
     */
    public function formatOptions($type, $options)
    {
        $result = MigrationColumnType::lengthToPrecisionAndScale($type, $options['length']);

        $result['unsigned'] = !!$options['unsigned'];
        $result['nullable'] = $options['allow_null'];
        // $result['autoincrement'] = !!$options['auto_increment'];

        $default = trim($options['default']);

        // Note - this code doesn't allow to set empty string as default.
        // But converting empty strings to NULLs is required for the further
        // work with Doctrine types. As an option - empty strings could be specified
        // as '' in the editor UI (table column editor).
        if ($result['nullable'] === true) {
            if (strtolower($default) === 'null') {
                $result['default'] = null;
            } elseif (preg_match('/^[\'"]null[\'"]$/i', $default)) {
                $result['default'] = 'null';
            } else {
                $result['default'] = $default === '' ? null : $default;
            }
        } else {
            $result['default'] = $default === '' ? null : $default;
        }

        return $result;
    }
}
