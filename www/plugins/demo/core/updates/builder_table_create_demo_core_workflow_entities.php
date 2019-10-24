<?php namespace Demo\Core\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoCoreWorkflowEntities extends Migration
{
    public function up()
    {
        Schema::create('demo_core_workflow_entities', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->string('entity_type', 255);
            $table->integer('entity_id');
            $table->integer('workflow_id');
            $table->integer('assigned_to_id');
            $table->integer('current_state_id');
            $table->timestamp('finished_at')->nullable();

            $table->unique('entity_type', 'entity_id');
            $table->integer('plugin_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('demo_core_workflow_entities');
    }
}
