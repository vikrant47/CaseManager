<?php namespace Demo\Core\Models;

use Demo\Core\Classes\Helpers\PluginConnection;
use Model;
use RainLab\Builder\Classes\PluginCode;

/**
 * Model
 */
class FormField extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_core_form_fields';


    /**
     * @var array Validation rules
     */
    public $rules = [
        'field' => 'required',
        'form' => 'required'
    ];

    public $attachAuditedBy = true;
    public $jsonable = ['controls'];
    public $belongsTo = [
        'plugin' => [PluginVersions::class, 'key' => 'plugin_id'],
        'field' => [CustomField::class, 'key' => 'field_id']
    ];

    public function getFormOptions($value, $data)
    {
        if (isset($data->field)) {
            return PluginConnection::getFormsAlias($data->field->model);
        }
        return PluginConnection::getAllFormsAlias();
    }

    public function getPluginCodeObj()
    {
        return new PluginCode('demo.core');
    }

    public function getControls()
    {
        return ['fields' => ['name' => ['label' => 'test']]];
    }

    public function beforeSave()
    {
        if (array_key_exists('controls', $this->attributes) && !is_array($this->attributes['controls'])) {
            $controls = json_decode($this->attributes['controls'], true);
            if (!is_array($controls)) {
                $controls = json_decode($controls, true);
            }
            if ($this->attributes['controls'] === null) {
                throw new SystemException('Cannot decode controls JSON string.');
            }
            $fields = $controls['fields'];
            $newFields = [];
            foreach ($fields as $key => $value) {
                $newFields[$this->field->name] = $value;
            }
            $controls['fields'] = $newFields;
            $this->attributes['controls'] = json_encode($controls);
        }
    }

    // public $controls =  ['fields' => ['name' => ['label' => 'test']]];
}
