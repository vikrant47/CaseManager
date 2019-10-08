<?php namespace Briddle\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateBriddleWorkflowRuleWorkflow extends Migration
{
    public function up()
    {
        Schema::create('briddle_workflow_rule_workflow', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('workflow_id')->unsigned();
            $table->integer('rule_id')->unsigned();
            $table->primary(['workflow_id','rule_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('briddle_workflow_rule_workflow');
    }
}
