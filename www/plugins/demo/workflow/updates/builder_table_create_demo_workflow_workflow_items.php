<?php namespace Demo\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoWorkflowWorkflowItems extends Migration
{
    public function up()
    {
        Schema::create('demo_workflow_workflow_items', function ($table) {
            $table->engine = 'InnoDB';
            $table->uuid('id')->primary();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->string('model', 255);
            $table->uuid('record_id');
            $table->uuid('workflow_id');
            $table->integer('assigned_to_id');
            $table->uuid('current_state_id');
            $table->timestamp('finished_at')->nullable();
            $table->uuid('engine_application_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('demo_workflow_workflow_items');
    }
}
