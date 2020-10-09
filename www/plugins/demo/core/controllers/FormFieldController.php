<?php namespace Demo\Core\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Config;
use Backend;
use Demo\Core\Controllers\AbstractSecurityController;

class FormFieldController extends AbstractSecurityController
{
    public $implement = [
        'RainLab.Builder.Behaviors.IndexDataRegistry',
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController',
        ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Demo.Core', 'main-menu-item', 'side-menu-item5');
    }
    public function addFormBuilderAssets(){
        $this->addCss('/plugins/rainlab/builder/assets/css/builder.css', 'RainLab.Builder');

        // The table widget scripts should be preloaded
        $this->addJs('/modules/backend/widgets/table/assets/js/build-min.js', 'core');

        if (Config::get('develop.decompileBackendAssets', false)) {
            // Allow decompiled backend assets for RainLab Builder
            $assets = Backend::decompileAsset('../../plugins/rainlab/builder/assets/js/build.js', true);

            foreach ($assets as $asset) {
                $this->addJs($asset, 'RainLab.Builder');
            }
        } else {
            $this->addJs('/plugins/rainlab/builder/assets/js/build-min.js', 'RainLab.Builder');
        }

        $this->pageTitleTemplate = '%s Builder';
    }
}
