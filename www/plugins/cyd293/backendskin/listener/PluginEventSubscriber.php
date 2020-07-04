<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Cyd293\BackendSkin\Listener;

use Backend\Classes\NavigationManager;
use Backend\Classes\Skin as AbstractSkin;
use Demo\Core\Classes\Utils\ReflectionUtil;
use Demo\Core\Services\SwooleServiceProvider;
use October\Rain\Events\Dispatcher;
use October\Rain\Parse\Yaml;

/**
 * Description of PluginEventSubscriber
 *
 * @author Cydrick Nonog <cydrick.dev@gmail.com>
 */
class PluginEventSubscriber
{
    public function onPageBeforeDisplay(
        \Backend\Classes\Controller $controller,
        $action,
        array $params = []
    )
    {
        $origViewPath = $controller->guessViewPath();
        $newViewPath = str_replace(base_path(), '', $origViewPath);
        $newViewPath = $this->getActiveSkin()->skinPath . '/views/' . $newViewPath;
        SwooleServiceProvider::getLogger()->debug('Theme:: Setting new view path ,original = ' . $origViewPath . ' new  = ' . $newViewPath);
        $controller->addViewPath([$newViewPath]);
    }


    public function onExtendMenu(NavigationManager $navigationManager)
    {
        $menuYmlPath = $this->getActiveSkin()->skinPath . '/config/menu.yml';
        if (file_exists($menuYmlPath)) {
            $yamlParser = new Yaml();
            $extensionMenus = $yamlParser->parseFile($menuYmlPath);
            foreach ($extensionMenus as $context => $definitions) {

                foreach ($definitions as $menuName => $menu) {
                    $sideMenus = array_get($menu, 'sideMenu', []);
                    array_pull($menu, 'sideMenu');
                    $navigationManager->addMainMenuItem($context, $menuName, $menu);
                    $navigationManager->addSideMenuItems($context, $menuName, $sideMenus);
                }
            }
        }
    }

    public function subscribe($events)
    {
        SwooleServiceProvider::getLogger()->debug('Event object app level hash '.spl_object_hash($events));
        SwooleServiceProvider::getLogger()->debug('Event object app level hash '.spl_object_hash($events));
        $events->listen('backend.page.beforeDisplay', [$this, 'onPageBeforeDisplay']);
        $events->listen('backend.menu.extendItems', [$this, 'onExtendMenu']);
        SwooleServiceProvider::getLogger()->debug('Theme Listeners ' . json_encode(ReflectionUtil::getPropertyValue(Dispatcher::class,'listeners',$events)));
    }

    /**
     * @return AbstractSkin
     */
    private function getActiveSkin()
    {
        return AbstractSkin::getActive();
    }
}
