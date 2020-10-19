<?php namespace Demo\Core\Models;

use Dotenv\Exception\ValidationException;
use Model;
use Schema;

/**
 * Model
 */
class ModelAssociation extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_core_model_associations';
    public $incrementing = false;

    /**
     * @var array Validation rules
     */
    public $rules = [
        'source_model_ref' => ['required'],
        'target_model_ref' => ['required'],
        'cascade' => ['required'],
        'name' => ['required'],
    ];

    public $belongsTo = [
        'source_model_ref' => [ModelModel::class, 'key' => 'source_model', 'otherKey' => 'model'],
        'target_model_ref' => [ModelModel::class, 'key' => 'target_model', 'otherKey' => 'model'],
        'application' => [EngineApplication::class, 'nameFrom' => 'name', 'key' => 'engine_application_id']
    ];
    public $attachAuditedBy = true;

    public function getForeignKeyOptions()
    {
        $options = [];
        if (!empty($this->source_model)) {
            $sourceModelRef = new $this->source_model();
            $columns = Schema::getColumnListing($sourceModelRef->table);
            foreach ($columns as $column) {
                $options[$column] = $column;
            }
        }
        return $options;
    }

    public function beforeSave()
    {
        $sourceModelRef = new $this->source_model();
        $columns = Schema::getColumnListing($sourceModelRef->table);
        if (!array_search($this->foreign_key, $columns)) {
            throw new ValidationException('Foreign key doesn\'t belongs to source table');
        }
    }
}
