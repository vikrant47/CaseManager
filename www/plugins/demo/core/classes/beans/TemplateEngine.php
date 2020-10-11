<?php


namespace Demo\Core\Classes\Beans;

use Demo\Core\Classes\Helpers\PluginConnection;
use Db;
use Illuminate\Support\Str;
use Log;
use BackendAuth;
use October\Rain\Exception\ApplicationException;

class TemplateEngine
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
    }

    public function execute($script, $attributes = [])
    {
        $context = $this;
        $this->buildContext($attributes);
        return $this->eval($script);
    }

    public function eval($script, $throwException = true)
    {
        $context = $this;
        try {
            return eval($script);
        } catch (\Exception $ex) {
            $msg = 'Error occurred while evaluating script ' . $ex->getMessage() . ' script = ' . $script . ' on ' . $ex->getLine();
            PluginConnection::getCurrentLogger()->debug($msg);
            if ($throwException) {
                throw $ex;
            }
        }
        return $script;
    }

    public function evalFunction($script, $throwException = true)
    {
        $context = $this;
        try {
            return eval($script);
        } catch (\Exception $ex) {
            $msg = 'Error occurred while evaluating script ' . $ex->getMessage() . ' script = ' . $script . ' on ' . $ex->getLine();
            PluginConnection::getCurrentLogger()->debug($msg);
            if ($throwException) {
                throw $ex;
            }
        }
        return $script;
    }

    /**
     * Checks weather given string is a dynamic template
     * A string that starts with {{ and ends with }} considerd a dynamic template
     * @param string $template
     * @return boolean
     */
    public static function isDynamicTemplate($template)
    {
        $template = trim($template);
        // check if template form like {{varCalc}}
        $startBracesCount = substr_count($template, '{{');
        $endBracesCount = substr_count($template, '{{');
        return $startBracesCount > 0 && $startBracesCount === $endBracesCount || strpos($template, '${') === 0;
    }

    public function wrapAroundFunction($phpString)
    {
        $context = $this;
        $variables = join(',', array_map(function ($attr) {
            return '$' . $attr;
        }, array_keys($this->attributes)));
        $variableRefs = join(',', array_map(function ($attr) {
            return '$context->attributes[\'' . $attr . '\']';
        }, array_keys($this->attributes)));
        return 'function templateFun(' . $variables . '){
                    return ' . $phpString . ';
                }
                templateFun(' . $variableRefs . ');
                ';
    }

    public static function evalTemplate($template, $attributes = [])
    {
        if (self::isDynamicTemplate($template)) {
            if (Str::startsWith($template, '${')) {
                /*$this->buildContext($attributes);
                $phpString = Str::substr($template, 2, Str::length($template) - 3);
                $phpString = $this->wrapAroundFunction($phpString);
                return $this->eval($phpString, $throwException);*/
                return ExpressionEngine::eval($template, $attributes);
            }
            return TwigEngine::eval($template, $attributes);
        }
    }

    public static function executeTemplate($template, $attributes = [])
    {
        // check if template form like {{varCalc}}
        $context = new TemplateEngine();
        return $context->evalTemplate($template, $attributes);
    }

    public static function executeScript($script, $attributes = [])
    {
        $context = new TemplateEngine();
        return $context->execute($script, $attributes);
    }

}

