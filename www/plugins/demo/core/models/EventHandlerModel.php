<?php namespace Demo\Core\Models;

use Model;

/**
 * Model
 */
class EventHandlerModel extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_core_event_handlers';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
