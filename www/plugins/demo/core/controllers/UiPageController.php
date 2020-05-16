<?php namespace Demo\Core\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Demo\Core\Classes\Beans\ApplicationCache;
use Demo\Core\Classes\Beans\SessionCache;
use Demo\Core\Classes\Beans\TwigEngine;
use Demo\Core\Models\UiPage;
use Demo\Report\Models\Widget;
use Db;

class UiPageController extends AbstractSecurityController
{
    public $implement = ['Backend\Behaviors\ListController', 'Backend\Behaviors\FormController', 'Backend\Behaviors\ReorderController'];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Demo.Core', 'main-menu-item', 'side-menu-item15');
    }

    public function onPreview($id)
    {
        $page = UiPage::where('id', $id)->first();
        if (empty($page)) {
            $this->setStatusCode(404);
            return '';
        }
        $this->vars['page'] = $page;
        $this->vars['preview'] = true;
        return ['pageData' => $page->getOriginal()];
    }

    public function render($id)
    {
        if ($id instanceof UiPage) {
            $page = $id;
        } else {
            $page = ApplicationCache::instance()->get('UI_PAGE_' . $id, function () use ($id) {
                $pageRecord = Db::table('demo_core_ui_pages')->where('id', $id)->first();
                $twigEngine = new TwigEngine();
                $pageRecord->templateInstance = $twigEngine->compile($pageRecord->template);
                return $pageRecord;
            });
        }
        if (empty($page)) {
            $this->setStatusCode(404);
            return '';
        }

        return $this->makePartial('page_renderer', [
            'preview' => false,
            'page' => $page,
        ]);
    }
}
