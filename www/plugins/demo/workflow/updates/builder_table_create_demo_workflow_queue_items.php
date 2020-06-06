<?php namespace Demo\Workflow\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDemoWorkflowQueueItems extends Migration
{
    public function up()
    {
        Schema::create('demo_workflow_queue_items', function($table)
        {
            $table->engine = 'InnoDB';
            $table->uuid('id')->primary();
            $table->uuid('queue_id');
            $table->integer('assigned_to_id')->nullable();
            $table->uuid('record_id');
            $table->string('model', 255);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('poped_at')->nullable();
            $table->integer('created_by_id');
            $table->integer('updated_by_id');
            $table->integer('plugin_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('demo_workflow_queue_items');
    }
}
