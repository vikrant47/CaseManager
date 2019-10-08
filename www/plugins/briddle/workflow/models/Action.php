<?php namespace Briddle\Workflow\Models;

use Model;

/**
 * Model
 */
class Action extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var array Validation rules
     */
    public $rules = [
        'name'                  => ['required','regex:"^[a-z]+$"']
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'briddle_workflow_actions';
}
