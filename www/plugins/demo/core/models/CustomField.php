<?php namespace Demo\Core\Models;

use Demo\Core\Classes\Helpers\PluginConnection;
use Doctrine\DBAL\Types\Type as DoctrineType;
use Model;
use RainLab\Builder\Classes\MigrationColumnType;

/**
 * Model
 */
class CustomField extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * This will returns the corresponding doctrine field type from form field
     * @param $type string Form field type
     */
    public static function toDoctrineTypeName($type)
    {
        $additionalTypes = [
            'guid' => DoctrineType::STRING,
        ];
        if (array_key_exists($type, $additionalTypes)) {
            return $additionalTypes[$type];
        }
        return MigrationColumnType::toDoctrineTypeName($type);
    }

    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_core_custom_fields';
    public $incrementing = false;

    /**
     * @var array Validation rules
     */
    public $rules = [
        'engine_application_id' => 'required',
        'model' => 'required',
        'name' => 'required',
        'code' => 'regex:/^[a-zA-Z0-9_]*$/i',
    ];

    public $immutables = ['code'];
    public $attachAuditedBy = true;

    public $belongsTo = [
        'model_ref' => [ModelModel::class, 'key' => 'model', 'otherKey' => 'model'],
        'application' => [EngineApplication::class, 'nameFrom' => 'name', 'key' => 'engine_application_id']
    ];

    public function beforeCreate()
    {
        $this->code = $this->application->code . '_' . snake_case(trim($this->name));
    }
}
