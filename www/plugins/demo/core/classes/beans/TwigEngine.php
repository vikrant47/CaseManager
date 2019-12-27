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

    public function compile($template): self
    {
        if (empty($template)) {
            throw new \Exception('Provided template is emmpty');
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

    public function evalArray($array, $context = [])
    {
        return json_decode($this->compile(json_encode($array))->render($context), true);
    }
}