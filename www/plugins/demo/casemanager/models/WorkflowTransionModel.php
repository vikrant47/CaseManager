<?php namespace Demo\Casemanager\Models;

use Model;

/**
 * Model
 */
class WorkflowTransionModel extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_casemanager_workflow_transitions';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
