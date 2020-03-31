<?php


namespace Demo\Core\Classes\Beans;


use Backend\Classes\Controller;
use Demo\Core\Classes\Ifs\IPluginMiddleware;
use Demo\Core\Middlewares\CorePluginMiddlerware;
use System\Classes\PluginManager;

class AbstractPluginController extends Controller
{
    static $pluginMiddleware = [];

    public function __construct()
    {
        parent::__construct();
    }

    /**Overriding default run method to inject code*/
    public function run($action = null, $params = [])
    {
        $pluginMiddleware = $this->getPluginMiddleware();
        foreach ($pluginMiddleware as $mw) {
            $mw->before(request());
        }
        $result = parent::run($action, $params);
        foreach ($pluginMiddleware as $mw) {
            $mw->after(request(), $result);
        }
        return $result;
    }

    /**@return IPluginMiddleware[] */
    public function getPluginMiddleware()
    {
        if (count(static::$pluginMiddleware) === 0) {
            foreach (PluginManager::instance()->getPlugins() as $plugin) {
                if (method_exists($plugin, 'getPluginMiddleware')) {
                    $pluginMiddleware = $plugin->getPluginMiddleware();
                    foreach ($pluginMiddleware as $mw) {
                        $instance = new $mw();
                        static::$pluginMiddleware[] = $instance;
                    }
                }
            }
        }
        return static::$pluginMiddleware;
    }
}