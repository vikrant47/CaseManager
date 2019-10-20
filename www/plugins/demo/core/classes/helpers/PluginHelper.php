<?php

namespace Demo\Core\Classes\Helpers;

use ReflectionClass;
class PluginHelper
{
    public function getCorePluginRootDirectory()
    {
        $reflection = new ReflectionClass(get_class($this));
        $filePath = dirname($reflection->getFileName());
        return substr($filePath, 0, strpos($filePath, 'classes'));
    }
}