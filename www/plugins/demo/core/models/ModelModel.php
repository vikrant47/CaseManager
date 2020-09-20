<?php namespace Demo\Core\Models;

use Backend\Models\User;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Classes\Utils\ModelUtil;
use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Schema\Table;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Collection;
use Model;
use October\Rain\Exception\ApplicationException;
use October\Rain\Parse\Yaml;
use RainLab\Builder\Classes\DatabaseTableModel;
use RainLab\Builder\Classes\ModelFormModel;

/**
 * Model
 */
class ModelModel extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_core_models';
    public $incrementing = false;
    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => 'required',
        'model' => 'required',
    ];

    public $jsonable = ['audit_columns'];
    public $attachAuditedBy = true;
    public $belongsTo = [
        'application' => [EngineApplication::class, 'nameFrom' => 'name', 'key' => 'engine_application_id'],
    ];

    static function getSystemFieldDefinition()
    {
        return [
            'application' => [
                'label' => 'Application',
                'nameFrom' => 'name',
                'descriptionFrom' => 'description',
                'span' => 'auto',
                'type' => 'relation',
                'association' => [
                    'model' => EngineApplication::class,
                    'key' => 'engine_application_id'
                ]
            ], 'created_at' => [
                'label' => 'Created At',
                'span' => 'auto',
                'type' => 'datetime',
            ], 'updated_at' => [
                'label' => 'Updated At',
                'span' => 'auto',
                'type' => 'datetime',
            ], 'created_by' => [
                'label' => 'Created By',
                'nameFrom' => 'email',
                'span' => 'auto',
                'type' => 'relation',
                'association' => [
                    'model' => User::class,
                    'key' => 'created_by_id'
                ],
            ], 'updated_by' => [
                'label' => 'Updated By',
                'nameFrom' => 'email',
                'descriptionFrom' => 'description',
                'span' => 'auto',
                'type' => 'relation',
                'association' => [
                    'model' => User::class,
                    'key' => 'updated_by_id'
                ],
            ], 'version' => [
                'label' => 'Version',
                'span' => 'auto',
                'type' => 'integer',
            ]
        ];
    }

    /**
     * Return the model table instance
     * @return Table
     * @throws \Doctrine\DBAL\Schema\SchemaException
     */
    public function getModelTable()
    {
        $table = null;
        if (empty($this->model)) {
            return null;
        }
        $model = new $this->model();
        $schema = DatabaseTableModel::getSchema();
        if (property_exists($model, 'table')) {
            $table = $schema->getTable($model->getTable());
        }
        return $table;
    }

    public function getAuditColumnsOptions()
    {
        $table = $this->getModelTable();
        if (!empty($table)) {
            $columns = $this->getColumns();
            $columnNames = $columns->map(function ($column) {
                /**@var  $column Column */
                return $column['name'];
            });
            $columnNames->push('*')->sort();
            $columnNameOptions = [];
            foreach ($columnNames as $columnName) {
                $columnNameOptions[$columnName] = $columnName;
            }
            return $columnNameOptions;
        }
        return [];
    }

    /**
     * @return  Collection<array>
     * @throws ApplicationException
     * @throws \Doctrine\DBAL\Schema\SchemaException
     */
    public function getColumns()
    {
        /**@var Column[] $columns */
        $table = $this->getModelTable();
        if ($table === null) {
            throw new ApplicationException('Unable to find column. Given table is empty');
        }
        $columns = $table->getColumns();
        return Collection::make($columns)->map(function ($column) {
            /**@var Column $column */
            $columnArr = $column->toArray();
            $columnArr['type'] = strtolower($columnArr['type'] . '');
            return $columnArr;
        })->values();
    }

    public function beforeSave()
    {
        if (!class_exists($this->model)) {
            throw new ValidationException('Invalid model type ' . $this->model);
        }
        if ($this->attach_audited_by == 1) {
            $table = $this->getModelTable();
            if (!($table->hasColumn('created_by_id') && $table->hasColumn('updated_by_id'))) {
                throw new ValidationException('created_by_id and updated_by_id filed not defined');
            }
        }
    }

    /**@return ModelFormModel */
    public function getFormDefinition()
    {
        if (!empty($this->model)) {
            $formModel = new ModelFormModel();
            $formModel->setModelClassName(ModelUtil::getShortName($this->model));
            $formModel->setPluginCode(PluginConnection::getPluginCodeFromClass($this->model));
            $modelDirPath = 'fields.yaml';
            $formModel->loadForm($modelDirPath);
            $systemFields = self::getSystemFieldDefinition();
            $formModel->controls['fields'] = array_merge($formModel->controls['fields'], $systemFields);
            return $formModel;
        }
        return null;
    }

    public function getDefinition($model = null)
    {
        $formDefinition = $this->getFormDefinition();
        if (!empty($this->model)) {
            $newModel = $model;
            if (empty($newModel)) {
                $newModel = new $this->model;
            }
            return [
                'form' => [
                    'controls' => $formDefinition->controls
                ],
                'model' => $this->model,
                'columns' => $this->getColumns(),
                'associations' => [
                    'belongsTo' => $newModel->belongsTo,
                    'hasMany' => $newModel->hasMany,
                    'hasOne' => $newModel->hasOne,
                    'belongsToMany' => $newModel->belongsToMany
                ],
            ];
        }
        return null;
    }

    public static function getModelAsDropdownOptions()
    {
        $options = [];
        $allModels = ModelModel::all();
        foreach ($allModels as $model) {
            $options[$model->model] = $model->name;
        }
        return $options;
    }

    public function getModelOptions()
    {
        return PluginConnection::getAllModelAlias(false);
    }
}
