<?php namespace Demo\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoWorkflowTasks extends Migration
{
    public function up()
    {
        Schema::create('demo_workflow_tasks', function ($table) {
            $table->engine = 'InnoDB';
            $table->uuid('id')->primary();
            $table->uuid('queue_id');
            $table->integer('assigned_to_id')->nullable();
            $table->integer('priority')->default(1);
            $table->boolean('age_priority')->default(true);
            $table->uuid('record_id');
            $table->uuid('workflow_transition_id');
            $table->string('model', 255);
            $table->string('state', 255);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('poped_at')->nullable();
            $table->timestamp('pushed_at')->nullable();
            $table->timestamp('assigned_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('demo_workflow_tasks');
    }
}
