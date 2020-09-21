<?php


namespace Demo\Core\Controllers;


use Backend\Behaviors\FormController;
use Backend\Behaviors\ListController;
use Backend\Classes\Controller;
use Backend\Widgets\Lists;
use Demo\Core\Classes\Beans\ApplicationCache;
use Demo\Core\Classes\Beans\SessionCache;
use Demo\Core\Classes\Beans\TwigEngine;
use Demo\Core\Classes\Errors\ListConfigNotFoundException;
use Demo\Core\Classes\Helpers\FormBuilder;
use Demo\Core\Classes\Helpers\PluginConnection;
use Demo\Core\Classes\Ifs\IPluginMiddleware;
use Demo\Core\Classes\Utils\ModelUtil;
use Demo\Core\Classes\Utils\ReflectionUtil;
use Demo\Core\Middlewares\CorePluginMiddlerware;
use Demo\Core\Models\FormAction;
use Demo\Core\Models\JavascriptLibrary;
use Demo\Core\Models\ListAction;
use Demo\Core\Models\ModelModel;
use Demo\Core\Models\Navigation;
use Demo\Core\Models\UniversalModel;
use Demo\Core\Services\QueryFilter;
use Demo\Core\Services\QueryPagination;
use Demo\Core\Services\RestQuery;
use Demo\Tenant\Models\Tenant;
use File;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Request;
use October\Rain\Database\Builder;
use October\Rain\Exception\ApplicationException;
use System\Classes\PluginManager;
use Db;
use Response;
use timgws\QueryBuilderParser;
use View;


class AbstractPluginController extends Controller
{
    use \Backend\Traits\SessionMaker;

    const CONTROLLER_RUN_PARAMS = 'CONTROLLER_RUN_PARAMS';
    static $pluginMiddleware = [];

    protected $modelClass;
    protected $modelRecord;
    /**
     * @var string Layout to use for the view.
     */
    public $layout;


