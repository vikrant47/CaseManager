<?php namespace Demo\Casemanager\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCasemanagerWorkflowEntities extends Migration
{
    public function up()
    {
        Schema::create('demo_casemanager_workflow_entities', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->string('entity_type', 255);
            $table->integer('entity_id');
            $table->string('current_state');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_casemanager_workflow_entities');
    }
}
