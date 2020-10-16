<?php namespace Demo\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoWorkflowWorkflowTransitions extends Migration
{
    public function up()
    {
        Schema::create('demo_workflow_workflow_transitions', function ($table) {
            $table->engine = 'InnoDB';
            $table->uuid('id')->primary();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->boolean('backward_direction')->default(false);
            $table->uuid('work_id');
            $table->uuid('from_state_id');
            $table->uuid('to_state_id');
            $table->text('data')->nullable();
            $table->uuid('workflow_id');
            $table->uuid('configured_queue_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('demo_workflow_workflow_transitions');
    }
}
