<?php namespace Briddle\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateBriddleWorkflowActions extends Migration
{
    public function up()
    {
        Schema::create('briddle_workflow_actions', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('code');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('briddle_workflow_actions');
    }
}
