<?php namespace Demo\Casemanager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCasemanagerWorkflowStates extends Migration
{
    public function up()
    {
        Schema::create('demo_casemanager_workflow_states', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->string('name');
            $table->text('description');
            $table->integer('active');
            $table->string('code');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_casemanager_workflow_states');
    }
}
