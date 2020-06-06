<?php namespace Demo\Core\Models;

use Demo\Core\Classes\Beans\ScriptContext;
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
        'model' => 'required',
        'plugin_id' => 'required',
        'event' => 'required'
    ];

    public $belongsTo = [
        'plugin' => [PluginVersions::class, 'key' => 'plugin_id'],
        'model_ref' => [ModelModel::class, 'key' => 'model', 'otherKey' => 'model'],
    ];

    public $jsonable = ['request_headers', 'request_body'];

    public $attachAuditedBy = true;


    public function execute($context)
    {
        $logger = PluginConnection::getCurrentLogger();
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
            $url = TwigEngine::eval($this->url, $context);
            // TODO : Add rest invocation code
            $self = $this;
            $logger->debug('Executing webhook ' . $this->name);
            Http::{$this->method}($url, function ($http) use ($header, $body, $self) {
                /**@var $http Http */
                // Sets a HTTP header
                $http->header(array_reduce($header, function ($headers, $nextValue) {
                    $headers[$nextValue['name']] = $nextValue['value'];
                    return $headers;
                }, []));

                // Set a proxy of type (http, socks4, socks5)
                // $http->proxy('type', 'host', 'port', 'username', 'password');

                // Use basic authentication
                // $http->auth('user', 'pass');

                // Sends data with the request
                $http->header(array_reduce($body, function ($data, $nextValue) {
                    $data[$nextValue['name']] = $nextValue['value'];
                    return $data;
                }, []));

                // Disable redirects
                // $http->noRedirect();

                // Check host SSL certificate
                // $http->verifySSL();

                // Sets the timeout duration
                $http->timeout($self->timeout);

                // Write response to a file
                // $http->toFile('some/path/to/a/file.txt');

                // Sets a cURL option manually
                // $http->setOption('CURLOPT_SSL_VERIFYHOST', false);
                $http->setOption(CURLOPT_RETURNTRANSFER, $self->async ? 0 : 1);
            });
        }
    }

}
