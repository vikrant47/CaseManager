<?php


namespace Demo\Core\Services;


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

    /**This method will register user's form fields to forms*/
    public function register()
    {
// Extend all backend form usage
        Event::listen('backend.form.extendFields', function ($widget) {
            $controller = $widget->getController();
            // Only for the User controller
            $formController = $controller->asExtension('FormController');
            if (isset($formController)) {
                $formConfigPath = $formController->getConfig()->form;
                $formFields = FormField::where('form', $formConfigPath)->where('active', 1)->get();
                foreach ($formFields as $formField) {
                    // Add an extra birthday field
                    $widget->addFields($formField->controls['fields']);
                }
            }
        });
    }
}