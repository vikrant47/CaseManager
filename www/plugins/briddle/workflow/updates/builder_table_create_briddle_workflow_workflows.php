<?php namespace Briddle\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateBriddleWorkflowWorkflows extends Migration
{
    public function up()
    {
        Schema::create('briddle_workflow_workflows', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 255);
            $table->smallInteger('active');
            $table->text('rules');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('briddle_workflow_workflows');
    }
}
