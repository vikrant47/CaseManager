<?php


namespace Demo\Core\Classes\Beans;

use BackendAuth;
use Illuminate\Support\Str;
use October\Rain\Exception\ApplicationException;
use October\Rain\Parse\Twig;
use App;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

class ExpressionEngine
{
    const START_BRACES = '${';
    const END_BRACES = '}';
    protected $template;
    protected $context = [];
    /**@var ExpressionLanguage $expressionLanguage */
    protected $expressionLanguage;

    public function __construct($template, $trimPrenthsis = true)
    {
        $template = trim($template);
        if ($trimPrenthsis === true) {
            $template = Str::substr($template, 2, Str::length($template) - 3);
        }
        $this->template = $template;
        $this->expressionLanguage = new ExpressionLanguage();
    }

    /**
     * @param $template
     * @return ExpressionEngine
     */
    public function compile($template)
    {
        if (empty($template)) {
            throw new \Exception('Provided template is empty');
        }
        $this->template = $this->expressionLanguage->compile($template);
        return $this;
    }

    public function buildContext($context = [])
    {
        $templateEngine = new TemplateEngine();
        $templateEngine->buildContext($context);
        $this->context = $templateEngine->toArray();
        return $this->context;
    }

    public function evaluate($context = [])
    {
        $context = $this->buildContext($context);
        return $this->expressionLanguage->evaluate($this->template, $context);
    }

    /*    public static function evalArray($array, $context = [])
        {
            $expressionEngine = new ExpressionEngine();
            return json_decode($expressionEngine->compile(json_encode($array))->evaluate($context, $context), true);
        }*/

    public static function eval($template, $context = [], $trimPrenthsis = true)
    {
        $expressionEngine = new ExpressionEngine($template);
        return $expressionEngine->evaluate($context);
    }

}
