<?php
namespace Demo\Report\Seeds;

use Schema;
use Seeder;
use Demo\Core\Classes\Ifs\Seedable;
use Db;

/**Auto generated using cmd _: php artisan core:run-seeds Demo.Report d */
class SeedDemoCoreFormActions implements Seedable
{
    /**This will be executed to install seeds*/
    public function install()
    {
            Db::table('demo_core_form_actions')->insert([
            [
                                                                            "id"=>"c916ac69-bfd1-4ccc-8b75-2d8160831de6",
                                                                                        "created_at"=>"2020-05-13 04:12:13",
                                                                                        "updated_at"=>"2020-06-07 05:47:03",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"dashboard-preview",
                                                                                        "label"=>"Preview",
                                                                                        "form"=>"\$/demo/report/models/dashboard/fields.yaml",
                                                                                        "model"=>"Demo\Report\Models\Dashboard",
                                                                                        "active"=> 1,
                                                                                        "toolbar"=> false,
                                                                                        "description"=> "",
                                                                                        "icon"=>"oc-icon-photo",
                                                                                        "css_class"=> "",
                                                                                        "sort_order"=> 3,
                                                                                        "plugin_id"=> "cf0c66c7-12c9-43df-813c-14aeafdf6ae1",
                                                                                        "script"=>"function(){\r\n}",
                                                                                        "context"=>"[\"update\"]",
                                                                                        "html_attributes"=>"[{\"name\":\"data-toggle\",\"value\":\"model\"},{\"name\":\"href\",\"value\":\"#previewModal\"},{\"name\":\"data-size\",\"value\":\"large\"},{\"name\":\"data-request\",\"value\":\"onPreview\"},{\"name\":\"data-load-indicator\",\"value\":\"Loading\"},{\"name\":\"data-request-update\",\"value\":\"widget_renderer: '#previewModal .modal-body'\"},{\"name\":\"data-hotkey\",\"value\":\"ctrl+p, cmd+p\"}]"
                            ] ,            [
                                                                            "id"=>"eaa211e4-d899-413b-b6ef-64339b3b3626",
                                                                                        "created_at"=>"2020-05-13 04:12:13",
                                                                                        "updated_at"=>"2020-06-07 05:47:21",
                                                                                        "created_by_id"=> 1,
                                                                                        "updated_by_id"=> 1,
                                                                                        "name"=>"widget-preview",
                                                                                        "label"=>"Preview",
                                                                                        "form"=>"\$/demo/report/models/widget/fields.yaml",
                                                                                        "model"=>"Demo\Report\Models\Widget",
                                                                                        "active"=> 1,
                                                                                        "toolbar"=> false,
                                                                                        "description"=> "",
                                                                                        "icon"=>"oc-icon-photo",
                                                                                        "css_class"=> "",
                                                                                        "sort_order"=> 3,
                                                                                        "plugin_id"=> "cf0c66c7-12c9-43df-813c-14aeafdf6ae1",
                                                                                        "script"=>"function(){\r\n}",
                                                                                        "context"=>"[\"update\"]",
                                                                                        "html_attributes"=>"[{\"name\":\"data-toggle\",\"value\":\"model\"},{\"name\":\"href\",\"value\":\"#previewModal\"},{\"name\":\"data-size\",\"value\":\"large\"},{\"name\":\"data-request\",\"value\":\"onPreview\"},{\"name\":\"data-load-indicator\",\"value\":\"Loading\"},{\"name\":\"data-request-update\",\"value\":\"widget_renderer: '#previewModal .modal-body'\"},{\"name\":\"data-hotkey\",\"value\":\"ctrl+p, cmd+p\"}]"
                            ]             ]);
        }

    /**This will be executed to uninstall seeds*/
    public function uninstall()
    {
                    Db::table('demo_core_form_actions')->where('plugin_id', 14)->delete();
            }
}
