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

    public function getReadPermission($modelClass)
    {
        return $this->getPermissionPrefix($modelClass) . '.row.read';
    }

    public function getWritePermission($model)
    {
        return $this->getPermissionPrefix($model) . '.row.write';
    }

    public function getCreatePermission($model)
    {
        return $this->getPermissionPrefix($model) . '.row.create';
    }

    public function getDeletePermission($model)
    {
        return $this->getPermissionPrefix($model) . '.row.delete';
    }
}