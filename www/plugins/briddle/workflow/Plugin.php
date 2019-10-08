<?php namespace Briddle\Workflow;

use System\Classes\PluginBase;
use Briddle\Workflow\Models\Rule;
use Illuminate\Support\Facades\Log;

use System\Classes\SettingsManager;
use Backend;
use Lang;

/**
 * Plugin
 *
 * Plugin registration
 *
 * @copyright  2018 Briddle Rich Internet Applications
 */ 
class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name' => Lang::get('briddle.workflow::lang.plugin.name'),
            'description' => Lang::get('briddle.workflow::lang.plugin.description'),
            'author' => 'Briddle',
            'icon' => 'icon-magic'
        ];
    }    
    
    
    /**
     *
     * Register October CMS schedule
     *
     * @param       object  $schedule Our October CMS scheduler
     * @return      void
     *
     */    
    public function registerSchedule($schedule)
    {
        $rule = New Rule;
        $rule->triggerRule(null,$schedule);
    }
    
    
    /**
     *
     * Listen for events
     *
     * @return      void
     *
     */
    public function boot()
    {
        $rule = New Rule;
        $rule->triggerRule();
    }
}