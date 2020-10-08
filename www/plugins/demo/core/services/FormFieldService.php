<?php


namespace Demo\Core\Services;


use Demo\Core\Classes\Utils\ModelUtil;
use Demo\Core\Models\FormField;
use October\Rain\Support\ServiceProvider;
use Event;

class FormFieldService extends ServiceProvider
{
    /**
     * EventHandlerServiceProvider constructor.
     * @param \Illuminate\Contracts\Foundation\Application $app
     */
    public function __construct($app)
    {
        parent::__construct($app);
    }

    public static function getCustomFields($controller)
    {
        $formController = $controller->asExtension('FormController');
        if (isset($formController)) {
            $formConfig = $formController->getConfig();
            $formConfigPath = $formConfig->form;
            return FormField::where('form', $formConfigPath)->where('active', 1)->get();
        }
        return collect([]);
    }

    public static function addFieldAssociations($formFields, $modelClass)
    {
        $associationAdded = false;
        foreach ($formFields as $formField) {
            // Add an extra birthday field
            $fields = $formField->controls['fields'];
            foreach ($fields as $name => $field) {
                if ($field['type'] === 'relation') {
                    if (array_key_exists('association', $field)) {
                        $association = $field['association'];
                        $modelClass::extend(function ($model) use ($name, $association) {
                            $model->{$association['type']}[$association->alias ?? $name] = [
                                $association['model'],
                                'key' => $association['key'] ?? 'id',
                                'otherKey' => $association['target_key'] ?? 'id'
                            ];
                        });
                        $associationAdded = true;
                    }
                }
            }
        }
        return $associationAdded;
    }

    public static function addCustomFields($controller, $widget)
    {
        $formFields = self::getCustomFields($controller);
        $modelClass = get_class($widget->model);
        $replicated = $widget->model;
        if ($formFields->count() > 0) {
            foreach ($formFields as $formField) {
                // Add an extra birthday field
                $fields = $formField->controls['fields'];
                $widget->addFields($formField->controls['fields']);
            }
            /*if (self::addFieldAssociations($formFields, $modelClass)) {
                $widget->model = $widget->model->replicate();
            }*/
            $widget->model = $widget->model->replicate();
        }
    }

    /**This method will register user's form fields to forms*/
    public function register()
    {
// Extend all backend form usage
        Event::listen('backend.form.extendFields', function ($widget) {
            $controller = $widget->getController();
            // Only for the User controller
            self::addCustomFields($controller, $widget);
        });
    }
}
