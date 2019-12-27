<?php namespace Demo\Core\Models;

use Demo\Core\Classes\Beans\ScriptContext;
use Demo\Core\Classes\Beans\TwigEngine;
use Model;

/**
 * Model
 */
class Webhook extends Model
{
    use \October\Rain\Database\Traits\Validation;

    const IGNORE_MODELS = [];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_core_webhooks';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => 'required',
        'model' => 'required',
        'plugin_id' => 'required',
        'event' => 'required'
    ];

    public $belongsTo = [
        'plugin' => [PluginVersions::class, 'key' => 'plugin_id'],
        'model_ref' => [ModelModel::class, 'key' => 'model', 'otherKey' => 'model_type'],
    ];

    public $jsonable = ['request_headers', 'request_body'];

    public $attachAuditedBy = true;

    public function execute($context)
    {
        $condition = $this->condition;
        $scriptContext = new ScriptContext();
        if (trim(strlen($condition)) === 0 || $scriptContext->execute($condition, $context) === true) {
            $context = [
                'model' => $context['model'], 'event' => $context['event'], 'webhook', $this
            ];
            $header = $this->request_headers;
            if (!empty($header)) {
                $twigEngine = new TwigEngine();
                $header = $twigEngine->evalArray($header, $context);
            }
            $body = $this->request_body;
            if (!empty($body)) {
                $twigEngine = new TwigEngine();
                $body = $twigEngine->evalArray($header, $context);
            }
            // TODO : Add rest invocation code
        }
    }

}
