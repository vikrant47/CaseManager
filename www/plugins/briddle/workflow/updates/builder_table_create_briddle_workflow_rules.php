<?php namespace Briddle\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateBriddleWorkflowRules extends Migration
{
    public function up()
    {
        Schema::create('briddle_workflow_rules', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('trigger_id');
            $table->integer('action_id');
            $table->string('name', 255);
            $table->smallInteger('active');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('briddle_workflow_rules');
    }
}
