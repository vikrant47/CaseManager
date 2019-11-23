<?php


namespace Demo\Core\Classes\Beans;

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

    public function setAttribute(string $key, $value): self
    {
        $this->attributes[$key] = $value;
        return $this;
    }

    public function getAttribute(string $key)
    {
        return $this->attributes[$key];
    }

    public function execute($script, $attributes = [])
    {
        $context = $this;
        $this->attributes = $this->attributes + $attributes;
        $this->currentUser = BackendAuth::getUser();
        $this->exception = new EmptyClass();
        foreach ($this->attributes as $key => $value) {
            ${$key} = $value;
            $this->{$key} = $value;
        }
        foreach (ScriptContext::$EXCEPTION_CLASSES as $key => $value) {
            $this->exception->{$key} = $value;
        }

        try {
            return eval($script);
        } catch (\Exception $ex) {
            Log::debug('Error occurred while evaluating script ' . $ex->getMessage() . ' script = ' . $script . ' on ' . $ex->getLine());
            throw $ex;
        }
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