    public function __construct()
    {
        parent::__construct();
        if ($this->listConfig || $this->formConfig) {
            $modelClass = $this->getConfig()->modelClass;
            if (strpos($modelClass, '\\') === 0) { // some model classes starts with \\
                $modelClass = substr($modelClass, 1);
            }
            $this->modelClass = $modelClass;
        }
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

    /**this will inject given library in page**/
    public function addLibrary($code)
    {
        $library = JavascriptLibrary::where('code', $code)->first();
        if (empty($library)) {
            throw new \Exception('No library found with given code' . $code);
        }
        $library->addAssets($this);
    }

    /**Overriding default run method to inject code*/
    public function run($action = null, $params = [])
    {
        $tenant = request()->attributes->get('tenant');
        if (empty($tenant)) {
            $tenant = new Tenant();
            $tenant->code = 'default';
            request()->attributes->set('tenant', $tenant);
        }
        $this->extensionData;
        $pluginMiddleware = $this->getPluginMiddleware();
        foreach ($pluginMiddleware as $mw) {
            $mw->before(request());
        }
        $result = parent::run($action, $params);
        foreach ($pluginMiddleware as $mw) {
            $mw->after(request(), $result);
        }
        /**Storing params in request to process them in future*/
        request()->attributes->set(AbstractPluginController::CONTROLLER_RUN_PARAMS, [
            'action' => $action,
            'params' => $params,
        ]);
        return $result;
    }

    /**
     * Override default list query
     * @param $query \October\Rain\Database\Builder
     * @throws ListConfigNotFoundException
     * @throws \timgws\QBParseException
     */
    public function listExtendQuery($query)
    {
        if (property_exists($this->widget, 'list')) {
            $config = $this->widget->list->config;
            if (property_exists($config, 'filter')) {
                $listFilter = $config->filter;
                if (!empty($listFilter)) {
                    $filterService = new QueryFilter($query, $listFilter);
                    $filterService->applyFilter();
                }
            }
            $urlFilter = Request::input('urlFilter');
            if (!empty($urlFilter)) {
                $urlFilterInstance = new QueryFilter($query, $urlFilter);
                $urlFilterInstance->applyFilter();
            }
        }
    }

    /**
     * Handler for user filter
     */
    public function onUserFilter()
    {
        return $this->widget->list->onRefresh();
    }

    /**This will make list config*/
    protected function makeListConfig($path = null, $definition = null)
    {
        $listController = $this->asExtension('ListController');
        $ListConfig = ReflectionUtil::getPropertyValue(ListController::class, 'listConfig', $listController);
        $listController = $this->asExtension('ListController');
        $requiredConfig = ReflectionUtil::getPropertyValue(ListController::class, 'requiredConfig', $listController);
        $listDefinitions = ReflectionUtil::getPropertyValue(ListController::class, 'listDefinitions', $listController);
        if (empty($path)) {
            $path = $listDefinitions[$definition];
        }
        return $ListConfig[$definition] = $this->makeConfig($path, $requiredConfig);
    }

    public function getRequestedView()
    {
        return Request::input('view');
    }

    public function getRequestedList()
    {
        return Request::input('list');
    }

    public function isViewDefinitionExists($view)
    {
        $controllerDirPath = base_path() . '/plugins/' . strtolower(get_class($this));
        return !empty($view) && File::isDirectory($this->getViewRootDir($view));
    }

    public function getViewRootDir($view)
    {
        $controllerDirPath = base_path() . '/plugins/' . strtolower(get_class($this));
        return $controllerDirPath . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $view;
    }

    /**
     * Returns the configuration used by this behavior.
     * Override ListController listGetConfig to render different list views
     * @param null $definition
     * @return \Backend\Classes\WidgetBase
     * @throws ListConfigNotFoundException
     */
    public function listGetConfig($definition = null)
    {
        $view = $this->getRequestedView();
        $config = $this->listGetViewConfig($view, $definition);
        $list = $this->getRequestedList();
        if (!empty($list)) {
            if (strpos($list, '/') === false) {
                $config->list = str_replace('columns.yaml', $list . '.yaml', $config->list);
            } else {
                $config->list = $list;
            }
        }
        return $config;
    }

    /**
     * This will return the list view provided
     * A view is stored in views directory of the controller. If none provided than default view is returned
     * @param $view string View of the list to be returned.
     * @param null $definition
     * @return array|mixed|\stdClass
     * @throws ListConfigNotFoundException
     */
    public function listGetViewConfig($view, $definition = null)
    {
        $listController = $this->asExtension('ListController');
        $ListConfig = ReflectionUtil::getPropertyValue(ListController::class, 'listConfig', $listController);
        if (!$definition) {
            $definition = ReflectionUtil::getPropertyValue(ListController::class, 'primaryDefinition', $listController);
        }
        if (!empty($view)) {
            $configPath = $this->getConfigPath('views' . DIRECTORY_SEPARATOR . $view . DIRECTORY_SEPARATOR . 'config_list.yaml');
            if (File::isFile($configPath)) {
                $config = $ListConfig[$definition] = $this->makeListConfig($configPath, $definition);
            } else {
                throw new ListConfigNotFoundException('No config found for view ' . $view);
            }
        } else {
            if (!$config = array_get($ListConfig, $definition)) {
                $config = $ListConfig[$definition] = $this->makeListConfig(null, $definition);
            }
        }
        return $config;
    }
    /*protected function loadView($type)
    {
        $view = Request::input('view');
        if (!empty($view)) {
            $config = $this->getConfigPath($view . DIRECTORY_SEPARATOR . 'config_' . $type . '.yaml');
            // $formConfig = $this->getConfigPath($view . DIRECTORY_SEPARATOR . 'config_form.yaml');
            if (File::isFile($config)) {
                if ($type === 'list') {
                    $this->asExtension('ListController')->setConfig($config, ['modelClass', $type]);
                    $config = $this->getConfigPath($view . DIRECTORY_SEPARATOR . 'config_' . $type . '.yaml');
                    $this->asExtension('ReorderController')->setConfig($view . DIRECTORY_SEPARATOR . 'config_reorder.yaml', ['modelClass']);
                }
            } else {
                return false;
            }
//
//            if (File::isFile($formConfig)) {
//                $this->asExtension('FormController')->setConfig($listConfig, ['modelConfig', 'form']);
//            }
        }
        return true;
    }

    public function update($id)
    {
        $this->loadView('form');
        return parent::update($id);
    }

    public function create($id = null)
    {
        $this->loadView('form');
        return parent::create($id);
    }

    public function preview($id = null)
    {
        $this->loadView('form');
        return parent::preview($id);
    }

    public function index()
    {

        if (!$this->loadView('list')) {
            $this->setResponse(Response::make(View::make('backend::404'), 404));
            return '';
        }
        return parent::index();
    }*/

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
     * @param bool $bodyOnly Only make body section of layout
     * @return string
     */
    public function makeView($view, $bodyOnly = false, $controllerParams = [])
    {

        $ajaxCall = Request::input('ajax');
        $partialVars = [];
        if (method_exists($this, $view)) {
            $partialVars = ReflectionUtil::invoke(null, $this, $view, $controllerParams);
        }
        $requestedView = $this->getRequestedView();
        if (!empty($requestedView) && $this->isViewDefinitionExists($requestedView)) {
            $viewPath = $this->getViewRootDir($requestedView) . DIRECTORY_SEPARATOR . strtolower($view) . '.htm';
        } else {
            $viewPath = $this->getViewPath(strtolower($view) . '.htm');
        }
        $contents = $this->makeFileContents($viewPath, $partialVars);
        if ($view === 'create' || $view === 'update' || $view === 'preview') {
            $basePath = $this->getBaseEnginePartial();
            $contents = $this->makePartial($basePath . '/form', [
                'contents' => $contents,
                'view' => $basePath . '/' . $view,
                'context' => $view,
            ]);
        }
        if ($ajaxCall === 'true' || $bodyOnly) {
            $viewContents = $this->makeViewContent($contents, PluginConnection::getThemeBodyPartial());
        } else {
            $viewContents = $this->makeViewContent($contents);
        }
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

    /**
     * @param  $list Lists
     * @return ModelModel
     */
    public function getListModelRecord($list)
    {
        return ModelModel::where('model', get_class($list->model))->first();

    }

    public function getModelRecord()
    {
        if (empty($this->modelRecord)) {
            $this->modelRecord = ModelModel::where('model', $this->modelClass)->first();
        }
        return $this->modelRecord;
    }

    public function onListRender()
    {
        $request = \request();
        $runParams = $request->attributes->get(AbstractPluginController::CONTROLLER_RUN_PARAMS);
        /**@var  $list Lists[] */
        $list = $this->makeLists();
        $restQuery = $request->get('restQuery');
        $restQuery['model'] = $this->getModelClass();
        if (!empty($restQuery)) {
            $list['list']->bindEvent('list.extendQuery', function ($queryBuilder) use ($restQuery) {
                $restQuery = new RestQuery($queryBuilder, $restQuery);
                $restQuery->apply();
            });
        }
        return $this->makeView('index', true, $runParams ? $runParams['params'] : []);
    }

    public function onRender($id)
    {
        if (method_exists($this, 'render')) {
            return $this->render($id);
        }
        if (method_exists($this, 'embed')) {
            return $this->embed($id);
        }
        return null;
    }

    public function onFormRender($recordId = null, $context = 'create')
    {
        if (!empty(Request::input('context'))) {
            $context = Request::input('context');
        }
        if (!empty(Request::input('$recordId'))) {
            $recordId = Request::input('$recordId');
        }
        $modelClass = $this->getModelClass();
        if (empty($recordId)) {
            $model = new $modelClass();
        } else {
            $model = $modelClass::find($recordId);
        }
        $formController = $this->asExtension('FormController');
        $formController->initForm($model, $context);
        return FormBuilder::wrapFormWidget($this, null, $context);
    }


    public function buildForm($formConfig, $context = 'create', $recordId = null, $wrap = 'false')
    {
        if (empty($formConfig)) {
            $this->asExtension('FormController')->{$context}($recordId, $context);
            return $this->asExtension('FormController')->formRender([]);
        }
        $formBuilder = new FormBuilder($this);
        if ($wrap === 'true') {
            $formWidget = $formBuilder->buildFormWidget($formConfig, $recordId, $context);
            return FormBuilder::wrapFormWidget($this, $formWidget, $context);
        } else {
            return $formBuilder->formRender($formConfig, $recordId, $context);
        }
    }

    public function onBuildForm()
    {
        $request = request();
        $wrap = $request->get('wrap', 'false');
        $context = $request->get('context', 'create');
        $recordId = $request->get('recordId');
        $formConfig = $request->get('config', []);
        return $this->buildForm($formConfig, $context, $recordId, $wrap);
    }

    public function viewExtendQuery($modelClass, $query)
    {

    }

    /**
     * This will create a formWidget object of given form which can be rendered inside a partial
     */
    protected function createFormWidget($form, $modelClass, $recordId = 0)
    {
        $config = $this->makeConfig($form);
        $config->alias = 'voucherProduct';
        $config->arrayName = 'VoucherProduct';
        if ($recordId) {
            $config->model = $modelClass::find($recordId);
        } else {
            $config->model = new $modelClass;
        }
        $widget = $this->makeWidget('Backend\Widgets\Form', $config);
        $widget->bindToController();
        return $widget;
    }

    public function getNavigations()
    {
        // return SessionCache::instance()->get('NAVIGATION', function () {
        $query = Navigation::where([
            'active' => true,
        ])->orderBy('sort_order', 'ASC');
        $this->viewExtendQuery(Navigation::class, $query);
        $navigations = $query->get()->map(function ($navigation) {
            return ModelUtil::toPojo($navigation, ['model_ref'], [
                'generated_url' => Navigation::getUrl($navigation),
                'children' => null,
            ]);
        });
        $parentRefs = [];
        foreach ($navigations as $navigation) {
            $parentRefs[$navigation->id] = $navigation;
        }
        foreach ($navigations as $navigation) {
            if (!empty($navigation->parent_id) && array_key_exists($navigation->parent_id, $parentRefs)) {
                $parent = $parentRefs[$navigation->parent_id];
                if (empty($parent->children)) {
                    $parent->children = new Collection();
                }
                $parent->children->push($navigation);
            }
        }
        $parents = $navigations->filter(function ($navigation) {
            return empty($navigation->parent_id);
        });
        return ModelUtil::sortForest($parents);
        // });
    }

    public function getListActions()
    {
        $listConfig = $this->listGetConfig();
        $modelClass = $this->modelClass;
        // return SessionCache::instance()->get($modelClass . '-ListActions-' . $listConfig->list, function () use ($listConfig, $modelClass) {
        $query = Db::table('demo_core_list_actions')->where([
            'demo_core_list_actions.active' => true,
        ])->where(function ($query) use ($listConfig) {
            $query->where('demo_core_list_actions.list', $listConfig->list)
                ->orWhere('demo_core_list_actions.list', null)
                ->orWhere('demo_core_list_actions.list', '');
        })->where(function ($query) use ($modelClass) {
            $query->where('demo_core_list_actions.model', $modelClass)
                ->orWhere('demo_core_list_actions.model', UniversalModel::class);
        })->orderBy('demo_core_list_actions.sort_order', 'ASC');
        $this->viewExtendQuery(ListAction::class, $query);
        $result = $query->get();
        return $result;
        // });
    }

    public function getFormActions($context = 'create')
    {
        $modelClass = $this->modelClass;
        $formController = $this->extensionData['extensions']['Backend\Behaviors\FormController'];
        $formConfig = $formController->getConfig();
        /*return SessionCache::instance()->get($modelClass . '-FormActions-' . $formConfig->form, function () use ($formConfig, $modelClass, $context) {*/
        $query = Db::table('demo_core_form_actions')->where([
            'demo_core_form_actions.active' => true
        ])->where(function ($query) use ($formConfig) {
            $query->where('demo_core_form_actions.form', $formConfig->form)
                ->orWhere('demo_core_form_actions.form', null)
                ->orWhere('demo_core_form_actions.form', '');
        })->where(function ($query) use ($modelClass) {
            $query->where('demo_core_form_actions.model', $modelClass)
                ->orWhere('demo_core_form_actions.model', UniversalModel::class);
        })->where('demo_core_form_actions.context', 'iLike', '%' . $context . '%')->orderBy('demo_core_form_actions.sort_order', 'ASC');
        $this->viewExtendQuery(FormAction::class, $query);
        $result = $query->get();
        return $result;
        /*});*/
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

    public function onReadRecordExtendQuery($query)
    {
        return $query;
    }

    public function onRecordBeforeCreate($models)
    {
        return $models;
    }

    public function onRecordBeforeUpdate($model)
    {
        return $model;
    }

    public function onRecordBeforeDelete($model)
    {
        return $model;
    }

    /**
     * Object API Definition start
     */
    public function onGetModelDefinition()
    {
        $model = Request::input('model');
        if (empty($model)) {
            $model = $this->modelClass;
        }
        $modelRecord = new ModelModel();
        $modelRecord->model = $model;
        return ['definition' => $modelRecord->getDefinition()];
    }

    public function onReadRecord($id)
    {
        $request = request();
        if (empty($id)) {
            $id = $request->request->get('id');
        }
        if (is_array($id)) {
            $query = $this->modelClass::whereIn('id', $id);
            $this->onReadRecordExtendQuery($query);
            $models = $query->get();
            if ($models->count() === 0) {
                $this->setResponse('No record found with ids ' . json_encode($id), 404);
                return;
            }
            return $models;
        }
        $query = $this->modelClass::where('id', $id);
        $this->onReadRecordExtendQuery($query);
        $model = $query->get();
        if (empty($model)) {
            $this->setResponse('No record found with id ' . $id, 404);
            return;
        }
        return $model;
    }

    /**
     * Object API Definition start
     */
    public function onCreateRecord()
    {
        $request = request();
        $data = $request->request->get('data');
        $results = [];
        if (is_array($data) && !empty($data)) {
            $models = array_map(function ($record) {
                $model = new $this->modelClass;
                $model->attributes = $record;
                return $model;
            }, $data);
            $this->onRecordBeforeCreate($models);
            foreach ($models as $model) {
                $model->save();
            }
            return $models;
        } else {
            $this->setResponse('Invalid payload data, payload must be a non empty array', 400);
        }

    }

    /**
     * Object API Definition start
     */
    public function onUpdateRecord($id = '')
    {
        $request = request();
        if (empty($id)) {
            $id = $request->request->get('id');
        }
        $data = $request->request->get('data');
        $model = $this->modelClass::where('id', $id)->first();
        if (empty($model)) {
            $this->setResponse('No record found with id ' . $id, 404);
            return;
        }
        $this->onRecordBeforeUpdate($model);
        foreach ($data as $key => $val) {
            $model->{$key} = $val;
        }
        $model->save();
        return $model;
    }

    /**
     * Object API Definition start
     */
    public function onDeleteRecord($id)
    {
        $request = request();
        if (empty($id)) {
            $id = $request->request->get('id');
        }
        $model = $this->modelClass::where('id', $id)->first();
        if (empty($model)) {
            $this->setResponse('No record found with id ' . $id, 404);
            return;
        }
        $this->onRecordBeforeDelete($model);
        $model->delete();
        return $model;
    }

    public function queryDataExtendQuery($query)
    {
        return $query;
    }

    public function onQueryData()
    {
        $table = Request::input('table');
        $pagination = Request::input('pagination');
        if (!empty($pagination)) {
            $pagination = ['offset' => 0];
        }
        $modelClass = Request::input('model');
        $filter = Request::input('where');
        $attributes = Request::input('attributes');
        $query = QueryFilter::getQuery([
            'table' => $table,
            'model' => $modelClass,
            'filter' => $filter,
            'attributes' => $attributes,
            'pagination' => new QueryPagination($pagination),
        ]);
        $this->queryDataExtendQuery($query);
        return $query->get();
    }
}