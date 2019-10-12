<?php namespace Demo\Casemanager\Models;

use Model;

/**
 * Model
 */
class WorkflowModel extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_casemanager_workflows';

    protected $jsonable = ['definition'];

    public $hasOne = [
        'queue' => QueueModel::class
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public function getFromStateOptions()
    {
        return ['start' => 'Start', 'approver1' => 'Approver1', 'approver2' => 'Approver2', 'approver3' => 'Approver3'];
    }

    public function getToStateOptions()
    {
        return ['approver1' => 'Approver1', 'approver2' => 'Approver2', 'approver3' => 'Approver3', 'end' => 'End'];
    }

    public function getNextState($current_state)
    {
        foreach ($this->definition as $entry) {
            if ($entry->from_state === $current_state) {
                return $entry->to_state;
            }
        }
        return null;
    }
}
