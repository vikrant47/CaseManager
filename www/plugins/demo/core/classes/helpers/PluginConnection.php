<?php namespace Demo\Core\Classes\Helpers;

use Demo\Core\Classes\Utils\StringUtil;
use File;
use October\Rain\Exception\ApplicationException;
use System\Classes\PluginBase;
use System\Classes\PluginManager;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Illuminate\Support\Str;

/**
 * This will allow user to connect to another plugin from one plugin
 */
class PluginConnection
{
    public static $LOGGERS = [];
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
     * This will return the list of all the views for a given controller
     * @param $view string - Type  of view can be 'views'
     * @return array of views
     */
    public static function getControllerConfigAlias(string $view, string $controllerClass, $controllerName = null, $extension = '.htm')
    {
        if (empty($controllerName)) {
            $controllerName = substr($controllerClass, strripos($controllerClass, '\\') + 1);
        }
        $views = [];
        $controllerDirPath = base_path() . '/plugins/' . strtolower($controllerClass);
        if (file_exists($controllerDirPath)) {
            $formFiles = scandir($controllerDirPath);
            foreach ($formFiles as $file) {
                if (Str::endsWith($file, $view)) {
                    $subDir = scandir($controllerDirPath . DIRECTORY_SEPARATOR . $file);
                    foreach ($subDir as $dir) {
                        if ($dir !== '.' && $dir !== '..')
                            $views[$dir] = $dir;
                    }
                    break;
                }
            }
        }
        return $views;
    }

    /**
     * This will return the list of all the views for a given model
     * @param $view string - Type  of view can be 'forms' or 'lists'
     * @return array of views
     */
    public static function getViewAlias(string $view, string $modelClass, $modelName = null, $extension = '.yaml')
    {
        if (empty($modelName)) {
            $modelName = substr($modelClass, strripos($modelClass, '\\') + 1);
        }
        $views = [];
        $modelDirPath = base_path() . '/plugins/' . strtolower($modelClass);
        if (file_exists($modelDirPath)) {
            $formFiles = scandir($modelDirPath);
            foreach ($formFiles as $file) {
                if (strpos($file, $view) > -1) {
                    $views['$/' . str_replace('\\', '/', strtolower($modelClass)) . '/' . $file] = str_replace($extension, '', $file) . ' - ' . $modelName . '';
                }
            }
        }
        return $views;
    }

    public static function getAllModelsViewsAlias(string $view)
    {
        $forms = [];
        $modelAlias = PluginConnection::getAllModelAlias();
        foreach ($modelAlias as $modelClass => $modelNames) {
            $modelDirPath = base_path() . '/plugins/' . strtolower($modelClass);
            $forms = array_merge($forms, PluginConnection::getViewAlias($view, $modelClass, $modelNames));
        }
        return $forms;
    }

    public static function getFormsAlias($modelClass, $modelName = null)
    {
        return self::getViewAlias('fields', $modelClass, $modelName);
    }

    public static function getAllFormsAlias()
    {
        return self::getAllModelsViewsAlias('fields');
    }

    public static function getListsAlias($modelClass, $modelName = null)
    {
        return self::getViewAlias('columns', $modelClass, $modelName);
    }

    public static function getControllerViewsAlias($controllerClass, $modelName = null)
    {
        $views = self::getControllerConfigAlias('views', $controllerClass, $modelName);
        $views[''] = 'Default';
        return $views;
    }

    public static function getAllListsAlias()
    {
        return self::getAllModelsViewsAlias('columns');
    }

