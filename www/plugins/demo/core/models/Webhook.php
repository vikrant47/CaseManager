<?php namespace Demo\Core\Models;

use Model;

/**
 * Model
 */
class Webhook extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_core_webhooks';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $jsonable = ['request_headers', 'request_body'];

    public $attachAuditedBy = true;
}
