<?php


namespace Demo\Core\Controllers;


use Backend\Classes\Controller;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Classes\Ifs\IPluginMiddleware;
use Demo\Core\Middlewares\CorePluginMiddlerware;
use Demo\Core\Models\FormAction;
use Demo\Core\Models\ListAction;
use Demo\Core\Models\ModelModel;
use Demo\Core\Models\UniversalModel;
use System\Classes\PluginManager;

class AbstractPluginController extends Controller
{
    use \Backend\Traits\SessionMaker;

    static $pluginMiddleware = [];

    protected $modelClass;
    /**
     * @var string Layout to use for the view.
     */
    public $layout;


    public function __construct()
    {
        parent::__construct();
        $this->modelClass = $this->getConfig()->modelClass;
        /*$this->layout = plugins_path() . DIRECTORY_SEPARATOR .
            'demo' . DIRECTORY_SEPARATOR .
            'core' . DIRECTORY_SEPARATOR .
            'layouts' . DIRECTORY_SEPARATOR .
            'enginelayout';*/
    }

    public function getModelClass()
    {
        return $this->modelClass;
    }

    /**Overriding default run method to inject code*/
    public function run($action = null, $params = [])
    {
        $this->extensionData;
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

    public function getBaseEnginePartial($partial = null)
    {
        $enginePlugin = PluginConnection::getConnection('Demo.Core');
        $basePath = $enginePlugin->getPluginPath() . DIRECTORY_SEPARATOR .
            'controllers' . DIRECTORY_SEPARATOR .
            'baseenginecontroller';
        if ($partial) {
            return $basePath . DIRECTORY_SEPARATOR . $partial;
        }
        return $basePath;
    }

    /**
     * Hijacking makeView of controller to provide custom partials
     * Loads a view with the name specified. Applies layout if its name is provided by the parent object.
     * The view file must be situated in the views directory, and has the extension "htm".
     * @param string $view Specifies the view name, without extension. Eg: "index".
     * @return string
     */
    public function makeView($view)
    {
        $viewPath = $this->getViewPath(strtolower($view) . '.htm');
        $contents = $this->makeFileContents($viewPath);
        if ($view === 'create' || $view === 'update' || $view === 'preview') {
            $basePath = $this->getBaseEnginePartial();
            $contents = $this->makePartial($basePath . '/form', [
                'contents' => $contents,
                'view' => $basePath . '/' . $view,
                'context' => $view,
            ]);
        }
        $viewContents = $this->makeViewContent($contents);
        return $viewContents;
    }

    /**
     * Hijacking makePartial of controller to provide custom partials
     * Render a partial file contents located in the views folder.
     * @param string $partial The view to load.
     * @param array $params Parameter variables to pass to the view.
     * @param bool $throwException Throw an exception if the partial is not found.
     * @return mixed Partial contents or false if not throwing an exception.
     */
    public function makePartial($partial, $params = [], $throwException = true)
    {
        if ($partial === 'list_container') {
            $partial = $this->getBaseEnginePartial($partial);
        }
        $partialContent = parent::makePartial($partial, $params, $throwException);
        return $partialContent;
    }

    public function getModelRecord()
    {
        $config = $this->getConfig();
        if (empty($config->modelRecord)) {
            $modelClass = $config->modelClass;
            $config->modelRecord = ModelModel::where('model', $modelClass)->first();
        }

        return $config->modelRecord;
    }

    public function getListActions()
    {
        $modelClass = $this->modelClass;
        $listConfig = $this->listGetConfig();
        return ListAction::where([
            'active' => true,
        ])->where(function ($query) use ($listConfig) {
            $query->where('list', $listConfig->list)
                ->orWhere('list', null)
                ->orWhere('list', '');
        })->where(function ($query) use ($modelClass) {
            $query->where('model', $modelClass)
                ->orWhere('model', UniversalModel::class);
        })->orderBy('sort_order', 'ASC')->get();
    }

    public function getFormActions($context = 'create')
    {
        $modelClass = $this->modelClass;
        $formController = $this->extensionData['extensions']['Backend\Behaviors\FormController'];
        $formConfig = $formController->getConfig();
        return FormAction::where([
            'active' => true
        ])->where(function ($query) use ($formConfig) {
            $query->where('form', $formConfig->form)
                ->orWhere('form', null)
                ->orWhere('form', '');
        })->where(function ($query) use ($modelClass) {
            $query->where('model', $modelClass)
                ->orWhere('model', UniversalModel::class);
        })->where('context', 'iLike', '%' . $context . '%')->orderBy('sort_order', 'ASC')->get();
    }

    public function getControllerInfo()
    {
        return [
            'userId' => $this->user->id,
            'action' => $this->action,
            'class' => get_class($this),
            'modelClass' => $this->getConfig()->modelClass,
        ];
    }

    /**
     * Handling filter provided in url
     */
    public function listFilterExtendScopes($filter)
    {
        $request = request();
        $filterParams = $request->get('filter');
        if (!empty($filterParams)) {
            foreach ($filterParams as $key => $value) {
                $filter->setScopeValue($filter->getScope($key), $value);
            }
        }
    }

    /**
     * Object API Definition start
     */
    public function onRead($id)
    {
        if (is_array($id)) {
            $models = $this->modelClass::whereIn('id', $id)->get();
            if ($models->count() === 0) {
                $this->setResponse('No record found with ids ' . json_encode($id), 404);
                return;
            }
            return $models;
        }
        $model = $this->modelClass::where('id', $id)->first();
        if (empty($model)) {
            $this->setResponse('No record found with id ' . $id, 404);
            return;
        }
        return $model;
    }

    /**
     * Object API Definition start
     */
    public function onCreate($data)
    {
        return $this->modelClass::insert($data);
    }

    /**
     * Object API Definition start
     */
    public function onUpdate($id, $data)
    {
        $model = $this->modelClass::where('id', $id)->first();
        if (empty($model)) {
            $this->setResponse('No record found with id ' . $id, 404);
            return;
        }
        foreach ($data as $key => $val) {
            $model->{$key} = $val;
        }
        $model->save();
        return $model;
    }

    /**
     * Object API Definition start
     */
    public function onDelete($id)
    {
        $model = $this->modelClass::where('id', $id)->first();
        if (empty($model)) {
            $this->setResponse('No record found with id ' . $id, 404);
            return;
        }
        $model->delete();
        return $model;
    }
}