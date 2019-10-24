<?php

/**
 * This will allow user to connect to another plugin from one plugin
 */
class PluginConnection
{
    /**
     * The plugin code/namespace ,e.g. Demo.Core
     */
    protected $identifier;

    /**
     * The PluginManager instance, allow to perform operation using plugin manager
     * @var $pluginManager \System\Classes\PluginManager
     */
    protected $pluginManager;

    public function __construct(string $identifier)
    {
        $this->identifier = $identifier;
        $this->pluginManager = \System\Classes\PluginManager::instance();
    }

    public static function loadClass($path)
    {
        require_once $path;
    }

    /**
     * This will return the root directory of a plugin
     * .e.g. directory path till core folder in case of Demo.Core plugin
     * @return string
     */
    public function getPluginPath()
    {
        return $this->pluginManager->getPluginPath($this->identifier);
    }

    public function exists()
    {
        return $this->pluginManager->exists($this->identifier);
    }

    /**
     * Will return the model class after loading it in memory with namespace as string
     * @param $type string The type of class or path from the root directory you want to load ,eg Models,Controllers etc.
     * @param $className string Name of the class
     * @return string Class with full namespace after loading it.
     * @throws \October\Rain\Database\Attach\FileException
     */
    public function getClass(string $type = 'Classes', string $className)
    {
        $path = $this->pluginManager->getPluginPath($this->identifier) . 'models' . $className . '.php';
        if (!file_exists($path)) {
            throw new \October\Rain\Database\Attach\FileException('File not found at path ' . $path);
        }
        PluginConnection::loadClass($path);
        return str_replace('\\Plugin', '\\' . $type . '\\' . $className, $this->pluginManager->findByIdentifier($this->identifier));
    }

    /**
     * Will return the service instance in a plugin
     * @throws \October\Rain\Database\Attach\FileException
     */
    public function getService(string $name)
    {
        return $this->getClass('Services', $name)::instance();
    }

    /**
     * Will return the Model in a plugin
     * @throws \October\Rain\Database\Attach\FileException
     */
    public function getModel(string $name)
    {
        return $this->getClass('Models', $name);
    }

    /**
     * Will return the Controller in a plugin
     * @throws \October\Rain\Database\Attach\FileException
     */
    public function getController(string $name)
    {
        return $this->getClass('Controllers', $name);
    }

    /**
     * Will return the EventHandler in a plugin
     * @throws \October\Rain\Database\Attach\FileException
     */
    public function getEventHandler(string $name)
    {
        return $this->getClass('EventHandlers', $name);
    }

}