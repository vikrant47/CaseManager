<?php namespace Demo\Core\Models;

use Backend\Classes\Controller;
use Backend\Facades\Backend;
use Demo\Core\Models\EngineApplication;
use Illuminate\Support\Facades\Storage;
use Model;
use System\Classes\MediaLibrary;

/**
 * Model
 */
class JavascriptLibrary extends Model
{
    use \October\Rain\Database\Traits\Validation;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'demo_core_libraries';
    public $incrementing = false;

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'application' => [EngineApplication::class, 'nameFrom' => 'name', 'key' => 'engine_application_id']
    ];

    public $attachMany = [
        'css_files' => 'System\Models\File',
        'javascript_files' => 'System\Models\File'
    ];

    /* public $attachOne = [
         'css_file' => 'System\Models\File',
         'javascript_file' => 'System\Models\File',
     ];*/

    public $jsonable = ['css_files', 'javascript_files'];

    public $attachAuditedBy = true;

    public function asScriptTags()
    {
        $html = '';
        foreach ($this->javascript_files as $file) {
            $html = $html . ' <script src = "' . MediaLibrary::url($file['javascript_file']) . '" type="text/javascript"></script> ';
        }
        return $html;
    }

    public function asCssTags()
    {
        $html = '';
        foreach ($this->css_files as $file) {
            $html = $html . ' <link href = "' . MediaLibrary::url($file['css_file']) . '" rel="text/css"></script> ';
        }
        return $html;
    }

    public function getJsFiles()
    {
        return $this->javascript_files->map(function ($file) {
            return $file->path;
        });
    }

    public function getCssFiles()
    {
        return $this->css_files->map(function ($file) {
            return $file->path;
        });
    }

    public function addAssets(Controller $controller)
    {
        foreach ($this->getCssFiles() as $file) {
            $controller->addCss($file);
        }
        foreach ($this->getJsFiles() as $file) {
            $controller->addJs($file);
        }
    }
}
