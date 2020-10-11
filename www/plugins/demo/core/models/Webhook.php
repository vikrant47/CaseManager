<?php namespace Demo\Core\Models;

use Demo\Core\Classes\Beans\TemplateEngine;
use Demo\Core\Classes\Beans\TwigEngine;
use Demo\Core\Classes\Helpers\PluginConnection;
use Model;
use October\Rain\Network\Http;

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
    public $incrementing = false;

    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => 'required',
        'url' => 'required',
        'engine_application_id' => 'required',
    ];

    public $belongsTo = [
        'application' => [EngineApplication::class, 'nameFrom' => 'name', 'key' => 'engine_application_id'],
        'model_ref' => [ModelModel::class, 'key' => 'model', 'otherKey' => 'model'],
    ];

    public $jsonable = ['headers'];

    public $attachAuditedBy = true;

    public function getBody($context = [])
    {
        $twigEngine = new TwigEngine();
        if (!empty($this->body)) {
            return json_decode($twigEngine->eval($this->body, $context), true);
        }
        return [];
    }

    public function getHeaders($context = [])
    {
        $twigEngine = new TwigEngine();
        if (!empty($this->headers)) {
            return json_decode($twigEngine->eval($this->headers, $context), true);
        }
        return [];
    }

    public function getUrl($context = [])
    {
        $twigEngine = new TwigEngine();
        if (!empty($this->url)) {
            return json_decode($twigEngine->eval($this->url, $context), true);
        }
        return null;
    }

}
