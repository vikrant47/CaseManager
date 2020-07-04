<?php


namespace Demo\Core\Classes\Beans;

use BackendAuth;
use October\Rain\Exception\ApplicationException;
use October\Rain\Parse\Twig;
use App;

class TwigEngine extends Twig
{
    /**@var \Twig\TemplateWrapper */
    private $template;
    private $context = [];

    /**
     * @param $template
     * @return TwigEngine
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\SyntaxError
     */
    public function compile($template)
    {
        if (empty($template)) {
            throw new \Exception('Provided template is empty');
        }
        /**@var $twig \Twig\Environment */
        $twig = App::make('twig.environment');
        $this->template = $twig->createTemplate($template);
        return $this;
    }

    public function buildContext($context = [])
    {
        $scriptContext = new ScriptContext();
        $scriptContext->buildContext($context);
        $this->context = $scriptContext->toArray();
        return $this->context;
    }

    public function render($context = [])
    {
        return $this->template->render($this->buildContext($context));
    }

    public static function evalArray($array, $context = [])
    {
        $twigEngine = new TwigEngine();
        return json_decode($twigEngine->compile(json_encode($array))->render($context), true);
    }

    public static function eval($template, $context = [])
    {
        $twigEngine = new TwigEngine();
        return $twigEngine->compile($template)->render($context);
    }

}