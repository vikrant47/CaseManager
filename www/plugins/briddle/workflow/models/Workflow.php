<?php namespace Briddle\Workflow\Models;

use Model;


/**
 * Model
 */
class Workflow extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;
    
    /**
     * @var string The one to one relation needed for form relation and record finder (added manually).
     */
    public $belongsTo = [
        'action_id' => ['Briddle\Workflow\Models\Action']
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
        'name'                  => ['required','regex:"^[A-Za-z]+$"']
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'briddle_workflow_workflows';
    
    protected $jsonable = ['items'];
    
}