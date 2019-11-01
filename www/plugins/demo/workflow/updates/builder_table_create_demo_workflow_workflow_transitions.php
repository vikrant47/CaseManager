<?php namespace Demo\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoWorkflowWorkflowTransitions extends Migration
{
    public function up()
    {
        Schema::create('demo_workflow_workflow_transitions', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->integer('workflow_entities_id');
            $table->integer('from_state_id');
            $table->integer('to_state_id');
            $table->integer('workflow_entity_id');
            $table->text('data')->nullable();
            $table->integer('plugin_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_workflow_workflow_transitions');
    }
}
