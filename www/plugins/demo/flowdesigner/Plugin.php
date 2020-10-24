<?php namespace Demo\FlowDesigner;

use Demo\Core\FormWidgets\FlowDesigner;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerFormWidgets()
    {
        return [
            FlowDesigner::class => ['code' => 'flowdesigner', 'Label' => 'Flow Designer'],
        ];
    }

    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }
}
