<?php namespace Demo\Casemanager\Models;

use Backend\Models\User;
use Demo\Workflow\Models\Workflow;
use Model;

/**
 * Model
 */
class Project extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_casemanager_projects';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $attachAuditedBy = true;

    public $attachOne = [
        'image' => 'System\Models\File'
    ];
    public $belongsTo = [
        'assigned_to' => [User::class, 'key' => 'assigned_to_id'],
        'default_assignee' => [User::class, 'key' => 'default_assignee_id'],
        'project_lead' => [User::class, 'key' => 'project_lead_id'],
        'workflow' => [Workflow::class, 'key' => 'workflow_id'],
    ];
}
