<?php


namespace Demo\Core\Classes\Helpers;


use Backend\Behaviors\FormController;
use Demo\Core\Classes\Utils\ModelUtil;
use Demo\Core\Classes\Utils\ReflectionUtil;
use Demo\Core\Controllers\AbstractPluginController;
use Exception;
use Lang;
use October\Rain\Exception\ApplicationException;

class FormBuilder
{
    /**
     * @var $controller AbstractPluginController
     */
    protected $controller;

    /**
     * FormBuilder constructor.
     * @param $controller
     */
    public function __construct($controller)
    {
        $this->controller = $controller;
    }

    /**
     * Initialize the form configuration against a model and context value.
     * This will process the configuration found in the `$formConfig` property
     * and prepare the Form widget, which is the underlying tool used for
     * actually rendering the form. The model used by this form is passed
     * to this behavior via this method as the first argument.
     * @param October\Rain\Database\Model $model
     * @param array $formFields Each page can supply a unique form definition, if desired
     * @param string $context Form context
     * @return \Backend\Widgets\Form
     * @see Backend\Widgets\Form
     */
    public function initFormWidget($model, $config, $context = 'create', $bindEvents = false)
    {
        if (is_array($config)) {
            $config = ModelUtil::toStdClassObject($config);
        }
        $config->model = $model;
        $config->arrayName = class_basename($model);
        $config->context = $context;

        /*
         * Form Widget with extensibility
         */
        $formWidget = $this->controller->makeWidget('Backend\Widgets\Form', $config);

        // Setup the default preview mode on form initialization if the context is preview
        if ($config->context === 'preview') {
            $formWidget->previewMode = true;
        }
        if ($bindEvents) {
            $formWidget->bindEvent('form.extendFieldsBefore', function () use ($formWidget) {
                $this->controller->formExtendFieldsBefore($formWidget);
            });

            $formWidget->bindEvent('form.extendFields', function ($fields) use ($formWidget) {
                $this->controller->formExtendFields($formWidget, $fields);
            });

            $formWidget->bindEvent('form.beforeRefresh', function ($holder) use ($formWidget) {
                $result = $this->controller->formExtendRefreshData($formWidget, $holder->data);
                if (is_array($result)) {
                    $holder->data = $result;
                }
            });

            $formWidget->bindEvent('form.refreshFields', function ($fields) use ($formWidget) {
                return $this->controller->formExtendRefreshFields($formWidget, $fields);
            });

            $formWidget->bindEvent('form.refresh', function ($result) use ($formWidget) {
                return $this->controller->formExtendRefreshResults($formWidget, $result);
            });
        }
        $formWidget->bindToController();

        /*
         * Detected Relation controller behavior
         */
        if ($this->controller->isClassExtendedWith('Backend.Behaviors.RelationController')) {
            $this->controller->initRelation($model);
        }

        $this->prepareVars($model, $context);
//        $this->controller->setModel($model);
        return $formWidget;
    }

    /**
     * Prepares commonly used view data.
     * @param October\Rain\Database\Model $model
     */
    protected function prepareVars($model, $context = 'create')
    {
        $this->controller->vars['formModel'] = $model;
        $this->controller->vars['formContext'] = $context;
        $this->controller->vars['formRecordName'] = Lang::get('backend::lang.model.name');
    }

    //
    // Create
    //

    /**
     * Controller "create" action used for creating new model records.
     *
     * @param string $context Form context
     * @return \Backend\Widgets\Form
     */
    public function buildFormWidget($formConfig, $recordId = null, $context = null)
    {
        $this->controller->pageTitle = $this->controller->pageTitle ?: Lang::get('backend::lang.form.create_title');
        if (is_object($recordId)) {
            $model = $recordId;
        } else if (!empty($recordId)) {
            $model = $this->controller->formFindModelObject($recordId);
        } else {
            $model = $this->controller->formCreateModelObject();
        }
        return $this->initFormWidget($model, $formConfig);
    }

    /**
     * Method to render the prepared form markup. This method is usually
     * called from a view file.
     *
     *     <?= $this->formRender() ?>
     *
     * The first argument supports an array of render options. The supported
     * options can be found via the `render` method of the Form widget class.
     *
     *     <?= $this->formRender(['preview' => true, section' => 'primary']) ?>
     *
     * @param array $options Render options
     * @return string Rendered HTML for the form.
     * @throws ApplicationException
     * @see \Backend\Widgets\Form
     */
    public function formRender($formConfig, $recordId = null, $context = null, $options = [])
    {
        $formWidget = $this->buildFormWidget($formConfig, $recordId, $context);
        if (!$formWidget) {
            throw new ApplicationException(Lang::get('backend::lang.form.behavior_not_ready'));
        }

        return $formWidget->render($options);
    }

    public static function wrapFormWidget($controller, $formWidget = null, $context = 'create')
    {
        $formController = $controller->asExtension('FormController');
        if (!empty($formWidget)) {
            ReflectionUtil::setPropertyValue(FormController::class, $formController, 'formWidget', $formWidget);
        }
        $viewPath = $controller->getViewPath(strtolower($context) . '.htm');
        $contents = $controller->makeFileContents($viewPath);
        return $contents;
    }
}