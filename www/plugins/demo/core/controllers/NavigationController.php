<?php namespace Demo\Core\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Demo\Core\Models\Navigation;

class NavigationController extends AbstractSecurityController
{
    public $implement = ['Backend\Behaviors\ListController', 'Backend\Behaviors\FormController', 'Backend\Behaviors\ReorderController'];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Demo.Core', 'main-menu-item', 'side-menu-item14');
    }

    public function embed($id)
    {
        $navigation = Navigation::where('id', '=', $id)->first();
        if (empty($navigation)) {
            return $this->setResponse('Unable to find navigation with id ' . $id, 404);
        }
        $navitaions = $this->getNavigations();
        /* if ($navitaions->contains(function ($navigation) use ($id) {
             return $navigation->id == $id;
         })) {*/
        return $this->makePartial('embed', [
            'navigation' => $navigation
        ]);
        /*} else {
                return $this->forwardToAccessDenied();
            }*/

    }
}
