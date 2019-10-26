<?php namespace Demo\Core\Classes\Helpers;

use System\Classes\PluginBase;
use System\Classes\PluginManager;

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
     * The plugin instance for given identifier
     * @var PluginBase
     */

    protected $plugin;

    /**
     * The PluginManager instance, allow to perform operation using plugin manager
     * @var $pluginManager \System\Classes\PluginManager
     */

    protected $pluginManager;

    public function __construct(string $identifier)
    {
        $this->identifier = $identifier;
        $this->pluginManager = \System\Classes\PluginManager::instance();
        $this->plugin = $this->pluginManager->findByIdentifier($this->identifier);
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

    /**Returns plugin package*/
    public function getPluginPackage()
    {
        $pluginId = explode('.', $this->identifier);
        return $pluginId[0] . '\\' . $pluginId[1];
    }

    /**
     * Return plugin config i.e. plugin.yml
     */
    public static function getPluginConfigurations(PluginBase $plugin)
    {
        $method = new \ReflectionMethod(get_class($plugin), 'getConfigurationFromYaml');
        $method->setAccessible(true);
        $configurations = $method->invoke($plugin, "Invalid plugin path");
        return $configurations;
    }

    /**
     * Return all model alias
     */
    public static function getAllModelAlias($INCLUDE_ANY = false)
    {
        $mappedAlias = [];
        /**@var $plugin PluginBase */
        foreach (PluginManager::instance()->getPlugins() as $plugin) {
            try {
                $config = PluginConnection::getPluginConfigurations($plugin);
                $package = str_replace('Plugin\\', '', get_class($plugin));
                $modelAlias = array_get($config, 'model-alias', []);
                foreach ($modelAlias as $key => $value) {
                    $mappedAlias[$package . '\\Models\\' . $key] = $value;
                }
            } catch (\Exception $exception) {

            }
        }
        if($INCLUDE_ANY){
            $mappedAlias['universal'] = 'Universal';
        }
        return $mappedAlias;
    }

    /**
     * Return Model name with alias
     */
    public function getModelAlias()
    {
        $package = $this->getPluginPackage();
        $config = PluginConnection::getPluginConfigurations($this->plugin);
        $modelAlias = array_get($config, 'model-alias', []);
        $mappedAlias = [];
        foreach ($modelAlias as $key => $value) {
            $mappedAlias[$package . '\\Models\\' . $key] = $value;
        }
        return $mappedAlias;
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
        $path = $this->pluginManager->getPluginPath($this->identifier)
            . DIRECTORY_SEPARATOR
            . strtolower($type)
            . DIRECTORY_SEPARATOR
            . $className . '.php';
        if (!file_exists($path)) {
            throw new \October\Rain\Database\Attach\FileException('File not found at path ' . $path);
        }
        PluginConnection::loadClass($path);
        return $this->getPluginPackage() . '\\' . $type . '\\' . $className;
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