<?php namespace Demo\Core\Models;

use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Classes\Utils\ModelUtil;
use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Schema\Table;
use Dotenv\Exception\ValidationException;
use Model;
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
        'plugin' => [PluginVersions::class, 'key' => 'plugin_id'],
    ];

    /**
     * Return the model table instance
     * @return Table
     */
    public function getModelTable()
    {
        if (empty($this->model)) {
            return null;
        }
        $model = new $this->model();
        $schema = DatabaseTableModel::getSchema();
        $table = $schema->getTable($model->table);
        return $table;
    }

    public function getAuditColumnsOptions()
    {
        /**@var Column[] $columns */
        $table = $this->getModelTable();
        if ($table === null) {
            return ['*'];
        }
        $columns = $table->getColumns();
        $columnNames = array_map(function ($column) {
            /**@var  $column Column */
            return $column->getName();
        }, $columns);
        array_push($columnNames, '*');
        asort($columnNames);
        return $columnNames;
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
        $formModel = new ModelFormModel();
        $formModel->setModelClassName(ModelUtil::getShortName($this->model));
        $formModel->setPluginCode(PluginConnection::getPluginCodeFromClass($this->model));
        $modelDirPath = 'fields.yaml';
        $formModel->loadForm($modelDirPath);
        return $formModel;
    }

    public function getDefinition()
    {
        $formDefinition = $this->getFormDefinition();
        $newModel = new $this->model;
        return [
            'form' => ['controls' => $formDefinition->controls],
            'model' => $this->model,
            'associations' => [
                'belongsTo' => $newModel->belongsTo,
                'hasMany' => $newModel->hasMany,
                'hasOne' => $newModel->hasOne,
                'belongsToMany' => $newModel->belongsToMany
            ],
        ];
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
