<?php namespace Briddle\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateBriddleWorkflowTriggers extends Migration
{
    public function up()
    {
        Schema::create('briddle_workflow_triggers', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('code');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('briddle_workflow_triggers');
    }
}
