<?php


namespace Demo\Core\Classes\Beans;

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
        $this->currentUser = BackendAuth::getUser();
        $this->exception = new EmptyClass();
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

    public function buildContext($attributes = [])
    {
        $this->attributes = $this->attributes + $attributes;
        foreach ($this->attributes as $key => $value) {
            $this->{$key} = $value;
        }
        foreach (ScriptContext::$EXCEPTION_CLASSES as $key => $value) {
            $this->exception->{$key} = $value;
        }

    }

    public function execute($script, $attributes = [])
    {
        $context = $this;
        $context->buildContext($attributes);
        return eval($script);
    }

    public static function executeScript($script, $attributes = [])
    {
        $context = new ScriptContext();
        return $context->execute($script, $attributes);
    }

}

class EmptyClass
{

}
