<?php


namespace Demo\Core\Services;


use Demo\Core\Classes\Utils\StringUtil;

class SecurityService
{
    /**
     * This will return permission prefix
     * eg. getPermissionPrefix($modelModel) will return demo.core::models.model
     */
    public function getPermissionPrefix($modelClass)
    {
        $permissionPrefix = strtolower(str_replace('\\', '.', $modelClass));
        $pluginPos = StringUtil::strposX($permissionPrefix, '.', 2);
        return substr($permissionPrefix, 0, $pluginPos) . '::' . substr($permissionPrefix, $pluginPos + 1);
    }

    public function getReadPermission($modelClass, $level = 'row')
    {
        return $this->getPermissionPrefix($modelClass) . '.' . $level . '.read';
    }

    public function getWritePermission($model, $level = 'row')
    {
        return $this->getPermissionPrefix($model) . '.' . $level . '.write';
    }

    public function getCreatePermission($model, $level = 'row')
    {
        return $this->getPermissionPrefix($model) . '.' . $level . '.create';
    }

    public function getDeletePermission($model, $level = 'row')
    {
        return $this->getPermissionPrefix($model) . '.' . $level . '.delete';
    }
}