<?php


namespace Demo\Core\Models;


use October\Rain\Database\Model;

class EngineSettings extends Model
{
    public $incrementing = true;
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'demo_core_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';
}
