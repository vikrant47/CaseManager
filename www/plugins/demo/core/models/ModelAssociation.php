<?php namespace Demo\Core\Models;

use Model;

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

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'source_model_ref' => [ModelModel::class, 'key' => 'source_model', 'other_key' => 'model_type'],
        'target_model_ref' => [ModelModel::class, 'key' => 'target_model', 'other_key' => 'model_type']
    ];

    public function getForeignKeyOptions()
    {
        return [];
    }
}