    /**
     * Return all model alias
     * @Depricated use getModelsAsOptions of ModelModel class
     */
    public static function getAllModelAlias($INCLUDE_UNIVERSAL = false)
    {
        $mappedAlias = [];
        /**@var $plugin PluginBase */
        foreach (PluginManager::instance()->getPlugins() as $plugin) {
            try {
                $config = PluginConnection::getPluginConfigurations($plugin);
                $package = str_replace('\\Plugin', '', get_class($plugin));
                $modelAlias = array_get($config, 'model-alias', []);
                foreach ($modelAlias as $key => $value) {
                    $mappedAlias[$package . '\\Models\\' . $key] = $value;
                }
            } catch (\Exception $exception) {
                // throw $exception;
            }
        }
        if ($INCLUDE_UNIVERSAL) {
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
     * Will return the seed path inside plugin
     * @return string Path of the seed folder
     */
    function getSeedsPath()
    {
        return $this->pluginManager->getPluginPath($this->identifier) . DIRECTORY_SEPARATOR . 'seeds';
    }

    /**
     * Will return the template inside plugin
     * @param $fileName string Name of the template file
     * @return string Class with full namespace after loading it.
     * @throws \October\Rain\Database\Attach\FileException
     */
    public function getTemplate(string $fileName)
    {
        $path = $this->pluginManager->getPluginPath($this->identifier) . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . $fileName;
        return File::get($path);
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

    public function getPluginLogger(): Logger
    {
        return PluginConnection::getCurrentLogger();
    }

    /**
     * Returns current plugin connection
     * @return PluginConnection
     */
    public static function getCurrentConnection()
    {
        $request = request();
        $identifier = $request->request->get('CURRENT_PLUGIN');
        if (empty($identifier)) {
            return null;
        }
        return PluginConnection::getConnection($identifier);
    }

    public static function getCurrentPluginIdentifier()
    {
        $request = request();
        return $identifier = $request->request->get('CURRENT_PLUGIN');
    }

    public static function getCurrentLogger()
    {
        $identifier = self::getCurrentPluginIdentifier();
        if (empty($identifier)) {
            $identifier = 'demo.core';
        }
        return static::getLogger($identifier);
    }

    /**
     * Crete new logger with given plugin identifier and return
     */
    public static function getLogger(string $identifier): Logger
    {
        $identifier = strtolower(trim($identifier));
        if (empty(PluginConnection::$LOGGERS[$identifier])) {
            $logger = new Logger($identifier);
            $logger->pushHandler(new StreamHandler(storage_path('logs/' . $identifier . '.log')), Logger::INFO);
            PluginConnection::$LOGGERS[$identifier] = $logger;
        }
        return PluginConnection::$LOGGERS[$identifier];
    }


    public static function getConnection(string $identifier): PluginConnection
    {
        return new PluginConnection($identifier);
    }

    public static function getEnv($key = null)
    {
        if (empty($key)) {
            return array_merge([], $_ENV, self::getEnv());
        }
        if (array_key_exists($key, $_ENV)) {
            return $_ENV[$key];
        }
        return getenv($key);
    }

    public static function reloadModels()
    {
        // Get all models in the Model directory
        $models_dir = dirname(__DIR__) . '/models';
        $files = \File::files($models_dir);

        // Exclude non *.php files
        foreach ($files as $i => $file) if (!strpos($file, '.php')) {
            unset($files[$i]);
        }

        // Remove the directory name and the .php from the filename
        $files = str_replace($models_dir . '/', '', $files);
        $files = str_replace('.php', '', $files);

        // Remove "BaseModel" as we dont want to boot that moodel
        $key = array_search('BaseModel', $files);
        if ($key !== false) {
            unset($files[$key]);
        }

        // Reset each model event listeners
        foreach ($files as $model) {
            if (!method_exists($model, 'flushEventListeners')) {
                continue;
            }

            // Flush any existing listeners
            call_user_func(array($model, 'flushEventListeners'));

            // Re-register them
            call_user_func(array($model, 'boot'));
        }
    }

    public static function getPluginCodeFromClass($class)
    {
        $classPrefix = str_replace('\\', '.', $class);
        $pluginPos = StringUtil::strposX($classPrefix, '.', 2);
        return substr($classPrefix, 0, $pluginPos);
    }
}