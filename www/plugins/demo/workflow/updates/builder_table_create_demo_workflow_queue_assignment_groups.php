<?php namespace Demo\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoWorkflowQueueAssignmentGroups extends Migration
{
    public function up()
    {
        Schema::create('demo_workflow_queue_assignment_groups', function($table)
        {
            $table->engine = 'InnoDB';
            $table->uuid('id')->primary();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->integer('group_id');
            $table->uuid('queue_id');
            $table->integer('sort_order');
            $table->uuid('engine_application_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_workflow_queue_assignment_groups');
    }
}
