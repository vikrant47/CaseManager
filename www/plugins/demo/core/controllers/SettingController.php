<?php namespace Demo\Core\Controllers;

use Demo\Core\Classes\Utils\ReflectionUtil;
use Demo\Core\Controllers\AbstractPluginController;
use const Grpc\STATUS_PERMISSION_DENIED;
use Lang;
use Flash;
use Backend;
use BackendMenu;
use League\Flysystem\Plugin\AbstractPlugin;
use System\Classes\SettingsManager;
use Backend\Classes\Controller;
use ApplicationException;
use Exception;
use System\Models\Parameter;
use Db;

/**
 * Settings controller
 *
 * @package october\system
 * @author Alexey Bobkov, Samuel Georges
 *
 */
class SettingController extends AbstractSecurityController
{
    public $implement = ['Backend\Behaviors\FormController'];

    public $formConfig = [
        'fields' => [],
        'modelClass' => Parameter::class, 'form' => '',
        'tabs' => ['fields' => []],
    ];
    public $modelClass;
    /**
     * @var WidgetBase Reference to the widget object.
     */
    protected $formWidget;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->modelClass = Parameter::class;
    }

    public function index()
    {
        $settingQuery = Db::table('system_parameters');
        $status = $this->listExtendQuery($settingQuery);
        if ($status === self::ACCESS_DENIED) {
            return;
        }
        $settings = $settingQuery->get();
        $model = new \stdClass();
        $model->exists = true;
        foreach ($settings as $setting) {
            $this->formConfig['tabs']['fields'][$setting->item] = [
                'label' => ucfirst($setting->item),
                'type' => $setting->data_type,
                'comment' => $setting->description,
                'span' => 'auto',
                'tab' => ucfirst($setting->group)
            ];
            $model->{$setting->item} = $setting->value;
        }
        $form = $this->buildForm($this->formConfig, 'create', $model);
        $this->vars = ['setting' => $settings, 'form' => $form];
        return $this->makePartial('index', $this->vars);
    }

    public function onSave()
    {

    }
}
