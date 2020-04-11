<?php namespace Demo\Core\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Demo\Core\Controllers\AbstractSecurityController;
use Demo\Core\Models\Iframe;
use Demo\Core\Models\PluginVersions;

class IframeController extends AbstractSecurityController
{
    public $implement = ['Backend\Behaviors\ListController', 'Backend\Behaviors\FormController', 'Backend\Behaviors\ReorderController'];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Demo.Core', 'main-menu-item', 'side-menu-item');
    }

    public function renderIframe($slug)
    {
        $iframe = Iframe::where('slug', $slug)->first();
        if (empty($iframe)) {
            $this->setStatusCode( 404);
            return '';
        }
        if (!empty($iframe->backend_menu)) {
            $menu = $iframe->backend_menu[0];
            $plugin = PluginVersions::where('id', $menu['plugin'])->first();
            BackendMenu::setContext($plugin->code, $menu['main_menu'], $menu['side_menu']);
        }

        return '<iframe width="100%" height="100%" src="' . $iframe->url . '" frameBorder="0"></iframe>';
    }
}
