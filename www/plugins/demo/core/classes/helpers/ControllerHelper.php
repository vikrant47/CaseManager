<?php


namespace Demo\Core\Classes\Helpers;


use Backend\Classes\BackendController;
use Backend\Facades\Backend;
use Demo\Core\Classes\Utils\ReflectionUtil;
use Demo\Core\Controllers\NavigationController;

class ControllerHelper
{
    public static function getCurrentRequest()
    {
        return request();
    }

    public static function getCurrentController()
    {
        $backendController = ControllerHelper::getBackendController();
        return ReflectionUtil::getPropertyValue(BackendController::class, 'requestedController', $backendController);
    }

    public static function getBackendController()
    {
        return request()->route()->controller;
    }

    public static function generateUrl($controllerType)
    {
        return $index = Backend::url(str_replace('\\', '/', strtolower(str_replace('\\Controllers', '', $controllerType))));
    }
}