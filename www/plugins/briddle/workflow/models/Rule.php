<?php namespace Briddle\Workflow\Models;

use Model;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Event;

/**
 * Workflow rules
 *
 * Workflow rules use triggers and actions
 *
 * @copyright  2018 Briddle Rich Internet Applications
 */ 
class Rule extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var string The one to one relation needed for form relation and record finder (added manually).
     */
    public $belongsTo = [
        'trigger' => ['Briddle\Workflow\Models\Trigger'],
        'action' => ['Briddle\Workflow\Models\Action'],
        'rule' => ['Briddle\Workflow\Models\Rule']
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
        'name'                  => ['required','regex:"^[A-Za-z]+$"'],
        'trigger_id'            => 'required',
        'action_id'             => 'required'
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'briddle_workflow_rules';
    

    /**
     *
     * Trigger workflow rule
     *
     * @param       string  $name The name of our rule
     * @param       object  $schedule Our October CMS scheduler
     * @return      void
     *
     */   
    public function triggerRule($name=null,$schedule=null)
    {
        // Trigger
        if(!is_null($name))
        {
            // For each row in briddle_workflow_triggers that HAS name....
            $rules = Db::table('briddle_workflow_rules')->select(
                'briddle_workflow_triggers.value as trigger',
                'briddle_workflow_actions.type as type',
                'briddle_workflow_actions.name as template',
                'briddle_workflow_actions.value as action',
                'briddle_workflow_rules.name as name'
            )
            ->leftJoin('briddle_workflow_triggers', 'briddle_workflow_rules.trigger_id', '=', 'briddle_workflow_triggers.id')
            ->leftJoin('briddle_workflow_actions', 'briddle_workflow_rules.action_id', '=', 'briddle_workflow_actions.id')
            ->where('briddle_workflow_rules.active', 1)
            ->where('briddle_workflow_rules.name', '=', $name)
            ->get();            
        }
        elseif(!is_null($schedule))
        {
            // For each row in briddle_workflow_triggers that IS of type cronjob....
            $rules = Db::table('briddle_workflow_rules')->select(
                'briddle_workflow_triggers.value as trigger',
                'briddle_workflow_actions.type as type',
                'briddle_workflow_actions.name as template',
                'briddle_workflow_actions.value as action',
                'briddle_workflow_rules.name as name'
            )
            ->leftJoin('briddle_workflow_triggers', 'briddle_workflow_rules.trigger_id', '=', 'briddle_workflow_triggers.id')
            ->leftJoin('briddle_workflow_actions', 'briddle_workflow_rules.action_id', '=', 'briddle_workflow_actions.id')
            ->where('briddle_workflow_rules.active', 1)
            ->where('briddle_workflow_triggers.type', '=', 'cronjob')
            ->get();
        }
        else
        {
            // For each row in briddle_workflow_triggers that is NOT of type cronjob....
            $rules = Db::table('briddle_workflow_rules')->select(
                'briddle_workflow_triggers.value as trigger',
                'briddle_workflow_actions.type as type',
                'briddle_workflow_actions.name as template',
                'briddle_workflow_actions.value as action',
                'briddle_workflow_rules.name as name'
            )
            ->leftJoin('briddle_workflow_triggers', 'briddle_workflow_rules.trigger_id', '=', 'briddle_workflow_triggers.id')
            ->leftJoin('briddle_workflow_actions', 'briddle_workflow_rules.action_id', '=', 'briddle_workflow_actions.id')
            ->where('briddle_workflow_rules.active', 1)
            ->where('briddle_workflow_triggers.type', '=', 'event')
            ->get();  
        }
        
        if($rules)
        {
            foreach($rules as $rule)
            {
                switch($rule->type)
                {
                    case "mail":
                            if(!is_null($name)) 
                            {
                                $this->workflowMail($rule);
                            }
                            elseif(!is_null($schedule))
                            {
                                $schedule->call(function() use ($rule) {
                                    $this->workflowMail($rule);
                                })->cron($rule->trigger);
                            }
                            else
                            {
                                // e.g. 'rainlab.user.register'
                                Event::listen($rule->trigger, function() use($rule) {// Event::listen($rule->trigger, function($user) use($rule) {
                                    $this->workflowMail($rule);
                                });
                            }
                        break;
                    case "webhook":
                            if(!is_null($name))  
                            {
                                $this->workflowWebhook($rule);
                            }
                            elseif(!is_null($schedule))
                            {
                                $schedule->call(function() use ($rule) {
                                    $this->workflowWebhook($rule);
                                })->cron($rule->trigger);
                            }
                            else
                            {
                                // e.g. 'rainlab.user.register' or eloquent.saved: Briddle\Book\Models\Feature
                                Event::listen($rule->trigger, function() use($rule) {
                                    $this->workflowWebhook($rule);
                                }); 
                            }
                        break;
                    case "log":
                            if(!is_null($name))  
                            {
                                Log::info('Manually triggered: ' . json_encode($rule));
                            }
                            elseif(!is_null($schedule))
                            {
                                $schedule->call(function() use ($rule) {
                                    Log::info('Cron triggered: ' . json_encode($rule));
                                })->cron($rule->trigger);
                            }
                            else
                            {
                                // e.g. 'rainlab.user.register' or eloquent.saved: Briddle\Book\Models\Feature
                                Event::listen($rule->trigger, function() use($rule) {
                                    Log::info('Event triggered: ' . json_encode($rule));
                                }); 
                            }
                        break;
                    case "workflow":
                            if(!is_null($name))  
                            {
                                $this->workflowActions($rule);
                            }
                            elseif(!is_null($schedule))
                            {
                                $schedule->call(function() use ($rule) {
                                    $this->workflowActions($rule);
                                })->cron($rule->trigger);
                            }
                            else
                            {
                                // e.g. 'rainlab.user.register' or eloquent.saved: Briddle\Book\Models\Feature
                                Event::listen($rule->trigger, function() use($rule) {
                                    $this->workflowActions($rule);
                                }); 
                            }
                        break;
                    case "query":
                            if(!is_null($name))  
                            {
                                $this->workflowQuery($rule);
                            }
                            elseif(!is_null($schedule))
                            {
                                $schedule->call(function() use ($rule) {
                                    $this->workflowQuery($rule);
                                })->cron($rule->trigger);
                            }
                            else
                            {
                                // e.g. 'rainlab.user.register' or eloquent.saved: Briddle\Book\Models\Feature
                                Event::listen($rule->trigger, function() use($rule) {
                                    $this->workflowQuery($rule);
                                }); 
                            }
                        break;
                }
            }
        }
    }
    
    /**
     *
     * Sending mails as part of a workflow
     *
     * @param       object  $rule Our variables
     * @return      void
     *
     */     
    protected function workflowMail($rule)
    {
        $results = Db::select($rule->action);
        if(is_array($results))
        {
            for($i=0;$i<count($results);$i++)
            {
                if(isset($results[$i]->email) && isset($results[$i]->name))
                {
                    $vars =  (array) $results[$i];
                    $email = $results[$i]->email;
                    $name = $results[$i]->name;
                    Mail::send($rule->template, $vars, function($message) use ($email,$name) {
                        $message->to($email, $name);
                    });  
                }
                else
                {
                    Log::info('Missing email and/or name field in: ' . $rule->name);
                }
            } 
        }
        else
        {
            Log::info('Action value is no array (' . json_encode($results) . ') in: ' . $rule->name);
        }
    }
    
    /**
     *
     * Pinging URL's as part of a workflow
     *
     * @param       object  $rule Our variables
     * @return      void
     *
     */    
    protected function workflowWebhook($rule)
    {
        $ch = curl_init($rule->action);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_exec($ch);
        $retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if(200 == $retcode) 
        {
            Log::info('Webhook responded in: ' . $rule->name);
        } else {
            Log::info('Webhook did not respond in: ' . $rule->name);
        }
    }
    
    /**
     *
     * Multiple actions
     *
     * @param       object  $rule Our variables
     * @return      void
     *
     */    
    protected function workflowActions($rule)
    {
        // get workflow
        $workflow = Db::table('briddle_workflow_workflows')->select('items')
            ->where('briddle_workflow_workflows.name', '=', $rule->action)
            ->get();   
        
        // get actions as an array of objects with property action_id
        $actions = $workflow->items;
        
        // Loop actions
        foreach($actions as $action)
        {
            $newrule = Db::table('briddle_workflow_actions')->select('*')
                ->where('briddle_workflow_actions.id', $action->action_id)
                ->get();              
            switch($newrule->type)
            {
                case "mail":
                        $this->workflowMail($newrule);
                    break;
                case "webhook":
                        $this->workflowWebhook($newrule);
                    break;
                case "log":
                        Log::info('Manually triggered: ' . json_encode($newrule));
                    break;
                case "workflow":
                        $this->workflowActions($newrule);
                    break;
                case "query":
                        $this->workflowQuery($newrule);
                    break;
            }
        }
    }
    
    /**
     *
     * Run a query as part of a workflow
     *
     * @param       object  $rule Our variables
     * @return      void
     *
     */    
    protected function workflowQuery($rule)
    {
        $results = Db::raw($rule->action);
        if(is_array($results))
        {
            
        }
        else
        {
            Log::info('Action value is no array (' . json_encode($results) . ') in: ' . $rule->name);
        }
    }
}
