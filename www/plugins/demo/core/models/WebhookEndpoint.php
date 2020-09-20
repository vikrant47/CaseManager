<?php namespace Demo\Core\Models;

use Demo\Core\Classes\Beans\ScriptContext;
use Demo\Core\Classes\Beans\TwigEngine;
use Demo\Core\Classes\Helpers\PluginConnection;
use Model;
use October\Rain\Network\Http;

/**
 * Model
 */
class WebhookEndpoint extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_core_webhook_endpoints';
    public $incrementing = false;

    /**
     * @var array Validation rules
     */
    public $rules = [
        'name' => 'required',
        'engine_application_id' => 'required',
    ];
    public $belongsTo = [
        'webhook' => [Webhook::class, 'nameFrom' => 'name', 'key' => 'webhook_id'],
        'application' => [EngineApplication::class, 'nameFrom' => 'name', 'key' => 'engine_application_id'],
    ];
    public $jsonable = ['headers'];

    protected $asyncExecution = false;

    protected $apiTimeout = -1;

    public function async($asyncExecution = true)
    {
        $this->asyncExecution = $asyncExecution;
    }

    public function timeout($apiTimeout = -1)
    {
        $this->apiTimeout = $apiTimeout;
    }

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

    public function execute($context = [])
    {
        $logger = PluginConnection::getCurrentLogger();
        $twigEngine = new TwigEngine();
        $scriptContext = new ScriptContext();
        $context = [
            'endpoint' => $this,
        ];
        $header = array_merge($this->getHeaders(), $this->webhook->getHeaders());
        if (!empty($header)) {
            $header = $twigEngine->evalArray($header, $context);
        }
        $body = [];
        if (!empty($this->body)) {
            $body = $this->getBody();
        } else {
            $body = $this->webhook->getBody();
        }
        $url = $this->webhook->getUrl();
        if ($this->override_url === true) {
            $url = $this->getUrl();
        }
        // TODO : Add rest invocation code
        $self = $this;
        $logger->debug('Executing webhook endpoint' . $this->name);
        return Http::{$this->method}($url, function ($http) use ($header, $body, $self) {
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
            $http->body($body);

            // Disable redirects
            // $http->noRedirect();

            // Check host SSL certificate
            // $http->verifySSL();

            // Sets the timeout duration
            $http->timeout($self->apiTimeout);

            // Write response to a file
            // $http->toFile('some/path/to/a/file.txt');

            // Sets a cURL option manually
            // $http->setOption('CURLOPT_SSL_VERIFYHOST', false);
            $http->setOption(CURLOPT_RETURNTRANSFER, $self->asyncExecution === true ? 0 : 1);
        });
    }
}
