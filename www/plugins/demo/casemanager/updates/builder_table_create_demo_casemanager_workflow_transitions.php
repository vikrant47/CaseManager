<?php namespace Demo\Casemanager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCasemanagerWorkflowTransitions extends Migration
{
    public function up()
    {
        Schema::create('demo_casemanager_workflow_transitions', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->integer('workflow_entities_id');
            $table->string('from_state');
            $table->string('to_state');
            $table->text('data');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_casemanager_workflow_transitions');
    }
}
