<?php


namespace Demo\Core\Classes\Utils;


use Backend\Classes\BackendController;

class ReflectionUtil
{

    public static function getPropertyValue($class, $property, $instance)
    {
        $r = new \ReflectionProperty($class, $property);
        $r->setAccessible(true);
        return $r->getValue($instance);
    }

    public static function setPropertyValue($class, $instance, $property, $value)
    {
        $r = new \ReflectionProperty($class, $property);
        $r->setAccessible(true);
        $r->setValue($instance, $value);
    }
}