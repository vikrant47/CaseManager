<?php namespace Demo\Workflow\Models;

use Demo\Core\Models\CoreUser;
use Demo\Core\Models\ModelModel;
use Model;
use Backend\Models\User;

/**
 * Model
 */
class Task extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \Demo\Core\Classes\Traits\ModelTrait;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_workflow_tasks';
    public $incrementing = false;
    public $belongsTo = [
        'created_by' => [User::class, 'key' => 'created_by_id'],
        'updated_by' => [User::class, 'key' => 'updated_by_id'],
        'queue' => [Queue::class, 'key' => 'queue_id'],
        'model_ref' => [ModelModel::class, 'key' => 'model', 'otherKey' => 'model'],
        'assigned_to' => [User::class, 'key' => 'assigned_to_id']
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => 'required',
        'priority' => 'required',
        'model_ref' => 'required',
        'record_id' => 'required',
    ];

    public $attachAuditedBy = true;

    public function scopeFindByEntity($query, $entityType, $id)
    {
        return $query->where('model', $entityType)->where('id', $id);
    }

    public function getModel()
    {
        return $this->model::where('id', $this->record_id)->first();
    }
}
