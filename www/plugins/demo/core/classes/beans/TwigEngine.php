<?php


namespace Demo\Core\Classes\Beans;

use BackendAuth;
use October\Rain\Exception\ApplicationException;

class TwigEngine
{
    /**@var \Twig\Environment */
    private $twig;
    private $context = [];

    public function compile($template): self
    {
        if(empty($template)){
            throw new \Exception('Provided template is emmpty');
        }
        $loader = new \Twig\Loader\ArrayLoader([
            'index.html' => $template,
        ]);
        $this->twig = new \Twig\Environment($loader);
        return $this;
    }

    public function buildContext($context = [])
    {
        $this->context['user'] = BackendAuth::getUser();
        return array_merge($this->context, $context);
    }

    public function render($context = [])
    {
        return $this->twig->render('index.html', $this->buildContext($context));
    }
}