<?php namespace Demo\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoWorkflowWorkflowItems extends Migration
{
    public function up()
    {
        Schema::create('demo_workflow_workflow_items', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->string('model', 255);
            $table->integer('record_id');
            $table->timestamp('assigned_at');
            $table->integer('workflow_id');
            $table->integer('assigned_to_id');
            $table->integer('current_state_id');
            $table->timestamp('finished_at')->nullable();
            $table->integer('plugin_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('demo_workflow_workflow_items');
    }
}
