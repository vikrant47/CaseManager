<?php


namespace Demo\Core\Classes\Beans;

use Demo\Core\Classes\Helpers\PluginConnection;
use Db;
use Log;
use BackendAuth;
use October\Rain\Exception\ApplicationException;

class ScriptContext
{
    public static $EXCEPTION_CLASSES = [
        'ApplicationException' => ApplicationException::class
    ];

    public $currentUser;
    public $attributes = [];
    public $exception;

    /**
     * ScriptContext constructor.
     */
    public function __construct()
    {

    }

    public function setCurrentUser($user)
    {
        BackendAuth::setUser($user);
    }

    public function setAttribute(string $key, $value): self
    {
        $this->attributes[$key] = $value;
        return $this;
    }

    public function getAttribute(string $key)
    {
        return $this->attributes[$key];
    }

    public function toArray()
    {
        return $this->attributes + ['exception' => $this->exception, 'currentUser' => $this->currentUser, 'request' => $this->request];
    }

    public function getPluginConnection($code)
    {
        return PluginConnection::getConnection($code);
    }

    public function evalSql($sql, $pagination = true, $page = 1, $perPage = 20)
    {
        $evalSql = new EvalSql($sql, $pagination);
        return $evalSql->eval(['widget' => $this], $page, $perPage);
    }

    public function buildContext($attributes)
    {
        $this->attributes = $this->attributes + $attributes + [
                'EvalArray' => EvalArray::class,
                'EvalSql' => EvalSql::class,
                'Db' => Db::class,
                'DB' => Db::class,
            ];
        $this->currentUser = BackendAuth::getUser();
        $this->exception = new \stdClass();
        $this->request = request();
        foreach ($this->attributes as $key => $value) {
            ${$key} = $value;
            $this->{$key} = $value;
        }
        foreach (ScriptContext::$EXCEPTION_CLASSES as $key => $value) {
            $this->exception->{$key} = $value;
        }
    }

    public function execute($script, $attributes = [])
    {
        $context = $this;
        $this->buildContext($attributes);
        try {
            return eval($script);
        } catch (\Exception $ex) {
            $msg = 'Error occurred while evaluating script ' . $ex->getMessage() . ' script = ' . $script . ' on ' . $ex->getLine();
            PluginConnection::getCurrentLogger()->debug($msg);
            throw $ex;
        }
    }

    public static function executeScript($script, $attributes = [])
    {
        $context = new ScriptContext();
        return $context->execute($script, $attributes);
    }

}

