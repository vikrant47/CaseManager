<?php namespace Demo\Core\Models;

use Demo\Core\Models\PluginVersions;
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

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'plugin' => [PluginVersions::class, 'key' => 'plugin_id']
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
        return array_map(function ($file) {
            return MediaLibrary::url($file['javascript_file']);
        }, $this->javascript_files);
    }
    public function getCssFiles()
    {
        return array_map(function ($file) {
            return MediaLibrary::url($file['css_file']);
        }, $this->css_files);
    }
}
